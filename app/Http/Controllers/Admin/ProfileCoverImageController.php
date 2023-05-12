<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProfileCoverImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfileCoverImage $profileCoverImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileCoverImage $profileCoverImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfileCoverImage $profileCoverImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileCoverImage $profileCoverImage)
    {
        //
    }
}
