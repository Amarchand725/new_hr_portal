<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page_records = 10;

        if($request->ajax()){
            $query = Permission::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            $models = $query->paginate($per_page_records);
            return (string) view('admin.permissions.search', compact('models'));
        }
        $title = 'All Permissions';
        $models = Permission::orderby('id','DESC')->paginate($per_page_records);
        return view('admin.permissions.index', compact('models', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('permission-create');
        $permission = Permission::get();
        $page_title = 'Add Permission';
        return view('admin.permission.create',compact('permission', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        $this->validate($request, [
            'name' => 'required',
        ]);

        $bool = false;
        if(!empty($request->permissions)){
            foreach($request->permissions as $permission){
                $ifnotfound = Permission::where('name', Str::lower($request->name).'-'.$permission)->first();
                if(empty($ifnotfound)){
                    Permission::create([
                        'name' =>  str_replace(' ', '-', Str::lower($request->name)).'-'.$permission,
                        'guard_name' => 'web',
                        'permission' => $permission,
                    ]);
                }else{
                    $bool = true;
                }
            }
        }else{
            $bool = false;
            Permission::create([
                'name' =>  str_replace(' ', '-', Str::lower($request->name)).'-'.$permission,
                'guard_name' => $request->name,
                'permission' => $permission,
            ]);
        }

        if($bool){
            return redirect()->route('permission.index')
            ->with('message','You have already available these permissions.');
        }

        return redirect()->route('permission.index')
                        ->with('message','Permission created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Permission::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('permission-edit');
        $permission = Permission::find($id);
        $page_title = 'Edit Permission';

        return view('admin.permission.edit',compact('permission', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permission_id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $permission = Permission::find($permission_id);
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('permission.index')
                        ->with('message','Permission updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ifdeleted = Permission::findOrFail($id)->delete();
        $onlySoftDeleted = Permission::onlyTrashed()->count();
        if($ifdeleted){
            return response()->json([
                'status' => true,
                'trash_records' => $onlySoftDeleted
            ]);
        }
    }
    public function trashAllPermission(Request $request)
    {
        $page_title = 'All Trashed Records';
        $per_page_records = 10;
        if(!empty(systemSetting())){
            $per_page_records = systemSetting()->per_page_record;
        }
        if($request->ajax()){
            $query = Permission::where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->onlyTrashed()->paginate($per_page_records);
            return (string) view('admin.permission.trash-search', compact('models'));
        }
        $models = Permission::onlyTrashed()->paginate($per_page_records);
        return view('admin.permission.trash-index', compact('models', 'page_title'));
    }
    public function restore($id)
    {
        Permission::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }
}
