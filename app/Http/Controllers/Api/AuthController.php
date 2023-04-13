<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// header('Access-Control-Allow-Origin: *');
class AuthController extends Controller
{
    
    public function createUser(Request $req){
        
       
        try {
            //validated
            $validateUser = Validator::make($req->all(),
            [
                'name'=>'required',
                'password'=>'required',
                'email'=>'required|email|unique:users,email',
                'phone'=>'required',
                'role'=>'required',
                'phone'=>'required'
    
            ]);
            if($validateUser->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'validation error',
                    'errors'=>$validateUser->errors()
                ],401);
            }
            if ($req->hasFile('profileImg')) {
                $img =$req->file('profileImg');
                $filename = 'img'.time().'.'.$img->getClientOriginalExtension();
                $imgPath = public_path('app\public');
                $img->move($imgPath ,$filename);
              }
            $user = User::create([
                'name' => $req->name,
                'email'=>$req->email,
                'password'=> Hash::make($req->password),
                'phone'=>$req->phone,
                'role'=>$req->role,
                'phone'=>$req->phone,
                'image'=>$filename,
                'profile_photo_path'=>$imgPath
            ]);
            $id = $user->id;
            return response()->json([
                'status'=>true,
                'message'=>'success',
                'token'=>$user->createToken("API TOKEN")->plainTextToken,
                'user'=>$id
            ],200);

        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
                'errors'=>$validateUser->errors()
            ],500);
        }
        

    }
    public function allUsers(){
        $allUsers = User::all();
        return response()->json([
            'status'=>true,
            'data'=>$allUsers,
        ],200);
    }
    public function login(Request $request){
        try {
            $validateUser = Validator::make($request->all(),
            [
                'password'=>'required',
                'email'=>'required|email',
    
            ]);
            if($validateUser->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'validation error',
                    'errors'=>$validateUser->errors()
                ],401);
            }

            if (!Auth::attempt($request->only(['email','password']))) {
                return response()->json([
                    'status'=>false,
                    'message'=>'Email and password does not much our records',
                ],401);
            }

            $user = User::where('email' ,$request->email)->first();
            return response()->json([
                'status'=>true,
                'message'=>'User Logged In Successfully',
                'token'=>$user->createToken("API TOKEN")->plainTextToken
            ],200);

        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }
    public function logout(Request $req){
   $deltokens = Auth::user()->tokens()->delete();
        return response()->json([
            'message'=>'logged out successfuly',
        ]);

    }

}
