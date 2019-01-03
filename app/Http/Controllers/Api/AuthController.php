<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Governorate;
use App\City;
use App\Client;
use Hash;
use App\Token;

class AuthController extends Controller
{
	public function register(Request $request)
	{
		$validator = validator()->make($request->all(),[

			'name' => 'required',
			'email' => 'required|unique:clients',
			'password' => 'required|confirmed',
			'phone' => 'required|unique:clients|digits:11',
			'birth_date' => 'required|date-format:Y-m-d',
			'blood_type' => 'required|in:O-,O+,A+,A-,AB+,AB-',
			'city_id' => 'required',
			'donation_last_date' => 'required|date-:Y-m-d',

		]);
		if ($validator->fails()) {
		
			return responseJson(0 , $validator->errors()->first() , $validator->errors());
		}

		$request->merge(['password'=> bcrypt($request->password)]);
		$client = Client::create($request->all());
		$client->api_token = str_random(60);
		$client->save();

		return responseJson(1, 'تم الاضافه بنجاح' , [

			'api_token' =>$client->api_token, 
			'client' => $client,

		]);	
	}



	public function login(Request $request){

			$validator = validator()->make($request->all(),[

			'password' => 'required',
			'phone' => 'required',
		
		]);
		if ($validator->fails()) {
		
			return responseJson(0 , $validator->errors()->first() , $validator->errors());
		}

		$client = Client::where('phone', $request->phone)->first();

		if ($client) {

			if (Hash::check($request->password, $client->password)) {
		

				return responseJson(1 , 'تم تسجيل الدخول' , [
				
					'api_token' =>$client->api_token, 

					'client' => $client

				]);
			
			}else {
			
			return responseJson(0 , 'البيانات غير صحيحة' );

			}
	
		}else {
			return responseJson(0 , 'البيانات غير صحيحة' );
	
		}
		//return auth()->guard('api')->validate($request->all()); ( With session Not Api)
	}



	public function  reset(Request $request)
	{

	    $validation = validator()->make($request->all(), [
            'phone' => 'required'
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0,$validation->errors()->first(),$data);
        }
	
        $user = Client::where('phone', $request->phone)->first();

        if ($user) {

        	$code = rand(1111, 9999);
        	$update = $user->update(['pin_code' =>$code]);

        	    if ($update) {

        		                // send email
//Mail::send('emails.reset', ['code' => $code], function ($mail) use($user) {
//                    $mail->from('app.mailing.test@gmail.com', 'تطبيق باب رزق');
//
//                    $mail->to($user->email, $user->name)->subject('إعادة تعيين كلمة المرور');
//                });

   				 return responseJson(1,'برجاء فحص هاتفك',['pin_code_for_test' => $code]);

				}else{

              	  return responseJson(0,'حدث خطأ ، حاول مرة أخرى');
  			    }

		}else{

            return responseJson(0,'لا يوجد أي حساب مرتبط بهذا الهاتف');
  		}
     }




	public function password(Request $request){

		$validation = validator()->make($request->all(), [
	            'pin_code' => 'required',
	            'password' => 'confirmed'
	        ]);

	        if ($validation->fails()) {
	            $data = $validation->errors();
	            return responseJson(0,$validation->errors()->first(),$data);
	        }

	        $user = Client::where('pin_code',$request->pin_code)->where('pin_code','!=',0)->first();

	        if ($user)
	        {
	            $user->password = bcrypt($request->password);
	            $user->pin_code = null;

	            if ($user->save())
	            {
	                return responseJson(1,'تم تغيير كلمة المرور بنجاح');
	            }else{
	                return responseJson(0,'حدث خطأ ، حاول مرة أخرى');
	            }
	            
	        }else{
	            return responseJson(0,'هذا الكود غير صالح');
	        }
	    }



    public function registerToken(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'token' => 'required'
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0,$validation->errors()->first(),$data);
        }
        Token::where('token',$request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return responseJson(1,'تم التسجيل بنجاح');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function removeToken(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'token' => 'required',
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0,$validation->errors()->first(),$data);
        }

        Token::where('token',$request->token)->delete();

        return responseJson(1,'تم  الحذف بنجاح بنجاح');
    }









	}


