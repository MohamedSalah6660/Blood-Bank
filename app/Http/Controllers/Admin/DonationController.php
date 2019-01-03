<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donation;
use App\City;
use App\BloodType;
class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations  = Donation::orderBy('id' , 'desc')->paginate(5);

        return view('admin.donation.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $bloodtypes = BloodType::pluck('name' , 'id')->toArray();

        $cities = City::pluck('name' , 'id')->toArray();

        return view('admin.donation.create' ,compact('bloodtypes' , 'cities'));


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

        'patient_name' => 'required',
        'patient_age' => 'required',
        'hospital_name' => 'required',
        'hospital_address' => 'required',
        'blood_bags' => 'required',
        'phone' => 'required|unique:donations',
        'blood_type_id' => 'required',
        'city_id' => 'required',
        'patient_name' => 'required',
        'notes' => 'required',
]);

        $donations = Donation::create($request->all());
        $donations->save();

        return redirect('admin/donation')->with('success', 'Created Successfully');

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
             
        $bloodtypes = BloodType::pluck('name' , 'id')->toArray();

        $cities = City::pluck('name' , 'id')->toArray();

        $donations = Donation::find($id);

        return view('admin.donation.edit' ,compact('bloodtypes' , 'cities' , 'donations'));
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
                $this->validate($request , [

        'patient_name' => 'required',
        'patient_age' => 'required',
        'hospital_name' => 'required',
        'hospital_address' => 'required',
        'blood_bags' => 'required',
        'phone' => 'required',
        'blood_type_id' => 'required',
        'city_id' => 'required',
        'patient_name' => 'required',
        'notes' => 'required',
]);

        $donations = Donation::findOrFail($id);
        $donations->update($request->all());
        $donations->save();

        return redirect('admin/donation')->with('success', 'updated Successfully');
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
        $donation =$request->donation;

        if($donation){

            Donation::destroy($donation);
            return back()->with('delete' , ' Deleted Successfully'); 
        }
      
        else{
             return back()->with('delete' , ' please check value');
        }
    
     
     }
}

