<?php

namespace App\Http\Controllers;
use Auth;
use App\City;
use App\Client;
use App\BloodType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Mail\verifyEmail;
use Mail;

class AuthClientController extends Controller
{
      public function login()
    {
    	return view('client.login');
    }

    public function login_post(Request $request){

    	$remember  = request()->has('remember')?true:false;

    	if (Auth::guard('web-client')->attempt([

    		'email'=>request('email'),
    		'password'=>request('password') ],
    		$remember
    	)){

                if (auth()->guard('web-client')->user()->status == 0 ) {

                        auth()->guard('web-client')->logout();

                        return back()->with('notVerified' , 'Email Not Found Or Not Verified ');
                        }

            		return redirect('client/home');
            		
            	}else {
                    return back()->with('success' , 'Email Or Password Not Correct ');


        }
    }


    public function create(){

        $cities = City::pluck('name'  , 'id')->toArray();
        $blood_types = BloodType::pluck('name'  , 'id')->toArray();

      return  view('client.register' , compact('cities' , 'blood_types'));
    }



    public function store(Request $request){

         $this->validate($request ,[

                'name' => 'required',
                'email' => 'required|unique:clients',
                'password' => 'required|same:confirmed-password',
                'phone' => 'required|unique:clients|digits:11',
                'birth_date' => 'required|date-format:Y-m-d',
                'blood_type' => 'required|in:O-,O+,A+,A-,AB+,AB-,o-,o+,a-,a+,ab-,ab+',
                'city_id' => 'required',
                'donation_last_date' => 'required|date-format:Y-m-d',


        ]);
        $data = $request->all();

        $client = Client::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'phone' => $data['phone'],
                'birth_date' => $data['birth_date'],
                'blood_type' => $data['blood_type'],
                'city_id' => $data['city_id'],
                'donation_last_date' => $data['donation_last_date'],
                'verifyToken' => Str::random(40),
                
            ]);

        $blood_type = BloodType::where('name' , $request->blood_type)->first();

            $thisClient = Client::findOrFail($client->id);

            $client->cities()->attach($client->city_id);

            $client->types()->attach($blood_type->id);
        
        $this->sendEmail($thisClient);

        return redirect('client/login')->with('verifyEmail' , 'Visit You Email To Verify It And Login');

    /*
    \Auth::guard('web-client')->login($client);

    return Redirect::to('client/home');
       */
    }



    public function verifyEmailFirst()
    {
        return view('email.verifyEmailFirst');
    }


    public function sendEmail($thisClient)
    {
        
        Mail::to($thisClient['email'])->send(new verifyEmail($thisClient));
    }

    public function sendEmailDone($email , $verifyToken)
    {

        $client = Client::where(['email' => $email , 'verifyToken'=>$verifyToken])->first();

        if ($client) {
                
         Client::where(['email' => $email , 'verifyToken'=>$verifyToken])->update(['status'=>'1' , 'verifyToken'=> Null]);

         return redirect('client/login')->with('verifyDone', 'Your Email Is Verified , You Can Login Now');

            }else {

                return redirect('client/login')->with('verifyDone', 'Your Email Is Verified , You Can Login Now');
            }    
    }





    public function logout(){


    \Auth::guard('web-client')->logout();

    return redirect('client/home');

    }

}
