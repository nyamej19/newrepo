<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('signroles.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
       $e =$request->email;
      $emailcheck = User::where('email',$e)->get();
     // dd($emailcheck);
if($emailcheck == null){
    return redirect()->back()->with('message','email does not exist in our system');
}
        $request->authenticate();

        $request->session()->regenerate();
        // $user  = User::find($request->email);
       $user = User::where('email',$request->email) -> first();
       if($user == null){
        return redirect()->back()->with('message','user does not exist!');
       }
        $myrole =$user->role;
        if($myrole== 0){
            return redirect()->route('admin-page');
        }
        elseif($myrole == 1 ){
            return redirect()->route('service-page');
        }
        elseif($myrole == 2){
           return redirect()->route('user-page');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
