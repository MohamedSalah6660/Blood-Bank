  @extends('admin/layouts.app')

@section('title_page')

All Contacts

@endsection

@section('content')



      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    
  @if ($message = Session::get('delete'))

    <div class="alert alert-danger">

        <p>{{ $message }}</p>

    </div>

@endif

  <h2>
Contacts Control
  </h2>


<form action="{{ route('contact.delete') }}" method="post">
    {{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th style="width: 8px;"></th>

        <th>No</th>
        <th>Title</th>
        <th>Message</th>
        <th>Client-Name</th>
      </tr>
    </thead>
    <tbody>
	@foreach($contacts as $contact)
      <tr>
          <td>
        <input type="checkbox" name="contacts[]" class="checkboxes" 
        value="{{ $contact->id }}" />
      </td>

       <td>{{ (($contacts->currentPage() - 1) * $contacts->perPage()) + $loop->iteration }}</td>
        <td>{{ $contact->title }}</td>
        <td>{{ $contact->message }}</td>
        <td>{{ $contact->client->name }}</td>

      </tr>
     

@endforeach
</form>

    </tbody>
  </table>
        <button onclick="return myFunction();" class="btn btn-danger">Delete Checked</button>

</div>
    <div class="text-center">{{ $contacts->render() }}</div>


<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>




@endsection