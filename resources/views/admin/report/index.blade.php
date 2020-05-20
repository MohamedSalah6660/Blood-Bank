  @extends('admin/layouts.app')

@section('title_page')

All Reports

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
Reports Control
  </h2>



<form action="{{ route('report.delete') }}" method="post">
    {{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
                <th style="width: 8px;"></th>

        <th>No</th>
        <th>Message</th>
        <th>Client-Name</th>
      </tr>
    </thead>
    <tbody>
	@foreach($reports as $report)
      <tr>
 <td>
        <input type="checkbox" name="reports[]" class="checkboxes" 
        value="{{ $report->id }}" />
      </td>

       <td>{{ (($reports->currentPage() - 1) * $reports->perPage()) + $loop->iteration }}</td>
        <td>{{ $report->message }}</td>
        <td>{{ $report->client->name }}</td>

      </tr>
     

@endforeach
</form>
    </tbody>
      <div class="text-center">{{ $reports->render() }}</div>

  </table>
        <button onclick="return myFunction();" class="btn btn-danger">Delete Checked</button>

</div>

<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>




@endsection