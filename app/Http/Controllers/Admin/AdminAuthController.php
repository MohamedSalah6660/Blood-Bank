<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{


	public function logout(){

		\Auth::guard('web')->logout();

		return redirect('/login');

	}


}
