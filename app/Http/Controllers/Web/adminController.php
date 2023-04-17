<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addservice;
use App\Models\Homes;
use App\Models\contactus;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\userassesment;
use App\Models\workerassesment;

class AdminController extends Controller
{
    public function addServicePage(){
        return view('adminview.addservice');
    }
    public function addService(Request $request)
    {
        $servicename = $request->name;
        $serviceDescritption = $request->description;
        $servicecharge =$request->servicecharge;
        addservice::create(['Name'=>$servicename ,'Desc'=>$serviceDescritption , 'service_charge'=>$servicecharge]);
        return redirect()->route('admin-services');

    }
    public function workerAssesment(){
        $workerAssesments = workerassesment::all();
        return view('adminview.workerassesment',compact('workerAssesments'));
    }
    public function userAssesment()
    {
        $userAssesments = userassesment::all();
        return view('adminview.userassesment', compact('userAssesments'));
    }
    public function allAssesments(){
        $workerAssesments = workerassesment::all() ;
        $userAssesments = userassesment::all();
        return view('adminview.assesment',compact('workerAssesments' , 'userAssesments'));
    }
    public function adminServices(){
      $allservices =   addservice::all();
        return view('adminview.adminservice' ,compact('allservices'));
    }

    public function addHome(Request $request){
       // dd($request->all());
        $price = $request->price;
        $homevid = $request->homevid;
        $location = $request->location;
        $details = $request->detailDesc;
        $homeType = $request->homeType;
        $summary = $request->summDesc;
        $saleType = $request->saleType;
        if($file = $request->file('homeImg')){

                $filename = 'img'.time().'.'.$file->getClientOriginalExtension();
                $imgPath = public_path('app/public/');
                $img_url =$filename;
                $file->move($imgPath ,$filename);
                $homeImg=$img_url;

        }
    //  if($vid  = $request->file('homeVid')){

    //         $vidname = time().$vid->getClientOriginalName();
    //        // dd($vidname);
    //         $Vidpath = public_path('app/public/');
    //         $vid_url = $vidname;
    //         $vid->move($Vidpath, $vidname);
    //         $homeVid =$vid_url;


    // }
    Homes::create([
        'price'=>$price ,
        'homeImg' => $homeImg,
        'homeVid'=>$homevid,
        'location'=>$location,
        'detailDesc'=>$details ,
        'homeType'=>$homeType ,
        'summDesc' =>$summary,
        'saleType' =>$saleType,
        'availability'=>'yes'
    ]);

    return redirect()->route('admin-homes');

    }
    public function adminHomes(){
        $homes =   Homes::all();
          return view('adminview.adminhomes' ,compact('homes'));
      }
      public function addHomePage(){

          return view('adminview.addhome');
      }
      public function removeHome($id){
        $home =Homes::destroy($id);
        return redirect()->route('admin-homes');


      }
      public function editHomePage($id){
        $home =Homes::find($id);
        return view('adminview.edithome',compact('home'));
      }
    public function buyHomePage($id)
    {
         $home = Homes::find($id);
        return view('chalyview.buyhomepage', compact('home'));
    }
    public function rentHomePage($id)
    {
        $home = Homes::find($id);
        return view('chalyview.renthomepage', compact('home'));
    }

    public function buyHome(Request $request, $home_id)
    {
        $user = Auth::user();
        $Buyer = User::find($user->id);
        $name = $Buyer->name;
        $email = $Buyer->email;
        $phone = $Buyer->phone;
        $availability = 'no';
        $paymentType = $request->payment_type;
        $HomeBuy = Homes::find($home_id);
        if ($HomeBuy->availability == "no") {
            return "home not ";
        }
        $homeId = $home_id;
        $price = $HomeBuy->price;
        //create Buyer
        $Buyer->buyHome()->create([
            'price' => $price,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'paymentType' => $paymentType,
            'availability' => $availability,
            'homeId' => $homeId
        ]);
        return redirect()->to('admin-page');


    }
    public function rentHome(Request $request, $home_id)
    {
        $user = Auth::user();
        $Buyer = User::find($user->id);
        $name = $Buyer->name;
        $email = $Buyer->email;
        $phone = $Buyer->phone;
        $availability = 'no';
        $paymentType = $request->payment_type;
        $HomeBuy = Homes::find($home_id);
        if ($HomeBuy->availability == "no") {
            return "home not ";
        }
        $homeId = $home_id;
        $price = $HomeBuy->price;
        //create Buyer
        $Buyer->buyHome()->create([
            'price' => $price,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'paymentType' => $paymentType,
            'availability' => $availability,
            'homeId' => $homeId
        ]);
        return redirect()->to('admin-page');
    }

      public function editHome(Request $request ,$home_id){
        //dd($request->all());
        $home = Homes::find($home_id);
        $price = $request->price;
        $homevid =$request->homelink;
        $location = $request->location;
        $details = $request->detailDesc;
        $homeType = $request->homeType;
        $summary = $request->summDesc;
        $saleType = $request->saleType;
        $availability = $request->availability;



        if($file = $request->file('homeImg')){

            $filename = 'img'.time().'.'.$file->getClientOriginalExtension();
            $imgPath = public_path('app/public/');
            $img_url =$filename;
            $file->move($imgPath ,$filename);
            $homeImg=$img_url;

    }
//  if($vid  = $request->file('homeVid')){

//         $vidname = time().$vid->getClientOriginalName();

//         $Vidpath = public_path('app/public/');
//         $vid_url = $vidname;
//         $vid->move($Vidpath, $vidname);
//         $homeVid =$vid_url;


// }
       //saving data
    $home->update([
        'price'=>$price ,
        'homeImg' => $homeImg,
        'homeVid'=> $homevid,
        'location'=>$location,
        'detailDesc'=>$details ,
        'homeType'=>$homeType ,
        'summDesc' =>$summary,
        'saleType' =>$saleType,
        'availability'=>$availability
    ]);
    return redirect()->route('admin-homes');
}

public function removeService($id){
    $service =addservice::destroy($id);
    return redirect()->route('admin-services');


  }
  public function allMessages(){
    $allMessages = contactus::all();
    return view('adminview.allcontacts' ,compact('allMessages'));
  }


}
