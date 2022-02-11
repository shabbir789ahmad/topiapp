@extends('Dashboard.admin')
@section('content')

<form action="{{ route('privicy.update') }}" method="POST" enctype="multipart/form-data">
     @method('PUT')
	@csrf
	
	<div class="row mr-2 ml-2">
		<div class="col">
			<div class="card shadow">
			<h4 class="card-header font-weight-bold text-light" style="background-color:#470D66">Upload New Privicy Policy</h4>
				<div class="card-body">
				<div class="row">
				<input type="hidden" name="id" value="{{$privicy['id']}}">
				  <div class="col-md-12 col-12">
				   <label for="" class="font-weight-bold">
					Update Privicy Policy <span class="text-danger">*</span>
				   </label>
				   <input type="file" class="form-control" value="{{$privicy['policy']}}" name="profile" >
				   <span class="text-danger">@error ('profile') {{$message}}@enderror</span>
				 </div>
				 </div>
				 
				
			
				
					<div class="form-group">
						

						
						
						
						
					</div>
					<button type="submit" class="btn btn-primary text-light">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection
