<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
class PostController extends Controller
{
    
	public function show($post_title){

		$category = Category::with('post')->get();

		$posts = Post::where('posts.title', $post_title)->get();

		return view('client.showpost', compact('posts' , 'category'));

 
	}

	public function allposts(){

		$posts = Post::all();

		return view('client.allposts' , compact('posts'));


	}

    }
