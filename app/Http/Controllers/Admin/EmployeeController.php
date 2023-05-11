<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use App\Models\JobHistory;
use App\Models\SalaryHistory;
use App\Models\Department;
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
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.positions.search', compact('models'));
        }

        $data['positions'] = Position::orderby('id', 'desc')->where('status', 1)->get();
        $data['designations'] = Designation::orderby('id', 'desc')->where('status', 1)->get();
        $data['roles'] = Role::orderby('id', 'desc')->get();
        $data['departments'] = Department::orderby('id', 'desc')->get();
        $data['employment_statues'] = EmploymentStatus::orderby('id', 'desc')->get();
        $data['employees'] = User::orderby('id', 'desc')->paginate(10);
        $onlySoftDeleted = Position::onlyTrashed()->count();
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

            \LogActivity::addToLog('Employee added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
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

            \LogActivity::addToLog('Employee updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error. '.$e->getMessage());
        }
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
}
