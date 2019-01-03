@extends('client/layouts.app')


  @foreach($donations as $donation)
  
@section('title')

Details of {{ $donation->patient_name }}
@endsection

@section('content')


  <h2 class="text-center">
Details of {{ $donation->patient_name }}
  </h2>




  <div class="table-responsive">
    <table class="table">
    <thead>
      <tr>
        <th>patient_name</th>
        <th>patient_age</th>
        <th>blood_bags</th>
        <th>notes</th>
        <th>hospital_name</th>
        <th>hospital_address</th>
        <th>phone</th>
        <th>blood_type</th>
        <th>city</th>
      </tr>
    </thead>
    <tbody>
 
      <tr>
    


        <td>{{ $donation->patient_name }}</td>
        <td>{{ $donation->patient_age }}</td>
        <td>{{ $donation->blood_bags }}</td>
        <td>{{ $donation->notes }}</td>
        <td>{{ $donation->hospital_name }}</td>
        <td>{{ $donation->hospital_address }}</td>
        <td>{{ $donation->phone }}</td>
      <td>{{optional($donation->bloodtype)->name}}</td>
      <td>{{optional($donation->city)->name}}</td>
      

                   <td>
 
                           


        </td>
      </tr>
     

    </tbody>

  </table>
  </div>

@endforeach


@endsection