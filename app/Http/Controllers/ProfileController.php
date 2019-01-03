<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\City;
class ProfileController extends Controller
{
    
	public function edit(){

	$clients = auth()->guard('web-client')->user();

	$cities = City::pluck('name', 'id')->toArray();

	return view('client.profile', compact('clients', 'cities'));

}



public function update(Request $request)
{

	$this->validate($request , [

		'name'=>'required',
		'email'=>'required',
		'birth_date'=>'required',
		'phone'=>'required',
		'password'=>'required|same:confirm-password',
		'blood_type'=>'required',
		'donation_last_date'=>'required',
		'city_id'=>'required',


	]);
    $request->merge(['password'=> bcrypt($request->password)]);


	$client = auth()->guard('web-client')->user();

	$client->update($request->all());

	return back()->with('success' , 'Updated Successfully');


}



    }
