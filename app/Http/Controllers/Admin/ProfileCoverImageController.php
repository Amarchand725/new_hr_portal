<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProfileCoverImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class ProfileCoverImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'All Profile Cover Images';
        if($request->ajax()){
            $query = ProfileCoverImage::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.profile_cover_images.search', compact('models'));
        }

        $models = ProfileCoverImage::orderby('id', 'desc')->paginate(10);
        $onlySoftDeleted = ProfileCoverImage::onlyTrashed()->count();
        return view('admin.profile_cover_images.index', compact('title', 'models', 'onlySoftDeleted'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => ['required'],
        ]);

        DB::beginTransaction();

        try{
            $model = new ProfileCoverImage();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('admin/profile_cover_images'), $imageName);

                $model->created_by = Auth::user()->id;
                $model->image = $imageName;
                $model->save();

                DB::commit();
            }

            \LogActivity::addToLog('New Cover Image Added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileCoverImage $profileCoverImage)
    {
        $model = $profileCoverImage->delete();
        if($model){
            $onlySoftDeleted = ProfileCoverImage::onlyTrashed()->count();
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
        $models = ProfileCoverImage::onlyTrashed()->get();
        $title = 'All Trashed Records';
        return view('admin.profile_cover_images.trashed-index', compact('models', 'title'));
    }
    public function restore($id)
    {
        ProfileCoverImage::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }

    public function status(Request $request, $id)
    {
        $model = ProfileCoverImage::where('id', $id)->first();

        if($model->status==1) {
            $model->status = 0;
        } else {
            $model->status = 1;
        }

        $model->save();

        return true;
    }
}
