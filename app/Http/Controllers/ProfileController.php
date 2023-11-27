<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use PDF;

class ProfileController extends Controller
{

    public function view($slug){
        $data= User::where('user_slug',$slug)->firstOrFail();
        return view('website.home.view_profile',compact('data')); 
    }

    public function edit($slug){
        $data= User::where('user_slug',$slug)->firstOrFail();
        return view('website.home.edit_profile',compact('data')); 
        
    }

    public function update(Request $request){
        $id = $request['id'];        
        $user_role = $request['user_role'];        
        // $slug = $request['user_slug'];        
        
        $this->validate($request, [
            'name' => 'required|max:20,',
            'email' => 'required|email|unique:users,email,'.$id.',id',
            'user_status' => 'required',
            // 'role' => 'required',
            // 'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            // 'cpassword' => 'required|same:password',
            'pic' => 'image|mimes:jpeg,png,jpg',
        ], [
            'name.required' => 'Please enter Users First Name.',
            'name.max' => 'The Name must be within 20 character.',
            'email.required' => 'Please enter an Email Address.',
            'email.email' => 'Please enter a valid Email Address.',
            'email.unique' => 'The Email Address must be unique.',
            'user_status.required' => 'Please select User Status.',
            'image.image' => 'The file must be an image.',
            'pic.mimes' => 'The image must be a PNG or JPEG.',
            // 'image.max' => 'The image size must not exceed 2 MB.', 
        ]);        
        
        $slug = 'U-'.uniqid(20);
        // $creator = Auth::user()->id;
              

        $update = User::where('id',$id)->update([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            // 'user_role' => $request['role'],
            'user_status' => $request['user_status'],
            // 'password' => Hash::make($request['password']),
            'user_slug' => $slug,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName = 'User_'.$id.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250,250)->save(base_path('public/contents/admin/uploads/'.$imageName));

            User::where('id',$id)->update([
                'photo'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($update){
            Session::flash('success', 'Successfully updated user information.');
            return redirect('website/home/view_profile/'.$slug);

            
        } else {
            Session::flash('error', 'Oops! Operation Failed.');
            return redirect('website/home/edit_profile'.$slug);

        }
        
        
    }

    public function pdf($slug){
        $all=User::where('user_slug',$slug)->get();
        $pdf= PDF::loadView('website/home/profile_pdf',compact('all'));
        return $pdf->download('profile_'.time().'.pdf');
    }


    /**
     * Display the user's profile form.
     */
    // public function edit(Request $request): View
    // {
    //     return view('profile.edit', [
    //         'user' => $request->user(),
    //     ]);
    // }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    /**
     * Delete the user's account.
     */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current_password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
}
