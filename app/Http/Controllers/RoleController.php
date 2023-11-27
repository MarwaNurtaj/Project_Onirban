<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Carbon\Carbon;
use Session;
use Auth;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $allData=Role::where('role_status',1)->orderBy('role_id','ASC')->get();
        return view('admin.role.all',compact('allData'));   
    }



    public function add(){
        return view('admin.role.add');
    }

    public function view($id){
        $data=Role::where('role_status',1)->where('role_id',$id)->firstOrFail();
        return view('admin.role.view',compact('data')); 
    }

    public function edit($slug){
        $data=Role::where('role_status',1)->where('role_slug',$slug)->firstOrFail();
        return view('admin.role.edit',compact('data'));  
    }

    public function insert(Request $request){
        // $id = $request['role_id'];

        $this->validate($request, [
            'id' => 'required|unique:roles,role_id',
            'name' => 'required|max:10|unique:roles,role_name',
        ], [
            'id.required' => 'Please enter a Role ID.',
            'id.unique' => 'The Role ID must be unique.',
            'name.required' => 'Please enter Role Title.',
            'name.max' => 'Please enter a Role Title with a maximum of 10 characters.',
            'name.unique' => 'The Role Title must be unique.',
        ]);
        
        $slug = 'R-'.uniqid(20);
        $creator = Auth::user()->id;
        
        $insert = Role::insert([
            'role_id' => $request['id'],
            'role_name' => $request['name'],
            'role_creator' => $creator,
            'role_slug' => $slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
        if ($insert) {
            Session::flash('success', 'Successfully added role information.');
            return redirect('dashboard/role/add');
        } else {
            Session::flash('error', 'Oops! Operation Failed.');
            return redirect('dashboard/role/add');
        }
        
    }

    public function update(Request $request){        
        $id= $request['id'];
        // dd($id);

        // $this->validate($request,[
        //     // 'id' => 'required|unique:roles,role_id,'.$id.',role_id',
        //     'name'=>'required|max:10|unique:roles,role_name,'.$id.',role_id',
        // ],[
        //     // 'id.required' => 'Please enter a Role ID.',
        //     // 'id.unique' => 'The Role ID must be unique.',
        //     'name.required' => 'Please enter Role Title.',
        //     'name.max' => 'Please enter a Role Title with a maximum of 10 characters.',
        //     'name.unique' => 'The Role Title must be unique.',
        // ]);
        
        $slug='R-'.uniqid(20);
        $editor=Auth::user()->id;
        
        
        $update=Role::where('role_status',1)->where('role_id',$id)->update([
            // 'role_id'=>$request['id'],
            'role_name'=>$request['name'],
            'role_editor'=>$editor,
            'role_slug'=>$slug,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Successfully updated Role information.');
            return redirect('dashboard/role/view/'.$id);
        }else{
            Session::flash('error','Opps! Operation Failed.');
            return redirect('dashboard/role/edit/'.$slug);
        }
    }

    public function soft_delete(){
        
    }

}
