<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
// use Illuminate\Support\Facades\DB;


class AccountController extends Controller
{
    public function index()
    {


        $accounts = Admin::select('id','name', 'email', 'created_at', 'role')

        ->union(User::select('id','name', 'email', 'created_at', \Illuminate\Support\Facades\DB::raw('"user" as role')))
        ->orderBy('created_at', 'desc')
        ->get();
        // $accounts = Admin::all();

        return view('accounts.show', compact('accounts'));
    }
    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        if ($request->input('role') == 'user') {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();
        } elseif ($request->input('role') == 'admin') {
            $admin = new Admin;
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->password = bcrypt($request->input('password'));
            $admin->save();
        }

        return redirect()->route('accounts.show');
    }

    public function destroy($id)
    {
        // Check if the ID belongs to an Admin or User
        $account = Admin::find($id);

        if (!$account) {
            $account = User::find($id);
        }

        // If the account was not found, return a 404 error
        if (!$account) {
            abort(404);
        }

        // Delete the account
        $account->delete();

        // Redirect to the index page with a success message
        return redirect()->route('accounts.show')->with('success', 'Account deleted successfully');
    }


}
