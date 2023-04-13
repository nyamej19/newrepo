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
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'=>'required',
            'phone'=>'required'

        ]);
        if ($request->hasFile('image')) {
            $img =$request->file('image');
            $filename = 'img'.time().'.'.$img->getClientOriginalExtension();

            $imgPath = public_path('app\public');
            $img->move($imgPath ,$filename);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone'=>$request->phone,
            'role'=>$request->role,
            'agree'=>$request->agree,
            'image'=>$filename,
            'profile_photo_path'=>$imgPath
        ]);
        

        event(new Registered($user));

        Auth::login($user);

        if($user->role ==1){
            return redirect()->route('service-page');
        }
        else if($user->role == 0){
            return redirect()->route('');
        }
        else if($user->role == 2){
            return redirect()->route('');
        }
    }
}
