<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\SalaryHistory;
use App\Models\ProfileCoverImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserContact;
use DB;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        $title = 'Profile';
        $model = $request->user();
        $histories = SalaryHistory::orderby('id','desc')->where('user_id', $model->id)->get();
        $cover_images = ProfileCoverImage::orderby('id','desc')->where('status', 1)->get();
        $user_permanent_address = UserContact::where('user_id', $model->id)->where('key', 'permanent_address')->first();
        $user_current_address = UserContact::where('user_id', $model->id)->where('key', 'current_address')->first();
        $user_emergency_contacts = UserContact::where('user_id', $model->id)->where('key', 'emergency_contact')->get();
        return view('admin.profile.my-profile', compact('title', 'model', 'histories', 'cover_images', 'user_permanent_address', 'user_current_address', 'user_emergency_contacts'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['string', 'max:255'],
        ]);

        DB::beginTransaction();

        try{
            $user = $request->user();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->save();

            if($user){
                $profile = Profile::where('user_id', $user->id)->first();

                $profile_image = '';
                if ($request->hasFile('profile')) {
                    $image = $request->file('profile');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('admin/assets/img/avatars'), $imageName);

                    $profile_image = $imageName;
                }

                $martial_status = 0;
                if(!empty($request->marital_status)){
                    $martial_status = $request->marital_status;
                }

                if(!empty($profile)){
                    $profile->gender = $request->gender;
                    $profile->phone_number = $request->phone_number;
                    $profile->cover_image_id = $request->cover_image_id;
                    $profile->date_of_birth = $request->date_of_birth;
                    $profile->marital_status = $martial_status;
                    $profile->about_me = $request->about_me;

                    if(!empty($profile_image)) {
                        $profile->profile = $profile_image;
                    }

                    $profile->save();
                }else{
                    $profile = new Profile();
                    $profile->user_id = $request->user()->id;
                    $profile->gender = $request->gender;
                    $profile->phone_number = $request->phone_number;
                    $profile->cover_image_id = $request->cover_image_id;
                    $profile->date_of_birth = $request->date_of_birth;
                    $profile->marital_status = $martial_status;
                    $profile->about_me = $request->about_me;
                    $profile->profile = $profile_image;
                    $profile->save();
                }

                DB::commit();
            }

            \LogActivity::addToLog('Profile Updated');

            return redirect()->back()->with('message', 'Profile Updated Successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required|min:6',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return 'if';
            return response()->json(['error' => false, 'message' => 'The provided old password is incorrect.']);
        }
        return 'outer';

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['success' => true, 'message' => 'You have changed password successfully!.']);
    }
}
