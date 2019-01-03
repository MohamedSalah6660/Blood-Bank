<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
class ContactController extends Controller
{
    public function create(){

    	return view('client.contact');


    }


    public function store(Request $request)
    { 
    	
    		$this->validate($request,[

    			'title'=>'required',
    			'message'=>'required',


    		]);

    		$contacts = $request->user()->contact()->create($request->all());
    		//$contacts->save();
    		return back()->with('success', 'Message Sent Successfully');

    }
}
