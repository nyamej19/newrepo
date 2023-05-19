<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\addservice;
use App\Models\Homes;
use App\Models\service;
use Illuminate\Support\Facades\DB;

class ChalyController extends Controller
{
    public function aboutUs(){
        return view('chalyview.aboutus');
    }
    public function workerInfo($id){
        $workerInfos = DB::table('userassesments')->where('worker_id',$id)->get();
        return view('chalyview.workerinfo',compact('workerInfos'));

    }
    public function contactReviewer($id){
        $userInfo = User::find($id);
        return view('chalyview.contactreview',compact('userInfo'));
    }
    public function partners(){
        return view('chalyview.partners');
    }
    public function blog()
    {
        return view('chalyview.blog');
    }
    public function homeSales(){
        $homes = DB::table("homes")->where('saleType' ,'sale')->get();
        return view('chalyview.salehomes',compact('homes'));
    }
    public function homeRentals(){
        $homes = DB::table("homes")->where('saleType' ,'rent')->get();
        return view('chalyview.renthomes',compact('homes'));

    }
    public function contactUs(){
        return view('chalyview.contactus');
    }
    public function signUpUser(){
        return view('signroles.usersignup');
    }
    public function signUpService(){
        return view('signroles.servicesignup');
    }
    public function signUpAdmin(){
        return view('signroles.adminsignup');
    }
    public function contactPost(Request $request ){
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
        contactus::create(['name'=>$name,'email'=>$email,'subject'=>$subject, 'message'=>$message]);
        //dd($request->all());
        return redirect()->back()->with('message', 'Message sent successfully. Will hear from us soon!');
    }
    public function signUpUserPost(Request $request)
    {
       // dd($request->all());
        $validateUser = Validator::make($request->all(),
            [
                'name'=>'required',
                'password'=>'required',
                'email'=>'required|email|unique:users,email',
                'phone'=>'required',
                'role'=>'required',
                'phone'=>'required'

            ]);
            $emailcheck = User::where('email',$request->email)->get()->first();;
            if($emailcheck != null){
                return redirect()->back()->with('message' ,'email exists already!');
            }
            if($request->password != $request->confirm_password){
                return redirect()->back()->with('password' ,'passwords do not match!');
            }
            $filename = "";
            if ($request->hasFile('image')) {
                $img =$request->file('image');
                $filename = 'img'.time().'.'.$img->getClientOriginalExtension();

                $imgPath = public_path('app\public');
                $img->move($imgPath ,$filename);
            }
            dd($filename);


               // dd($request->all());
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'role' => "2",
                'phone' => $request->phone,
                'country' => $request->country,
                'state' => $request->state,
                'agree' => $request->agree,
                'image' => $filename,
                'profile_photo_path' => $imgPath

            ]);

            $role =2;
            //dd($role);
            if($role == 0){
                return redirect()->route('admin-page');
            }
            elseif($role == 1 ){
                return redirect()->route('service-page');
            }
            elseif($role == 2){
               return redirect()->route('user-page');
            }

    }
    public function signUpServicePost(Request $request)
    {
       // dd($request->all());
        $validateUser = Validator::make($request->all(),
            [
                'name'=>'required',
                'password'=>'required',
                'email'=>'required|email|unique:users,email',
                'phone'=>'required',
                'role'=>'required',
                'phone'=>'required'

            ]);
            $emailcheck = User::where('email',$request->email)->get()->first();;
            if($request->password != $request->confirm_password){
                return redirect()->back()->with('password' ,'passwords do not match!');
            }
            if($emailcheck != null){
                return redirect()->back()->with('message' ,'email exists already!');
            }

            if ($request->hasFile('image')) {
                $img =$request->file('image');
                $filename = 'img'.time().'.'.$img->getClientOriginalExtension();

                $imgPath = public_path('app\public');
                $img->move($imgPath ,$filename);
            }
            //   return $img;


               // dd($request->all());
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'role' => "1",
                'phone' => $request->phone,
                'country' => $request->country,
                'state' => $request->state,
                'agree' => $request->agree,
                'image' => $filename,
                'profile_photo_path' => $imgPath

            ]);

            $role =1;
            //dd($role);
            if($role == 0){
                return redirect()->route('admin-page');
            }
            elseif($role == 1 ){
                return redirect()->route('service-page');
            }
            elseif($role == 2){
               return redirect()->route('user-page');
            }

    }

    public function signUpForm(Request $request)
    {
       // dd($request->all());
        $validateUser = Validator::make($request->all(),
            [
                'name'=>'required',
                'password'=>'required',
                'email'=>'required|email|unique:users,email',
                'phone'=>'required',
                'role'=>'required',
                'phone'=>'required'

            ]);
            $emailcheck = User::where('email',$request->email)->get()->first();
          // dd($emailcheck);
          if($emailcheck != null){
            return redirect()->back()->with('message' ,'email exists already!');
        }
      // dd($request->password);
        //dd($request->confirm_password);
            if($request->password != $request->confirm_password){
                return redirect()->back()->with('password' ,'passwords do not match!');
            }

            $filename ="";
            if ($request->hasFile('image')) {
                $img =$request->file('image');
                $filename = 'img'.time().'.'.$img->getClientOriginalExtension();

                $imgPath = public_path('app\public');
                $img->move($imgPath ,$filename);
            }
          //  dd($filename);
            //   return $img;



            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'role' => $request->role,
                'phone' => $request->phone,
                'country'=>'admin',
                'state'=>'admin',
                'agree' => $request->agree,
                'image' => $filename,
                'profile_photo_path' => $imgPath

            ]);



            $role =0;
            //dd($role);
            if($role == 0){
                return redirect()->route('admin-page');
            }
            elseif($role == 1 ){
                return redirect()->route('service-page');
            }
            elseif($role == 2){
               return redirect()->route('user-page');
            }

    }
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function servicePage(){

        return view('serviceview.servicepage');
    }
    public function logout($id){
        $deltokens = User::find($id)->tokens()->delete();
        return redirect()->route('welcome');
    }
    public function userPage(){
        return view('userview.userpage');
    }
    public function adminPage(){
        return view('adminview.adminpage');
    }
    public function allServices(){
        $services = addservice::all();
       // dd($services);
        return view('chalyview.allservices' ,compact('services'));

    }

    public function search(Request $request)
    {
        $query = $request->service;

        $service = DB::table('addservices')
        ->where('Name', 'LIKE', '%' . $query . '%')
            ->get();

   $services = $service->unique('user_id');

        return view('chalyview.serviceSearch',compact('services'));
    }


    public function allHomes()
    {
        $homes = Homes::all();
        return view('userview.allhomes',compact('homes'));

    }
    public function signInPage(){
       return view('signroles.login');
    }
}
