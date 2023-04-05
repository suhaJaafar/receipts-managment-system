<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;



// class UserController extends Controller
// {
//     public function UserView(){
//         // $allData = User::all();
//         $data['allData'] = User::all();
//         return view('user.view_user',$data);
//    }


//    public function UserAdd(){
//         return view('user.add_user');
//     }



//     public function UserStore(Request $request){

//         $validatedData = $request->validate([
//             'email' => 'required|unique:users',
//             'name' => 'required',
//         ]);

//         $data = new User();
//         $data->name = $request->name;
//         $data->email = $request->email;
//         $data->password = bcrypt($request->password);
//         $data->save();

//         $notification = array(
//     		'message' => 'User Inserted Successfully',
//     		'alert-type' => 'success'
//     	);

//   	return redirect()->route('user.view')->with($notification);
//     }

//     public function UserEdit($id){
//     	$editData = User::find($id);
//     	return view('user.edit_user',compact('editData'));

//     }


//     public function UserUpdate(Request $request, $id){

//     	$data = User::find($id);
//     	$data->name = $request->name;
//     	$data->email = $request->email;
//     	$data->save();

//     	$notification = array(
//     		'message' => 'User Updated Successfully',
//     		'alert-type' => 'info'
//     	);

//     	return redirect()->route('user.view')->with($notification);

//     }



//     public function UserDelete($id){
//     	$user = User::find($id);
//     	$user->delete();

//     	$notification = array(
//     		'message' => 'User Deleted Successfully',
//     		'alert-type' => 'info'
//     	);

//     	return redirect()->route('user.view')->with($notification);

//     }
// }
