<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Homes;
use App\Models\wishList;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use App\Models\usertimeservice;
use App\Models\workertimeservice;

class UserController extends Controller
{
    public function myServicesRequest()
    {
        $User  = Auth::user();
        // dd($User);
        $myservicepersonrequests =   DB::table('servicerequests')->where('email', $User->email)->pluck('user_id');
        // $myservicenames =   DB::table('servicerequests')->where('userrequestId', $User->id)->pluck('service_id');

        $myrequests =   DB::table('servicerequests')->where('userrequestId', $User->id)->get();
        $serviceInfos = [];
        $services = [];
        foreach ($myrequests as $myrequest) {
            $servicename = $myrequest->service_id;
            array_push($services, $servicename);
        }

        foreach ($myservicepersonrequests as $myrequest) {
            $serviceInfo = User::find($myrequest);
            array_push($serviceInfos, $serviceInfo);
        }
        //dd($serviceInfos);
        //$data = [];
        //  $finalresults =  array_merge($serviceInfos, $services);
        //dd($a);
        return view('userview.myservice', compact('serviceInfos'));
    }
    public function userAssesment($worker_id)
    {
        $workmanId  = $worker_id;
        return view('userview.assesment', compact('workmanId'));
    }
    public function userAssesmentPost(Request $req, $worker_id)
    {
        $user = Auth::user();
        $userInfo = User::find($user->id);
        $assesment = $req->assesment;
        //dd($assesment);
        $userInfo->userassesment()->create(['assesment' => $assesment, 'worker_id' => $worker_id]);

        return redirect()->to('user-page');
    }
    public  function wishList(Request $request, $id)
    {
        $home = Homes::find($id);
        $user = Auth::user();
        $User = User::find($user->id);
        $price = $home->price;
        $location = $home->location;
        $details = $home->detailDesc;
        $homeType = $home->homeType;
        $summary = $home->summDesc;
        $saleType = $home->saleType;
        $homeImg = $home->homeImg;
        $homeVid = $home->homeVid;
        // serviceRequest()
        $User->wishlist()->create([
            'price' => $price,
            'homeImg' => $homeImg,
            'homeVid' => $homeVid,
            'location' => $location,
            'detailDesc' => $details,
            'homeType' => $homeType,
            'summDesc' => $summary,
            'saleType' => $saleType,
            'availability' => 'yes'
        ]);
        return redirect()->route('my-wishlist');
    }

    public  function MywishList()
    {
        $user = Auth::user();
        $mywishlists = $user->wishlist;
        return view('userview.wishlist', compact('mywishlists'));
    }
    public function removeWish($id)
    {
        wishList::destroy($id);
        return redirect()->route('my-wishlist');
    }
    public function startService(Request $request, $serviceperson_id)
    {
        $userRequested = Auth::user();
        $serviceperson = User::find($serviceperson_id);
        $servicename =  $serviceperson->service;
        //dd($a);
        return view('userview.timer', compact('servicename', 'serviceperson'));
    }



    public function startServicePost(Request $request, $serviceperson_id)
    {
        $timespent = $request->timespent;

        $serviceperson = User::find($serviceperson_id);
        $charges =  $serviceperson->service;
        $chargearray = [];
        foreach ($charges as $charge) {
            $charge_of_service = $charge->service_charge;
            array_push($chargearray, $charge_of_service);
        }
        $chargeamount = $chargearray[0];
        //    dd($chargeamount);
        $totalcharge = $chargeamount * $timespent;
        $user = Auth::user();
        $usermodel = User::find($user->id);
        $usermodel->usertimeservice()->create(['worker_id' => $serviceperson_id, 'timespent' => $timespent, 'amount_to_be_paid' => $totalcharge]);
        DB::table('servicerequests')->where('user_id', $serviceperson_id)->where('userrequestId', $user->id)->update([
            'service_state' => 'completed',
        ]);
        return redirect()->to('user-assesment/' . $serviceperson_id);

        // return view('userview.timer', compact('servicename', 'serviceperson'));
    }
}
