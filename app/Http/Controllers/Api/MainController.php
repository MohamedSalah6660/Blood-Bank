<?php
 
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Governorate;
use App\City;
use App\Post;
use App\Category;
use App\BloodType;
use App\Donation;
use App\Report;
use App\Contact;
use App\Notification;
use App\Client;
use App\ClientPost;
use Auth;
use App\Setting;

class MainController extends Controller
{

	

	public function governorates(){


		$governorates = Governorate::paginate(5);

		return responseJson(1, 'success', $governorates);


	}


	public function cities(Request $request) {

       $cities = City::where(function ($query) use($request){

           if($request->has('governerate_id'))
           {

               $query->where('governerate_id', $request->governerate_id);
           }

       })->get();

       return responseJson(1 , 'success' ,$cities);

   }


	public function posts(Request $request) {

       $posts = Post::where(function ($query) use($request){

           if($request->has('category_id'))
           {

               $query->where('category_id', $request->category_id);
           }

       })->get();

       return responseJson(1 , 'success' ,$posts);

   }




	public function categories(){


		$categories = Category::paginate(5);

		return responseJson(1, 'success', $categories);


	}


	public function bloodtype(){


		$blood_type = BloodType::paginate(5);

		return responseJson(1, 'success', $blood_type);

 
	}

	

	public function donations_form(Request $request){

		$validator = Validator()->make($request->all(),[

			'patient_name'=>'required',
			'patient_age'=>'required|numeric',
			'blood_type_id'=>'required',
			'blood_bags'=>'required|numeric',
			'hospital_name'=>'required',
			'hospital_address' => 'required',
			'phone'=>'required|numeric',
			'notes'=>'required',
			'city_id'=>'required|numeric',


		]);

		if ($validator->fails()) {
			
			return responseJson(0 , $validator->errors()->first() , $validator->errors());

		}

		$donation = Donation::create($request->all());

		$notification = Notification::create([
		'title'=>'Notify',
		'content'=> 'You have Notify',
		'donation_request_id'=> $donation->id]);     //Create Notify



		$getclients = Client::whereHas('cities', function($q) use($donation){

			$q->where('cities.id', $donation->city_id);

		})->whereHas('types', function($q) use($donation){

			$q->where('blood_types.id' , $donation->blood_type_id);

		})->pluck('id')->toArray(); // get Clients By Pluck
		
		$notification->clients()->attach($getclients);

		//Create Notify

		//return $request->user()->notifications;

		return responseJson(1, 'success', $donation);



	}


	public function donations_requests(){

		$donations_requests = Donation::paginate(5);

		return responseJson(1, 'success', $donations_requests);


	}

	public function reports(Request $request){

		$validator = Validator()->make($request->all(),[

			'message'=>'required',
			'client_id'=>'required|numeric',
			

		]);

		if ($validator->fails()) {
			
			return responseJson(0 , $validator->errors()->first() , $validator->errors());

		}

		$reports = Report::create($request->all());
		$reports->save();
		return responseJson(1, 'success', $reports);


	}

	public function contacts(Request $request){


		$validator = Validator()->make($request->all(),[

			'title'=>'required',
			'message'=>'required',
			'client_id'=>'required|numeric',
			

		]);

		if ($validator->fails()) {
			
			return responseJson(0 , $validator->errors()->first() , $validator->errors());

		}

		$contacts = Contact::create($request->all());
		$contacts->save();
		return responseJson(1, 'success', $contacts);

	}



	public function notifications(){


		$notifications = Notification::with('donations')->paginate(5);

		return responseJson(1, 'success', $notifications);


	}

	public function clients(){


		$clients = Client::withCount('report', 'contact')->get();

		return responseJson(1, 'success', $clients);


	}



	public function profile(Request $request) {
         
          $client = Auth::guard('api')->user();

          if ($request->has('name')) {
           $client->name= $request->input('name');
          }

          if ($request->has('email')) {
           $client->name= $request->input('email');
          }

           if ($request->has('birth_date')) {
           $client->birth_date= $request->input('birth_date');
          }
           if ($request->has('phone')) {
           $client->phone= $request->input('phone');
          }
          if ($request->has('password')) {
           $client->password= $request->input('password');
          }
          if ($request->has('donation_last_date')) { 
           $client->donation_last_date= $request->input('donation_last_date');
          }
          if ($request->has('blood_type')) {
           $client->blood_type= $request->input('blood_type');
          } 
          if ($request->has('city_id')) {
           $client->city_id= $request->input('city_id');
          } 
          $client->save();

           return responseJson(1,'success',$client);
          }




    public function settings()


    {
       $settings = Setting::paginate(5);

        return responseJson(1,'loaded',$settings);
    }



    public function notificationsSettings(Request $request)
    {
        $rules = [
            'cities.*' => 'exists:cities,id',
            'blood_types.*' => 'exists:blood_types,name',
        ];
        $validator = validator()->make($request->all(),$rules);
        if ($validator->fails())
        {
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }

        if ($request->has('cities'))
        {
            $request->user()->cities()->sync($request->cities);
        }

        if ($request->has('blood_types'))
        {
            $blood_types = BloodType::whereIn('name',$request->blood_types)->pluck('blood_types.id')->toArray();
            
            $request->user()->bloodTypes()->sync($request->$blood_types);
        }

        $data = [
            'cities' => $request->user()->cities()->pluck('cities.id')->toArray(),
            'bloodTypes' => $request->user()->bloodTypes()->pluck('blood_types.name')->toArray(),
        ];
        return responseJson(1,'تم  التحديث',$data);
    }



	}


