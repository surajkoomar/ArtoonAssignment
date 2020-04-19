<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DataTables;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index(){
    	return view('admin.admin_home');
    }

    public function getAllUser(){
    	//return User::all();
    	$users = User::where('user_type','user')->get();
    	return DataTables::of($users)->addIndexColumn()
    	->addColumn('action', function($users){
          return
              '<center><a class="btn btn-success btn-sm" href="'.url('editUser',['id' => $users->id]).'">
                  <i class="fa fa-update"></i>Edit</a><button class="btn btn-danger btn-sm" onclick="delete_user('.$users->id.')">
                  <i class="fa fa-update"></i>Delete</button></center>';
        })
        
        
        ->rawColumns(['status', 'action'])
    	->make(true);
    }

    public function addUser(){
    	return view('admin.add_user');
    }

    public function editUser($userId){
    	$getUserData = User::find($userId);
    	return view('admin.edit_user',compact('userId','getUserData'));
    }

    public function saveUser(Request $request){
    	$checkUser = User::where('email',$request->userEmail)->first();
    	if(!empty($checkUser)){
    		return response()->json(['msg'=>'Email already exist']);
    	}

    	User::create([
    		'name'=>$request->userName,
    		'email'=>$request->userEmail,
    		'password' => Hash::make($request->userPassword),
    		'user_type'=>'user'
    	]);
    	
    	return response()->json(['msg'=>'User created successfully']);

    }

    public function updateUser(Request $request){
    	
    	User::where('id',$request->id)->update([
    		'name'=>$request->userName,
    	]);
    	
    	return response()->json(['msg'=>'User updated successfully']);

    }

    public function deleteUser(Request $request){
    	$deleteRecord = User::find($request->id);
    	$deleteRecord->delete();
    	return response()->json(['msg'=>'User deleted successfully']);
    }
}
