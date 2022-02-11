@extends('Dashboard.admin')
@section('content')



<div class="row">
	<div class="col-4 col-md-4">
		<div class="form-group ml-3">
			<a href="{{route('create.profile')}}"><button class="btn btn-primary">Create </button></a>
			
		</div>
	</div>
	
</div>

<div class="row">
	<div class="col-12">
		<div class="card ml-1 mr-1 ml-md-2 mr-md-2">
			<div class="card-body pb-0">

				@if(count($profile) > 0)

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="thead-light">
							<tr>
								<th scope="col">Profile</th>
								
								
								<th scope="col">Operation</th>
							</tr>
						</thead>
						<tbody>
							@foreach($profile as $p)
							<tr>
							
						
                                                  <td><embed src="{{asset($p['profile'])}}" width="100%" height="200rem" /></td>
                                    
								<td class="d-flex">
								
							      
						
									<button class="btn btn-info btn-xs profile" data-id="{{$p['id']}}">Edit</button>
									
									<form action="{{ route('profile.delete', ['id' => $p->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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





<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="modal-body">
      <input type="text" name="id" id="pro">
        <label for="" class="font-weight-bold ">
		Update Company Profile<span class="text-danger">*</span>
	</label>
	<input type="file" class="form-control" name="profile">
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
