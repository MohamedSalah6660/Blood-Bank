@extends('admin/layouts.app')
@section('title_page')
Donations
@endsection

@section('content')


      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
                    
  @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif
                   
  @if ($message = Session::get('delete'))

    <div class="alert alert-danger">

        <p>{{ $message }}</p>

    </div>

@endif

  @if ($message = Session::get('message'))

    <div class="alert alert-info">

        <p>{{ $message }}</p>

    </div>

@endif

  <h2>
Donations
 Control
  </h2>

    <a class="btn btn-primary" href="{{ url('admin/donation/create') }}">Add New Donation</a>



<form action="{{ route('donation.delete') }}" method="post">
    {{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">

  <div class="table-responsive">
    <table class="table">
    <thead>
      <tr>
                <th style="width: 8px;"></th>

        <th>No</th>
        <th>patient_name</th>
        <th>patient_age</th>
        <th>blood_bags</th>
        <th>notes</th>
        <th>hospital_name</th>
        <th>hospital_address</th>
        <th>phone</th>
        <th>blood_type</th>
        <th>city</th>
        <th>control</th>
      </tr>
    </thead>
    <tbody>
 
  @foreach($donations as $donation)
      <tr>
     <td>
        <input type="checkbox" name="donation[]" class="checkboxes" 
        value="{{ $donation->id }}" />
      </td>

       <td>{{ (($donations->currentPage() - 1) * $donations->perPage()) + $loop->iteration }}</td>

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
 
    <a class="btn btn-primary" href="{{ url('admin/donation/'.$donation->id.'/edit') }}">Edit</a>

                           
  
    
        </td>
      </tr>
     

@endforeach
</form>
    </tbody>

  </table>
        <button onclick="return myFunction();" class="btn btn-danger">Delete Checked</button>

  </div>
      <div class="text-center">{{ $donations->render() }}</div>



<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>


</div>
</div>
</div>
</div>

@endsection