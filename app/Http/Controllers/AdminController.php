<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Receipts;
use Illuminate\Support\Facades\DB;


use carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // public function Index(){
    //     return view('admin.admin_login');
    // }


    // public function Dashboard(){
    //     $items['alldata'] = Receipts::select('name', DB::raw('MIN(code) as code'), 'created_at', 'address')
    //     ->groupBy('name', 'created_at', 'address')
    //     ->orderBy('created_at', 'desc')
    //     ->get();

    // return view('admin.index', $items);    }

    // public function Login(Request $request){
    //     // dd($request->all());
    //     $check = $request->all();
    //     if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
    //         return redirect()->route('admin.dashboard')->with('error','تم تسجيل دخولك كآدمن بنجاح ');
    //     }else{
    //         return back()->with('error','الايميل او رمز الدخول خاطئ');
    //     }
    // }


    // public function AdminLogout(){
    //     Auth::guard('admin')->logout();
    //     // return redirect()->route('choicelogin')-;
    //     return redirect('/login')->with('error','Admin logout successfully');
    // }


    // public function AdminRegister(){
    //     return view('admin.admin_register');
    // }



    // public function AdminRegisterCreate( Request $request){


    //     Admin::insert([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'created_at' => Carbon::now(),
    //     ]);
    //     return redirect()->route('login_form')->with('error','Admin creaed successfully');

    // }

}
