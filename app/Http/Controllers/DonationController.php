<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donation;
use App\Notification;
use App\Client;
use App\City;
use App\BloodType;
use App\Governorate;
use App\Notifications\Donationrequest;
class DonationController extends Controller
{

    public function create()
    {
  
        $bloodtypes = BloodType::pluck('name' , 'id')->toArray();

        $governorates = Governorate::all();

        $cities = City::pluck('name' , 'id')->toArray();

        return view('client.donationrequest' ,compact('bloodtypes' , 'cities', 'governorates'));

            }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request , [

        'patient_name' => 'required',
        'patient_age' => 'required',
        'hospital_name' => 'required',
        'hospital_address' => 'required',
        'blood_bags' => 'required',
        'phone' => 'required|unique:donations',
        'blood_type_id' => 'required',
        'city_id' => 'required',
        'patient_name' => 'required',
        'notes' => 'required',
]);

        $newDonation = Donation::create($request->all());



        $notifications = Notification::create([
            'title'=>'New Notification From' ,
             'content'=> 'Belongs To '. $newDonation->patient_name . 
             'Added By ' . \Auth::guard('web-client')->user()->name,
             'donation_request_id'=> $newDonation->id]); 
               //Create Notify

               $getclients = Client::whereHas('cities', function($q) use($newDonation){

                $q->where('cities.id', $newDonation->city_id);
    
            })->whereHas('types', function($q) use($newDonation){
    
                $q->where('blood_types.id' , $newDonation->blood_type_id);
    
            })->pluck('clients.id')->toArray(); // get Clients By Pluck

            // dd($getclients);
            
            $attach = $notifications->clients()->attach($getclients);
       
            return back()->with('success' , 'Donation Request Done');

        return view('client.layouts.navbar' , compact('notifications' , 'newDonation' , 'client'));
        }  

    public function donation_details($donation_phone)
    {

        $donations = Donation::where('donations.phone', $donation_phone)->get();

        return view('client.patientdetails' , compact('donations'));


    }
}
