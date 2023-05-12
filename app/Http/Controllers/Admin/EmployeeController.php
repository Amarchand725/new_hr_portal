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

            return $data['employees'] = $query->where('is_removed', 0)->paginate(10);

            return (string) view('admin.employees.search', compact('data'));
        }

        $data['positions'] = Position::orderby('id', 'desc')->where('status', 1)->get();
        $data['designations'] = Designation::orderby('id', 'desc')->where('status', 1)->get();
        $data['roles'] = Role::orderby('id', 'desc')->get();
        $data['departments'] = Department::orderby('id', 'desc')->get();
        $data['employment_statues'] = EmploymentStatus::orderby('id', 'desc')->get();
        $data['employees'] = User::orderby('id', 'desc')->where('is_removed', 0)->paginate(10);

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
                        'implement_date' => $request->implement_date,
                        'status' => 1,
                    ]);
                }

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
                        $salary_history->implement_date = $request->implement_date;
                        $salary_history->save();
                    }else{
                        SalaryHistory::create([
                            'created_by' => Auth::user()->id,
                            'user_id' => $user->id,
                            'job_history_id' => $user->jobHistory->id,
                            'salary' => $request->salary,
                            'implement_date' => $request->implement_date,
                            'status' => 1,
                        ]);
                    }
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
        $models = User::onlyTrashed()->get();
        $title = 'All Trashed Records';
        return view('admin.employees.trashed-index', compact('models', 'title'));
    }
    public function restore($id)
    {
        User::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }

    public function status(Request $request, $user_id)
    {
        $model = User::where('id', $user_id)->first();

        if($request->status_type=='status') {
            if($model->status==1) {
                $model->status = 0;
            } else {
                $model->status = 1;
            }

            $model->save();

            //send email if possible
        }elseif($request->status_type=='remove'){
            if($model->is_removed==1) {
                $model->is_removed = 0;
            } else {
                $model->is_removed = 1;
            }

            $model->save();
        }elseif($request->status_type=='terminate'){
            //send email here
            $model->delete();
        }

        return true;
    }
    public function addSalary(Request $request)
    {
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
}
