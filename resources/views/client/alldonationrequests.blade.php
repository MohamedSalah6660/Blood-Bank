

  <h2 class="text-center" style="margin-top: 20px" id="donations">Last
Donations
 Requests
  </h2>

<strong>  <div class="table-responsive">
    <table class="table" >
    <thead>
      <tr>
        <th>No</th>
        <th>patient_name</th>
        <th>phone</th>
        <th>blood_type</th>
        <th>city</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
 
  @foreach($donations as $donation)
      <tr>
    

       <td>{{ (($donations->currentPage() - 1) * $donations->perPage()) + $loop->iteration }}</td>

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
      <div class="text-center" style="margin-left: 500px">{{ $donations->render() }}</div>
  </div>
</strong>

<hr>