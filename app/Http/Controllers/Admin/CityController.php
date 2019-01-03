<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Governorate;
use Validator;
 
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cities = City::orderBy('id', 'desc')->paginate(5);

        return view('admin.city.index',compact('cities'));

            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $governorates = Governorate::pluck('name', 'id')->toArray();

        return view('admin.city.create', compact('governorates'));
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

            'name' => 'required|unique:cities',

            'governerate_id'=>'required'

        ]);

        $city = City::create($request->all());

        $city->save();

                return redirect('admin/city')->with('success' , 'Created Successfully');

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
        $cities = City::findOrFail($id);

        $governorate = Governorate::pluck('name', 'id')->toArray();
        
        return view('admin.city.edit', compact('cities', 'governorate'));



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
           $this->Validate($request, [

            'name'=>'required',
            'governerate_id'=>'required'

        ]);

        $city = City::find($id);
        $city->update($request->all());

        $city->save(); 

        return redirect('admin/city')->with('success', 'Updated Successfully');

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
    if($request->cities){
        City::destroy($request->cities);
        return back()->with('delete' , ' Deleted Successfully'); 
    }
  
    else{
         return back()->with('delete' , ' please check value');
    }

 
 }

}