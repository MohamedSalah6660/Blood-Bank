<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Governorate;
use Validator;
 
class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             
        $governorates = Governorate::paginate(5);

        return view('admin.governorate.index', compact('governorates'));

            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.governorate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {       
       $this->validate($request, [

           'name' => 'required|unique:governerates',

       ]);

        $governorates = Governorate::create($request->all());

        $governorates->save();
    

        return redirect('admin/governorate')->with('success', 'Governorate Created Successfully');

            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        


            }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $governorates = Governorate::find($id);

        return view('admin.governorate.edit', compact('governorates'));
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
    

        $governorate = Governorate::find($id);
        $governorate->update($request->all());
        $governorate->save();
        return redirect('admin/governorate')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        
        $governorate = Governorate::find($id);
       
       if ($governorate->city()->count()) {
           
         return back()->with('message', 'You Cant Delete This Governorate Cause it has Cities');   
        }else {
            
        $governorate->delete();
        return redirect('admin/governorate')->with('Deleted Successfully', ' Governorate Deleted  ');
        }
  

    }


    
}
