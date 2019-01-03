<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class CategoryController extends Controller
{

    public function index()
    {
                   
        $categories = Category::paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
        //
    }

 
    public function store(Request $request)
    {
        $this->validate($request,[

            'name'=>'required'

        ]);

        $category = Category::create($request->all());
        $category->save();

        return redirect('admin/category')->with('success', 'Created Successfully');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       $categories = Category::find($id);

        return view('admin.category.edit', compact('categories'));
       }

    public function update(Request $request, $id)
    {
         $this->validate($request,[

            'name'=>'required'

        ]);

        $category = Category::find($id);
       $category->name = $request->input('name');

        $category->save();
        return redirect('admin/category')->with('success', 'Updated successfully');    }

    public function destroy($id)
    {
       
         }


    public function delete(Request $request)
     {
        if($request->categories){
            Category::destroy($request->categories);
            return back()->with('delete' , ' Deleted Successfully'); 
        }
      
        else{
             return back()->with('delete' , ' please check value');
        }
    
     
      }
}
