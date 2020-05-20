@extends('admin/layouts.app')
@section('title_page')
Clients
@endsection

@section('content')

  <div class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
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

  <h2>
Client
 Control
  </h2>


<form action="{{ route('client.delete') }}" method="post">
    {{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">

  <div class="table-responsive">

  <table class="table">
    <thead>
      <tr>  
            <th style="width: 8px;"></th>

        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Birth_date</th>
        <th>Phone</th>
        <th>Blood_type</th>
        <th>Donation_last_date</th>
        <th>City_name</th>
      </tr>
    </thead>
    <tbody>
 
	@foreach($clients as $client)
      <tr>
          <td>
        <input type="checkbox" name="clients[]" class="checkboxes" 
        value="{{ $client->id }}" />
      </td>
       <td>{{ (($clients->currentPage() - 1) * $clients->perPage()) + $loop->iteration }}</td>
        <td>{{ $client->name }}</td>
        <td>{{ $client->email }}</td>
        <td>{{ $client->birth_date }}</td>
        <td>{{ $client->phone }}</td>
        <td>{{ $client->blood_type }}</td>
        <td>{{ $client->donation_last_date }}</td>
      <td>{{optional($client->city)->name}}</td>
   

      </tr>
     

@endforeach
</form>
    </tbody>

  </table>
        <button onclick="return myFunction();" class="btn btn-danger">Delete Checked</button>

</div>
      <div class="text-center">{{ $clients->render() }}</div>
</div>


           <!-- /.box-body -->
         </div>



         </div>
       <!-- /.col -->
     </div>


     <!-- /.row -->


   </div>

<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>



@endsection