<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'Desc')->paginate(5);

        return view('admin.post.index', compact('posts'));    


            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::pluck('name' , 'id')->toArray(); 

        return view('admin.post.create' , compact('categories'));
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

            'title'=>'required',
            'content'=> 'required',
            'category_id'=>'required',
            'thumbnail'=>'required'



        ]);

        if ($request->hasFile('thumbnail')) {

            $fileNameWithExtension = $request->file('thumbnail')->getClientOriginalName();

           $fileName=pathinfo( $fileNameWithExtension,PATHINFO_FILENAME);
           
          $extension =$request->file("thumbnail")->getClientOriginalExtension();
            $fileNameStore=$fileName.'_'.time().'.'.$extension;
           
            $path=$request->file("thumbnail")->storeAs('public/image', $fileNameStore);
            
        } else{
            $fileNameStore='public/image/no-image.jpg';
        }
      /*  if ($request->hasFile('thumbnail')) {

            $path = $request->file('thumbnail')->store('public/image');
            $file =pathinfo($path , PATHINFO_BASENAME);
        }
*/

        $post = new Post;
        $post->title =$request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        $post->thumbnail = $request->input('thumbnail');
        $post->thumbnail = $fileNameStore;
        $post->save();

        return redirect('admin/post')->with('success', 'Created Successfully');

            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $posts = Post::findOrFail($id);

        $categories = Category::pluck('name', 'id')->toArray();
        
        return view('admin.post.edit', compact('posts', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          
            $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'required',
            'category_id' => 'required'
        ]);
       if($request->has('thumbnail')){
            $filenameWithExtension=$request->file("thumbnail")->getClientOriginalName();

            $fileName=pathinfo( $filenameWithExtension,PATHINFO_FILENAME);
            $extension =$request->file("thumbnail")->getClientOriginalExtension();

            $fileNameStore=$fileName.'_'.time().'.'.$extension;
            
            $path=$request->file("thumbnail")->storeAs('public/image/', $fileNameStore);
        }
        else{
            $fileNameStore='public/image/no_image.jpg';
        }


              $post= Post::find($id);
              $post->title = $request->input('title');
              $post->content = $request->input('content');
              $post->thumbnail=$fileNameStore;
              $post->category_id = $request->input('category_id'); 
              $post->save();


        return redirect('admin/post')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function delete(Request $request)
    {
        if($request->posts){
            Post::destroy($request->posts);
            return back()->with('delete' , ' Deleted Successfully'); 
        }
      
        else{
             return back()->with('delete' , ' please check value');
        }
    
     
     }
}
