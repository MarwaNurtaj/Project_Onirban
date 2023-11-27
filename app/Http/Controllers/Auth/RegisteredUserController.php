<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use File;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $this->validate($request, [
            'name' => 'required|max:20,',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'cpassword' => 'required|same:password',
        ], [
            'name.required' => 'Please enter Users First Name.',
            'name.max' => 'The Name must be within 20 character.',
            'email.required' => 'Please enter an Email Address.',
            'email.email' => 'Please enter a valid Email Address.',
            'email.unique' => 'The Email Address must be unique.',
            'password.required' => 'Please enter a Password.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.regex' => 'Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.',
            'cpassword.required' => 'Please confirm your password.',
            'cpassword.same' => 'The confirmation password must match the password.',
        ]);        
        
        $slug = 'U-'.uniqid(20);
      
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = 'User_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('contents/admin/uploads/'.$image_name);

            $user = User::insert([
                'name' => $request['name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'user_slug' => $slug,
                'photo' => $image_name,
                'created_at'=> Carbon::now()->toDateTimeString(),
            ]);

            if ($user){
                // event(new Registered($user));
    
                // Auth::login($user);
                return redirect(RouteServiceProvider::HOME);
            }
        }else{
            $user = User::create([
                'name' => $request['name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'user_slug' => $slug,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);

            if ($user){
                // event(new Registered($user));
    
                // Auth::login($user);
                return redirect(RouteServiceProvider::HOME);
            }
        }

        
        
        

        
    }
}
