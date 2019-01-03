<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
class ReportController extends Controller
{
     public function create(){

    	return view('client.contact');


    }


    public function store(Request $request)
    { 
    	
    		$this->validate($request,[

    			'message'=>'required',


    		]);
            $contacts = $request->user()->report()->create($request->all());


    		return back()->with('success', 'Message Sent Successfully');

    }

}
