@extends('client.layouts.app')

@section('title')
@foreach($cities as $city)

{{ $city->name }}

@endforeach

@endsection




@section('content')



@if(count($cities) === 0)

   <p style=" margin-top:70px;" class="text-center"> No Results Found</p>

@elseif(count($cities) >= 1)





<strong>  <div class="table-responsive">
    <table class="table" >
    <thead>
      <tr>
        <th>patient_name</th>
        <th>phone</th>
        <th>blood_type</th>
        <th>city</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
 @foreach($cities[0]->donation_request as $donation)

      <tr>
    


        <td>{{ $donation->patient_name }}</td>
        <td>{{ $donation->phone }}</td>
      <td>{{optional($donation->bloodtype)->name}}</td>
      <td>{{optional($donation->city)->name}}</td>
      

                   <td>
 
    <a class="btn btn-primary" href="{{ url('client/patientdetails/'.$donation->phone) }}">More Details</a>


        </td>
      </tr>
     
@endforeach

    </tbody>

  </table>
     
  </div>
</strong>










@endif
@endsection