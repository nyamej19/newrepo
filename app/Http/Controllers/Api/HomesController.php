<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homes;
use App\Models\Buyhome;
use App\Models\User;
use Illuminate\Support\Facades\DB;

// header('Access-Control-Allow-Origin: *');
class HomesController extends Controller
{
    public function addHome(Request $request){

    
        // adding a home
        $price = $request->price;
        $location = $request->location;
        $details = $request->detailDesc;
        $homeType = $request->homeType;
        $summary = $request->summDesc;
        $saleType = $request->saleType;

        
       
        //taking mulitple images
        $homeImg = array();
        if($files = $request->file('homeImg')){
            foreach($files as $file){
                $filename = 'img'.time().'.'.$file->getClientOriginalExtension();
                $imgPath = storage_path('app/public/');
                $img_url =$filename;
                $file->move($imgPath ,$filename);
                $homeImg[] =$img_url;
            }
        }

   //taking mulitiple videos
     $homeVid = array();
     if($vids  = $request->file('homeVid')){
        foreach ($vids as $vid){
            $vidname = 'vid'.time().'.'.$vid->getClientOriginalName();
            $Vidpath = storage_path('app/public/');
            $vid_url = $vidname;
            $vid->move($Vidpath, $vidname);
            $homeVid[] =$vid_url;
        }
       
    }
       //saving data
    Homes::create([
        'price'=>$price ,
        'homeImg' => implode('|' ,$homeImg),
        'homeVid'=> implode('|',$homeVid),
        'location'=>$location,
        'detailDesc'=>$details ,
        'homeType'=>$homeType ,
        'summDesc' =>$summary,
        'saleType' =>$saleType,
        'availability'=>'yes'
    ]);
     return response()->json([
            'messages'=> 'received',
            'data' =>'success',
        ]);
    }


    public function Buyhome(Request $request ,$user_id,$home_id){

        
        $Buyer = User::find($user_id);
        $name =$Buyer->name;
        $email =$Buyer->email;
        $phone =$Buyer->phone;
        $availability ='no';
        $paymentType =$request->payment_type;
        $HomeBuy = Homes::find($home_id);
        if ($HomeBuy->availability == "no") {
            return response()->json([
                'message' => 'not available for sale',
            ]);
        }
        $homeId = $home_id;
        $price = $HomeBuy->price;
        //create Buyer
        $Buyer->buyHome()->create([
            'price'=>$price ,
            'name' =>$name,
            'email'=>$email ,
            'phone'=>$phone,
            'paymentType'=>$paymentType,
            'availability'=>$availability,
            'homeId'=>$homeId
    ]);

    //update availability
    DB::table('homes')->where('id', $home_id)->update(['availability'=> $availability]); 
    $data = $Buyer->buyHome;
    return response()->json([
        'status'=> 'success',
        'data' => $data,
    ]);
       
    }
    public function allHomes(){
        $homes =Homes::all();
        return response()->json([
            'data'=>$homes
        ]);
    }
    public function homeSale(){
      $saleHomes =  DB::table('homes')->where('saleType' , "sale")->get();
      return response()->json([
        'data'=>$saleHomes,
      ]);
    }
    public function homeRent(){
        $rentHomes =  DB::table('homes')->where('saleType' , "rent")->get();
        return response()->json([
          'data'=>$rentHomes,
        ]);
      }
      public function topListing(){
        $topListings =  DB::table('homes')->where('price' ,'>', "10000000")->get();
        return response()->json([
          'data'=>$topListings,
        ]);
      }
    public function delHome($home_id)
    {
        Homes::destroy($home_id);
        return response()->json([
            'data'=>"deleted!",
        ]);
       
        
    }

   

    public function findHome($home_id)
    {
       $home = Homes::find($home_id);
        return response()->json([
            'data'=>$home,
        ]);
       
        
    }
    public function updateHome(Request $request ,$home_id){
        $home = Homes::find($home_id);
        $price = $request->price;
        $location = $request->location;
        $details = $request->detailDesc;
        $homeType = $request->homeType;
        $summary = $request->summDesc;
        $saleType = $request->saleType;

        
       
        //taking mulitple images
        $homeImg = array();
        if($files = $request->file('homeImg')){
            foreach($files as $file){
                $filename = 'img'.time().'.'.$file->getClientOriginalExtension();
                $imgPath = storage_path('app/public/');
                $img_url =$filename;
                $file->move($imgPath ,$filename);
                $homeImg[] =$img_url;
            }
        }

   //taking mulitiple videos
     $homeVid = array();
     if($vids  = $request->file('homeVid')){
        foreach ($vids as $vid){
            $vidname = 'vid'.time().'.'.$vid->getClientOriginalName();
            $Vidpath = storage_path('app/public/');
            $vid_url = $vidname;
            $vid->move($Vidpath, $vidname);
            $homeVid[] =$vid_url;
        }
       
    }
       //saving data
    $home->update([
        'price'=>$price ,
        'homeImg' => implode('|' ,$homeImg),
        'homeVid'=> implode('|',$homeVid),
        'location'=>$location,
        'detailDesc'=>$details ,
        'homeType'=>$homeType ,
        'summDesc' =>$summary,
        'saleType' =>$saleType,
        'availability'=>'yes'
    ]);
     return response()->json([
            'messages'=> 'updated',
            'data' =>'success',
        ]);
    }
}
