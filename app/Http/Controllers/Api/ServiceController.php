<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
use App\Models\servicepersonnel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\contactus;
use App\Models\addservice;
use Illuminate\Support\Facades\Auth;
// header('Access-Control-Allow-Origin: *');
class ServiceController extends Controller
{
    public function addService(Request $request){
        $name = $request->name;
        $desc = $request->desc;
        addservice::create(['Name'=>$name ,'Desc'=>$desc ]);
        return response()->json([
            'data'=>'success',
        ]);


    }
    public function removeService($service_id){
        service::destroy($service_id);
        return response()->json([
            'data'=>"success",
        ]);


    }

    public function addServicePerson(Request $request, $service_id){
        $Service = service::find($service_id);
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $password = Hash::make($request->password);
        if ($request->hasFile('profileImg')) {
            $img =$request->file('profileImg');
            $filename = 'img'.time().'.'.$img->getClientOriginalExtension();
            $imgPath = storage_path('app/public/');
            $img->move($imgPath ,$filename);
          }
          $Service->servicepersonnel()->create([
            'name'=>$name ,
            'email'=>$email ,
            'password'=>$password ,
            'phone'=>$phone,
            'profileImg'=>$filename,
            'availability'=>'yes',
        ]);
        return response()->json([
            'message'=>'service person  added',
        ]);

        
    }
    public function myProfile($id){
        $User = User::find($id);
        return response()->json([
            'info'=>$User
        ]);
    }
    public function myProfileImg($id){
        $User = User::find($id);
        $img = $User->image;
        return response()->json([
            'img'=>$img
        ]);
    }

    public function allService(){
        $services = addservice::all();
        return response()->json([
            'data'=>$services
        ]);
    }
    public function userServicePerson($id){
        $service = addservice::find($id);
         $servicepersons =[];
        $services = DB::table('services')->where('Name',$service->Name)->get();
        foreach ($services as $service) {
        $userId = $service->user_id;
        $serviceInfo  = User::find($userId);
        array_push($servicepersons ,$serviceInfo);
        }
        return response()->json([
            'data'=>$services,
            'serviceInfos'=>$servicepersons
        ]);
    }

    public function allServicePerson(){
        
        $servicepersons = DB::table('users')->where('role' ,'1')->get();
        return response()->json([
            'data'=>$servicepersons
        ]);
    }
    public function reqService(Request $request){
        $User  = Auth::user();
        $serviceperson_id = $request->serviceperson_id;
        $serviceperson =  User::find($serviceperson_id);
        $time_of_service = $request->timeOfService;
        $chargeperhour =$request->chargeperhour;
        $statement =$request->statement;
        $service_state = "awaiting";
        $phone = $request->phone;
        $service  =DB::table('services')->where('user_id' ,$serviceperson->id)->pluck('Name');
       $servicename = preg_replace('/[^A-Za-z0-9\-]/', '', $service);

        $serviceperson->serviceRequest()->create([
            'service_id'=> $servicename,
            'time-of-service'=>$time_of_service,
            'chargeperhour'=>$chargeperhour,
            'service-state'=>$service_state,
            'email' =>$User->email,
            'statement'=>$statement,
            'userrequestId'=>$User->id,
            'phone'=>$phone
        ]);

        
        
        return response()->json([
            'message' =>"success"
        ]);
    }

    public function myReqs(){
        $User  = Auth::user();
        $myservicepersonrequests =   DB::table('servicerequests')->where('userrequestId' ,$User->id)->pluck('user_id');
        $myservicenames=   DB::table('servicerequests')->where('userrequestId' ,$User->id)->pluck('service_id');
        
        $myrequests =   DB::table('servicerequests')->where('userrequestId' ,$User->id)->get();
        $serviceInfos =[];
        foreach($myservicepersonrequests as $myrequest) {
             $serviceInfo = User::find($myrequest);
             array_push($serviceInfos,$serviceInfo);
        }
      return response()->json([
        'serviceInfos'=>$serviceInfos,
        'myrequests'=>$myrequests
      ]);
       
    }

    public function serviceAss(Request $request ,$user_id ,$serviceperson_id){
        $User = User::find($user_id);
        $servicePerson = servicepersonnel::find($serviceperson_id);
        $mode_of_conduct =$request->modeOfConduct;
        $service_satisfaction = $request->serviceSatisfaction;
        $service_time_report = $request->serviceTimeReport;
        $service_state = "completed";
        DB::table('servicerequests')->where('email',$User->email)->where('service_id',$servicePerson->service_id)->update([
            'service-state' => "completed"
         ]);;
        DB::table('servicerequests')->where('email',$servicePerson->email)->where('service_id',$servicePerson->service_id)->update([
            'service-state'=>"completed"
        ]);
        $User->userServiceAsses()->create([
            'mode-of-conduct'=>$mode_of_conduct,
            'service-satisfaction'=>$service_satisfaction,
            'time-report'=>$service_time_report,
            'service-state' =>$service_state,
            'service-personId'=>$servicePerson->id
        ]);
        return response()->json([
            'message'=>'assesment recieved'
        ]);
    }


    public function serviceSelect($service_id){
        $serviceSelect = service::find($service_id);
       $servicepersons = $serviceSelect->servicepersonnel;
       return response()->json([
        'data'=>$servicepersons,
       ]);

    }

    public function contactUs(Request $request){
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
        contactus::create(['name'=>$name,'email'=>$email,'subject'=>$subject, 'message'=>$message]);
        return response()->json([
            'message'=>'done'
        ]);
    }

   public function removePerson($service_id){
    User::destroy($service_id);
    return response()->json([
        'data'=>"deleted!",
    ]);
   }

   public function findPerson($service_id){
    $user = User::find($service_id);
    return response()->json([
        'data'=>$user,
    ]);
   }

   public function updatePerson(Request $request ,$service_id){
    $user = User::find($service_id);
    $name = $request->name;
    $email = $request->email;
    $phone = $request->phone;
    $user->update([
        'name'=>$name ,
        'email' =>$email,
        'phone' =>$phone,
    ]);
    return response()->json([
        'data'=>"success",
    ]);
   }
   public function signupService(Request $request){
    $service_id = $request->service_id;
    $user = Auth::user();
    $servicePerson  = User::find($user->id);
    $service = addservice::find($service_id);
    $servicePerson->service()->create(['Name'=>$service->Name ,'Desc'=>$service->Desc]);
    return response()->json([
        'message' =>"success"
    ]);

   }
   public function myService(){
    $user = Auth::user();
    $myservices = $user->serviceRequest;
    return response()->json([
        'data'=>$myservices,
        
    ]);


   }
}
