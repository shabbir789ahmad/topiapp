@extends('Dashboard.admin')
@section('content')

@if($alert=Session::get('success'))
<div class="alert alert-success alert-dismissible fade show ml-2 mr-2" role="alert">
  <strong>Successfull!</strong> {{$alert}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif



<div class="row">
	<div class="col-12">
		<div class="card ml-1 mr-1 ml-md-2 mr-md-2">
			<div class="card-body pb-0">

				@if(count($videos) > 0)

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="thead-light">
							<tr>
								<th scope="col">video</th>
								<th scope="col">Audio</th>
								<th scope="col">Name</th>
								<th scope="col">Premium</th>
								<th scope="col">Test</th>
								<th scope="col">Operation</th>
							</tr>
						</thead>
						<tbody>
							@foreach($videos as $video)
							<tr>
							
							<td>{{$video->video}}</td>	
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				@else

				<div class="alert " role="alert" style="background: #1A8E76;">
	<h4 class="alert-heading"><i class="fa fa-exclamation-circle"></i>&nbsp;No Record Found!</h4>
	<p>You have not added any Record yet!</p>
	<hr>
	<p class="mb-0 ">Click <a href="{{ route('create') }}" class="text-danger">here</a> to add New Record</p>
</div>
				@endif
							
			</div>
		</div>
	</div>
</div>

@endsection
