<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use App\Models\JobHistory;
use App\Models\SalaryHistory;
use App\Models\Department;
use App\Models\DepartmentUser;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Designation;
use App\Models\EmploymentStatus;
use App\Models\UserEmploymentStatus;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Str;
use DB;


class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('user-list');
        $data = [];

        $title = 'All Employees';
        if($request->ajax()){
            $query = User::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                // $users = Profile::where('employment_id', 'like', '%'. $request['search'] .'%')->get(['user_id']);

                $query->where('first_name', 'like', '%'. $request['search'] .'%');
                $query->orWhere('last_name', 'like', '%'. $request['search'] .'%');
                $query->orWhere('email', 'like', '%'. $request['search'] .'%');

                // if(!empty($users)) {
                //     $emp_users = [];
                //     foreach($users as $user){
                //         $emp_users[] = $user->user_id;
                //     }
                //     $query->whereIn('id', $emp_users);
                // }
            }
            if($request['status'] != "All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }

            if($request['department_id'] != "All"){
                $users = DepartmentUser::where('department_id', $request['department_id'])->get(['user_id']);
                $query->whereIn('id', $users);
            }
            if($request['role_id'] != "All"){
                $query->role($request['role_id']);
            }

            return $data['employees'] = $query->where('is_employee', 1)->paginate(10);

            return (string) view('admin.employees.search', compact('data'));
        }

        $data['positions'] = Position::orderby('id', 'desc')->where('status', 1)->get();
        $data['designations'] = Designation::orderby('id', 'desc')->where('status', 1)->get();
        $data['roles'] = Role::orderby('id', 'desc')->get();
        $data['departments'] = Department::orderby('id', 'desc')->where('status', 1)->where('manager_id', '!=', NULL)->get();
        $data['employment_statues'] = EmploymentStatus::orderby('id', 'desc')->get();
        $data['employees'] = User::orderby('id', 'desc')->where('is_employee', 1)->paginate(10);

        $onlySoftDeleted = User::onlyTrashed()->count();
        return view('admin.employees.index', compact('title', 'data', 'onlySoftDeleted'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'employment_status_id' => 'required',
            'role_id' => 'required',
            'joining_date' => 'required',
            'employment_id' => 'max:200',
            'salary' => 'max:255',
        ]);

        $password = Str::random(5);

        $model = [
            'created_by' => Auth::user()->id,
            'status' => 1,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($password),
        ];

        DB::beginTransaction();

        try{
            $model = User::create($model);
            $model->assignRole($request->role_id);

            if($model){
                Profile::create([
                    'user_id' => $model->id,
                    'employment_id' => $request->employment_id,
                    'joining_date' => $request->joining_date,
                    'gender' => $request->gender,
                ]);

                $job_history = JobHistory::create([
                    'created_by' => Auth::user()->id,
                    'user_id' => $model->id,
                    'designation_id' => $request->designation_id,
                    'position_id' => $request->position_id,
                    'employment_status_id' => $request->employment_status_id,
                    'joining_date' => $request->joining_date,
                ]);

                if($job_history && !empty($request->salary)){
                    SalaryHistory::create([
                        'created_by' => Auth::user()->id,
                        'user_id' => $model->id,
                        'job_history_id' => $job_history->id,
                        'salary' => $request->salary,
                        'effective_date' => $request->effective_date,
                        'status' => 1,
                    ]);
                }

                if(!empty($request->department_id)){
                    DepartmentUser::create([
                        'department_id' => $request->department_id,
                        'user_id' => $model->id,
                    ]);
                }

                UserEmploymentStatus::create([
                    'user_id' => $model->id,
                    'employment_status_id' =>$request->employment_status_id,
                    'start_date' => $request->joining_date,
                ]);

                DB::commit();
            }

            //send email with password.

            \LogActivity::addToLog('Employee added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data = [];
        $data['model'] = User::with('jobHistory')->where('id', $id)->first();
        $data['positions'] = Position::orderby('id', 'desc')->where('status', 1)->get();
        $data['designations'] = Designation::orderby('id', 'desc')->where('status', 1)->get();
        $data['roles'] = Role::orderby('id', 'desc')->get();
        $data['departments'] = Department::orderby('id', 'desc')->get();
        $data['employment_statues'] = EmploymentStatus::orderby('id', 'desc')->get();

        return (string) view('admin.employees.edit_content', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'email' => 'required|max:255|unique:users,id,'.$user->id,
            'employment_status_id' => 'required',
            'role_id' => 'required',
            'joining_date' => 'required',
            'employment_id' => 'max:200',
            'salary' => 'max:255',
        ]);

        DB::beginTransaction();

        try{
            $user->created_by = Auth::user()->id;
            $user->status = 1;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;

            if($user->email != $request->email) {
                $user->email = $request->email;
                $user->password = Hash::make(Str::random(5));
            }

            $user->save();

            $role_name = Role::where('id', $request->role_id)->first()->name;

            if($user->getRoleNames()->first() != $role_name){
                // Remove the existing role from the user
                $user->removeRole($user->getRoleNames()->first());

                // Assign the new role to the user
                $user->assignRole($request->role_id);
            }

            if($user){
                Profile::where('user_id', $user->id)->update([
                    'employment_id' => $request->employment_id,
                    'joining_date' => $request->joining_date,
                    'gender' => $request->gender,
                ]);

                $job_history = JobHistory::where('user_id', $user->id)->update([
                    'created_by' => Auth::user()->id,
                    'position_id' => $request->position_id,
                    'designation_id' => $request->designation_id,
                    'employment_status_id' => $request->employment_status_id,
                    'joining_date' => $request->joining_date,
                ]);

                if($job_history && !empty($request->salary)){
                    $salary_history = SalaryHistory::where('user_id', $user->id)->first();
                    if(!empty($salary_history)){
                        $salary_history->salary = $request->salary;
                        $salary_history->effective_date = $request->effective_date;
                        $salary_history->save();
                    }else{
                        SalaryHistory::create([
                            'created_by' => Auth::user()->id,
                            'user_id' => $user->id,
                            'job_history_id' => $user->jobHistory->id,
                            'salary' => $request->salary,
                            'effective_date' => $request->effective_date,
                            'status' => 1,
                        ]);
                    }
                }

                $user_emp_status = UserEmploymentStatus::orderby('id', 'desc')->where('user_id', $id)->first();
                if(!empty($user_emp_status)){
                    $user_emp_status->employment_status_id = $request->employment_status_id;
                    $user_emp_status->start_date = $request->joining_date;
                    $user_emp_status->save();
                }else{
                    UserEmploymentStatus::create([
                        'user_id' => $id,
                        'employment_status_id' => $request->employment_status_id,
                        'start_date' => $request->joining_date,
                    ]);
                }

                DB::commit();
            }

            //send email if email changed and generated new password.

            \LogActivity::addToLog('Employee updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        // $this->authorize('user-list');
        $title = 'Show Details';
        $model = User::where('id', $id)->first();
        $histories = SalaryHistory::orderby('id','desc')->where('user_id', $id)->take(2)->get();
        return view('admin.employees.show', compact('model', 'histories', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model = User::where('id', $id)->delete();
        if($model){
            $onlySoftDeleted = User::onlyTrashed()->count();
            return response()->json([
                'status' => true,
                'trash_records' => $onlySoftDeleted
            ]);
        }else{
            return false;
        }
    }

    public function trashed()
    {
        // $this->authorize('user-trashed');
        $models = User::onlyTrashed()->get();
        $title = 'All Trashed Records';
        return view('admin.employees.trashed-index', compact('models', 'title'));
    }
    public function restore($id)
    {
        // $this->authorize('user-restore');
        User::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }

    public function status(Request $request, $user_id)
    {
        // $this->authorize('user-status');
        $model = User::where('id', $user_id)->first();

        if($request->status_type=='status') {
            if($model->status==1) {
                $model->status = 0;
            } else {
                $model->status = 1; //Active
            }
            //send email if possible

            \LogActivity::addToLog('Status updated');

        }elseif($request->status_type=='remove'){
            $model->is_employee = 0;

            \LogActivity::addToLog('Removed from list');
        }elseif($request->status_type=='terminate'){
            $user_emp_status = UserEmploymentStatus::orderby('id', 'desc')->where('user_id', $user_id)->first();
            $user_emp_status->end_date = date('Y-m-d');
            $user_emp_status->save();

            $terminate_status_id = EmploymentStatus::where('name', 'Terminated')->first()->id;

            UserEmploymentStatus::create([
                'user_id' => $user_id,
                'employment_status_id' => $terminate_status_id,
                'start_date' => date('Y-m-d'),
            ]);

            $model->status = 0; //set to deactive

            \LogActivity::addToLog('Terminated employee');

            //send email here
        }
        $model->save();

        return true;
    }
    public function addSalary(Request $request)
    {
        // $this->authorize('user-add-salary');
        $request->validate([
            'amount' => 'required|max:255',
            'effective_date' => 'required',
        ]);

        DB::beginTransaction();

        try{
            $job_history = JobHistory::orderby('id', 'desc')->where('user_id', $request->user_id)->first();
            $last_salary = SalaryHistory::where('job_history_id', $job_history->id)->where('status', 1)->first();

            if(!empty($last_salary)){
                $last_salary->status = 0;
                $last_salary->end_date = $request->effective_date;
                $last_salary->save();
            }

            SalaryHistory::create([
                'created_by' => Auth::user()->id,
                'user_id' => $request->user_id,
                'job_history_id' => $job_history->id,
                'salary' => $request->amount,
                'effective_date' => $request->effective_date,
            ]);

            DB::commit();

            //send email on salary increments.

            \LogActivity::addToLog('Salary added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function salaryDetails()
    {
        $title = 'Salary Details';
        $data = [];
        $authUserID=Auth::user()->id;

        $all_departments = DB::table('departments')->get();
        $my_departments = DB::table('departments')->where('manager_id',$authUserID)->pluck('id')->toArray();
        $child_departments=array();
        foreach($all_departments as $all_department){
            if(in_array($all_department->id, $my_departments)){
                array_push($child_departments,$all_department->id);
            }else{
                $check_department=DB::table('departments')->where('id',$all_department->id)->first();
                if(in_array($check_department->id, $my_departments)){
                    array_push($child_departments,$all_department->id);
                }
            }
        }
        $departments = array_values(array_unique(array_merge($my_departments,$child_departments)));

        $department_users = DB::table('department_users')->where('end_date',NULL)->whereIn('department_id',$departments)->pluck('user_id')->toArray();
        if(count($department_users)>0){
            $data['allUsers'] = DB::table('users')->where('id','!=',$authUserID)->whereIn('id',$department_users)->get();
        }else{
            $data['allUsers'] = null;
        }
        if(date('d')>25){
            $data['month'] = date('m',strtotime('first day of +1 month'));
            $data['year'] = date('Y',strtotime('first day of +1 month'));
        }else{
            $data['month'] = date('m');
            $data['year'] = date('Y');
        }

        $data['authUserID'] = $authUserID;
        $data['user'] = DB::table('users')->where('id',$authUserID)->first();
        // $files = DB::table('files')->where('fileable_id',$authUserID)->first();
        $department_user = DB::table('department_users')->where('user_id',$authUserID)->where('end_date',NULL)->first();
        $data['department'] = DB::table('departments')->where('id',$department_user->department_id)->first();
        $userDesignation = DB::table('job_histories')->where('user_id',$authUserID)->where('end_date',NULL)->first();
        $data['designation'] = DB::table('designations')->where('id',$userDesignation->designation_id)->first();
        $salary = DB::table('salary_histories')->where('user_id',$authUserID)->first();
        $data['salary'] = $salary!=null ? $salary->salary : 0;
        $data['profile'] = DB::table('profiles')->where('user_id',$authUserID)->first();
        return view('admin.employees.salary-details', compact('title', 'data'));
    }
    public function filterSalaryDetails(Request $request)
    {
        $user_id = Auth::user()->id;
        if(!empty($request->user_id)){
            $user_id = $request->user_id;
        }

        $model = User::where('id', $user_id)->first();
    }

    public function getTeamMembers($user_id)
    {
        $user = User::findOrFail($user_id);
        $data = [];

        $role = $user->getRoleNames()->first();
        foreach($user->getRoleNames() as $user_role){
            if($user_role=='Admin'){
                $role = $user_role;
            }
        }

        $team_members = [];

        if($role == 'Admin' || $role=='Manager'){
            $department = Department::where('manager_id', $user->id)->where('status', 1)->first();
            $department_users = DepartmentUser::where('department_id', $department->id)->where('end_date', null)->get(['user_id']);
            $dep_users_ids = [];
            foreach($department_users as $department_user){
                // if($department_user->user_id != $user->id) {
                    $dep_users_ids[] = $department_user->user_id;
                // }
            }

            $team_members = User::whereIn('id', $dep_users_ids)->get();
        }else{
            if(isset($user->departmentBridge->department) && !empty($user->departmentBridge->department->id)) {
                $user_department_id = $user->departmentBridge->department->id;
                $team_member_ids = DepartmentUser::where('department_id', $user_department_id)->where('user_id', '!=', $user->id)->get(['user_id']);

                $team_members = [];
                foreach($team_member_ids as $team_member_id){
                    $team_members[] = User::where('id', $team_member_id->user_id)->first();
                }
            }
        }

        return (string) view('admin.employees.team-members', compact('team_members'));
    }
}
