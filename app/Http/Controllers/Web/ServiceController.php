<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addservice;
use App\Models\service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function signupService(Request $request, $user_id, $service_id)
    {
        $service_id = $request->service_id;
        $user = User::find($user_id);
        $servicePerson  = User::find($user->id);
        $service = addservice::find($service_id);
       $registeredalready = DB::table('services')->where('user_id',$servicePerson->id)->get()->first();
        if($registeredalready != null)
        {
            return redirect()->back()->with('success', 'You are signed up for a service Already!');
        }

        $servicePerson->service()->create(['Name' => $service->Name, 'Desc' => $service->Desc, 'service_charge' => $service->service_charge]);

        return redirect()->route('my-services');
    }
    public function myworkerassesment($id)
    {
        $myassesments = DB::table('userassesments')->where('worker_id', $id)->get();
        //dd($myassesment);
        return view('serviceview.myassesments', compact('myassesments'));
    }
    public function workerAssesment($user_id)
    {
        $userId = $user_id;
        return view('serviceview.assesment', compact('userId'));
    }
    public function myServicesRequest()
    {
        $user = Auth::user();
        $myreqs =  $user->serviceRequest;
        //dd($myreqs);
        return view('serviceview.myservice', compact('myreqs'));
    }
    public function reqServicePerson($service_id)
    {

        $service = addservice::find($service_id);

        $workers_id = DB::table('services')->where('Name', $service->Name)->pluck('user_id');
       // dd($workers_id);
        $serviceworkers = [];
        foreach ($workers_id as  $worker_id) {
            $worker = User::find($worker_id);
            array_push($serviceworkers, $worker);
        }
        return view('chalyview.reqservicepersonnel', compact('service', 'serviceworkers'));
    }
    public function reqServicePage($service_id, $serviceperson_id)
    {
        $serviceperson = User::find($serviceperson_id);
        $service = addservice::find($service_id);
        //dd($serviceperson->id);
        return view('chalyview.reqService', compact('service', 'serviceperson'));
    }
    public function reqServiceForm(Request $request, $service_id, $serviceperson_id)
    {
        $User  = Auth::user();

        $serviceperson =  User::find($serviceperson_id);
        $time_of_service = $request->time_of_service;
        $chargeperhour = $request->chargeperhour;
        $statement = $request->statement;
        $service_state = "awaiting";
        $phone = $request->phone;
        $service  = DB::table('services')->where('user_id', $serviceperson->id)->pluck('Name');
        $servicename = preg_replace('/[^A-Za-z0-9\-]/', '', $service);

        $serviceperson->serviceRequest()->create([
            'service_id' => $serviceperson->name,
            'time_of_service' => $time_of_service,
            'chargeperhour' => $chargeperhour,
            'service_state' => $service_state,
            'email' => $User->email,
            'statement' => $statement,
            'userrequestId' => $User->id,
            'user_name' => $User->name,
            'phone' => $phone
        ]);
        //dd($a);

        return redirect()->route('my-services-request');
    }
    public function usersAllServices()
    {
        $services = addservice::all();
        return view('chalyview.allservices', compact('services'));
    }
    public function allServices()
    {
        $user =    Auth::user();
        $services = addservice::all();
        return view('serviceview.allservices', compact('services', 'user'));
    }
    public function myServices()
    {
        $user = Auth::user();
        $myreqs = $user->serviceRequest;
        return view('serviceview.myservice', compact('myreqs'));
    }
    public function startServiceWorker(Request $request, $user_id)
    {
        $serviceperson = Auth::user();
        $userperson = User::find($user_id);
        return view('serviceview.timer', compact('userperson', 'serviceperson'));
    }


    public function startServiceWorkerPost(Request $request, $user_id)
    {
        $timespent = $request->timespent;
        //  dd($timespent);
        $worker = Auth::user();
        $workerInfo = User::find($worker->id);
        // $user = User::find($user_id);
        $charges =  $workerInfo->service;
        $chargearray = [];
        foreach ($charges as $charge) {
            $charge_of_service = $charge->service_charge;
            array_push($chargearray, $charge_of_service);
        }
        $chargeamount = $chargearray[0];

        $totalcharge = $chargeamount * $timespent;
        $usermodel = User::find($workerInfo->id);
        $usermodel->workertimeservice()->create(['userrequestid' => $user_id, 'timespent' => $timespent, 'amount_to_be_paid' => $totalcharge]);
        DB::table('servicerequests')->where('user_id', $worker->id)->where('userrequestId', $user_id)->update([
            'service_state' => 'completed',
        ]);
        return redirect()->to('worker-assesment/' . $user_id);

        // return view('userview.timer', compact('servicename', 'serviceperson'));
    }

    public function workerAssesmentPost(Request $req, $user_id)
    {
        $worker = Auth::user();
        $workerInfo = User::find($worker->id);
        $assesment = $req->assesment;
        $workerInfo->workerassesment()->create(['assesment' => $assesment, 'solicitant_id' => $user_id]);
        DB::table('servicerequests')->where('user_id', $worker->id)->where('userrequestId', $user_id)->update([
            'service_state' => 'completed',
        ]);
        return redirect()->to('service-page');
    }
}
