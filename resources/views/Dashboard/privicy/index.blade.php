@extends('Dashboard.admin')
@section('content')


<div class="row">
	<div class="col-4 col-md-4">
		<div class="form-group ml-3">
			<a href="{{route('create.privicy')}}"><button class="btn btn-primary">Create </button></a>
			
		</div>
	</div>
	
</div>

<div class="row">
	<div class="col-12">
		<div class="card ml-1 mr-1 ml-md-2 mr-md-2">
			<div class="card-body pb-0">

				@if(count($privicy) > 0)

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="thead-light">
							<tr>
								<th scope="col">Privicy Policy</th>
								
								
								<th scope="col">Operation</th>
							</tr>
						</thead>
						<tbody>
							@foreach($privicy as $modal)
							<tr>
							
								
								
								<td><embed src="{{asset($modal->policy)}}" width="100%" height="200rem" /></td>
								
                                    
								<td class="d-flex">
								
							      
						<a href="{{ route('privicy.edit', ['id' => $modal->id]) }}" type="submit" class="btn btn-xs btn-info">
										<i class="fas fa-edit"></i>
						</a>
									
									
									<form action="{{ route('policy.delete', ['id' => $modal->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
										@method('DELETE')
										@csrf
										<button class="btn btn-danger ml-1" type="submit">
										<i class="fas fa-trash-alt "></i>
										</button>
									</form>
								</td>
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


<script>



</script

@endsection
