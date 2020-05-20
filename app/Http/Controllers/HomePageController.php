<?php

namespace App\Http\Controllers;
 
use Request;
use DB;
use App\Post;
use App\City;
use App\Category;
use App\Donation;
class HomePageController extends Controller
{
    public function homepage(){

    	

    	return view('client.home');

    }

	public function index(){

		$posts = Post::with('category')->latest()->limit(6)->get();


		$donations = Donation::orderBy('id', 'desc')->paginate(5);


		
			return view('client/home' , compact('posts' , 'categories', 'donations'));


	}


	public function nav(){

		return view('client.navo');
	}


	public function search(Request $request ){

		$query = Request::input('search');

		$cities = City::with('donation_request')->where('name','LIKE', '%' . $query . '%')->get();


		return view('client.searchresult' , compact('cities' ));


	}


}
