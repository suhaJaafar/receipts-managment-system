<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/admin/dashboard');
    //     }

    //     if (Auth::guard('web')->attempt($credentials, $request->remember)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/dashboard');
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ]);
    // }

    public function store(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $guard = '';
    if (Auth::guard('admin')->attempt($credentials)) {
        $guard = 'admin';
    } elseif (Auth::guard('web')->attempt($credentials)) {
        $guard = 'web';
    }

    if (!$guard) {
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // // Debugging code:
    // $user = Auth::guard($guard)->user();
    // error_log("Guard: $guard, User ID: $user->id");

    return redirect()->route("$guard.dashboard");
}



    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
        {
            if (Auth::guard('admin')->check()) {
                Auth::guard('admin')->logout();
            } elseif (Auth::guard('web')->check()) {
                Auth::guard('web')->logout();
            }

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/')->with('success','User logout successfully');
        }


// public function destroy(Request $request)
// {
//     $guards = array_keys(config('auth.guards'));

//     foreach ($guards as $guard) {
//         if (Auth::guard($guard)->check()) {
//             Auth::guard($guard)->logout();
//             // dd($request->session()->get('login_time'));
//             // Check if session has expired
//             if ($request->session()->get('login_time') && (time() - $request->session()->get('login_time') > config('session.lifetime') * 60)) {
//                 $request->session()->invalidate();
//                 return redirect('/')->with('warning', 'Your session has expired. Please log in again.');
//             }
//         }
//     }

//     $request->session()->invalidate();
//     $request->session()->regenerateToken();

//     return redirect('/')->with('success','User logout successfully');
// }

}
