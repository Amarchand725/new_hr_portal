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
            $query = Permission::orderby('id', 'desc')->groupBy('label')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
                $query->orWhere('label', 'like', '%'. $request['search'] .'%');
            }
            $models = $query->paginate($per_page_records);
            return (string) view('admin.permissions.search', compact('models'));
        }
        $title = 'All Permissions';
        $models = Permission::orderby('id','DESC')->groupBy('label')->paginate($per_page_records);
        return view('admin.permissions.index', compact('models', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['label'] = Str::lower($request->name);

        $this->validate($request, [
            'label' => 'unique:permissions,label',
            'name' => 'required',
            'permissions.*' => 'required',
            'permissions' => 'required'
        ]);

        DB::beginTransaction();

        try{
            if(!empty($request->permissions)){
                foreach($request->permissions as $permission){
                    Permission::create([
                        'label' =>  Str::lower($request->name),
                        'name' =>  str_replace(' ', '-', Str::lower($request->name)).'-'.$permission,
                        'guard_name' => 'web',
                    ]);
                }
            }

            DB::commit();
            \LogActivity::addToLog('New Permission Added');
            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ifdeleted = Permission::where('label', $id)->delete();
        if($ifdeleted){
            return response()->json([
                'status' => true,
            ]);
        }
    }
}
