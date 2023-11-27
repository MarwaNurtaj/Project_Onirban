<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Session;
use Auth;
use PDF;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $allData=User::where('user_status',1)->orderBy('id','ASC')->get();
        return view('admin.user.all',compact('allData'));       
    }

    public function inactive_user(){
        $allData=User::where('user_status',0)->orderBy('id','ASC')->get();
        return view('admin.user.inactiveUser',compact('allData'));   
    }
    public function ntVerified_user(){
        $allData=User::where('email_verified_at',Null)->orderBy('id','ASC')->get();
        return view('admin.user.ntVerified',compact('allData'));   
    }

    public function add(){
        return view('admin.user.add');
    }

    public function view($slug){
        $data= User::where('user_status',1)->where('user_slug',$slug)->firstOrFail();
        return view('admin.user.view',compact('data')); 
    }

    public function edit($slug){
        $data= User::where('user_slug',$slug)->firstOrFail();
        return view('admin.user.edit',compact('data')); 
        
    }

    public function insert(Request $request){

        $this->validate($request, [
            'name' => 'required|max:20,',
            'email' => 'required|email|unique:users,email',
            'user_status' => 'required',
            'role' => 'required',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'cpassword' => 'required|same:password',
            'pic' => 'image|mimes:jpeg,png,jpg',
        ], [
            'name.required' => 'Please enter Users First Name.',
            'name.max' => 'The Name must be within 20 character.',
            'email.required' => 'Please enter an Email Address.',
            'email.email' => 'Please enter a valid Email Address.',
            'email.unique' => 'The Email Address must be unique.',
            'user_status.required' => 'Please select User Status.',
            'role.required' => 'Please select a Role.',
            'password.required' => 'Please enter a Password.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.regex' => 'Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.',
            'cpassword.required' => 'Please confirm your password.',
            'cpassword.same' => 'The confirmation password must match the password.',
            // 'pic.required' => 'Please upload an image.',
            'image.image' => 'The file must be an image.',
            'pic.mimes' => 'The image must be a PNG or JPEG.',
            // 'image.max' => 'The image size must not exceed 2 MB.', 
        ]);        
        
        $slug = 'U-'.uniqid(20);
        // $creator = Auth::user()->id;
              

        $insert = User::insertGetId([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'user_role' => $request['role'],
            'user_status' => $request['user_status'],
            'password' => Hash::make($request['password']),
            'user_slug' => $slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName = 'User_'.$insert.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250,250)->save(base_path('public/contents/admin/uploads/'.$imageName));

            User::where('id',$insert)->update([
                'photo'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($insert){
            Session::flash('success', 'Successfully added new user information.');
            return redirect('dashboard/user/add');
        } else {
            Session::flash('error', 'Oops! Operation Failed.');
            return redirect('dashboard/user/add');
        }

    }

    public function update(Request $request){
        $id = $request['id'];        
        $user_role = $request['user_role'];        
        // $slug = $request['user_slug'];        
        
        $this->validate($request, [
            'name' => 'required|max:20,',
            'email' => 'required|email|unique:users,email,'.$id.',id',
            'user_status' => 'required',
            'role' => 'required',
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
            'role.required' => 'Please select a Role.',
            // 'password.required' => 'Please enter a Password.',
            // 'password.min' => 'Password must be at least 8 characters.',
            // 'password.regex' => 'Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.',
            // 'cpassword.required' => 'Please confirm your password.',
            // 'cpassword.same' => 'The confirmation password must match the password.',
            // 'pic.required' => 'Please upload an image.',
            'image.image' => 'The file must be an image.',
            // 'pic.mimes' => 'The image must be a PNG or JPEG.',
            // 'image.max' => 'The image size must not exceed 2 MB.', 
        ]);        
        
        $slug = 'U-'.uniqid(20);           

        $update = User::where('id',$id)->update([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'user_role' => $request['role'],
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
            return redirect('dashboard/user/view/'.$slug);
            
        } else {
            Session::flash('error', 'Oops! Operation Failed.');
            // return redirect('dashboard/user');
            return redirect('dashboard/user/edit/'.$slug);
        }
        
    }

    public function status($id){
        $user= User::find($id);
        $user->user_status=1;
        $user->save();
        return redirect('dashboard/user');
    }

    public function de_status($id){
        $user= User::find($id);
        $user->user_status=0;
        $user->save();
        return redirect('dashboard/user/inactiveUser');
    }

    public function pdf(){
        $all=User::where('user_status',1)->orderBy('id','ASC')->get();
        $pdf= PDF::loadView('admin/user/pdf',compact('all'));
        return $pdf->download('user_list_'.time().'.pdf');
    }
    

}
