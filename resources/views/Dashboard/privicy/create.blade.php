@extends('Dashboard.admin')
@section('content')

<form action="{{ route('privicy.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row mr-2 ml-2">
		<div class="col">
			<div class="card shadow">
			<h4 class="card-header font-weight-bold text-light" style="background-color:#470D66">Upoad New Privicy Policy</h4>
				<div class="card-body">
				<div class="row">
				
				  <div class="col-md-12 col-12">
				   <label for="" class="font-weight-bold">
					Your Privicy Policy <span class="text-danger">*</span>
				   </label>
				   <input type="file" class="form-control" value="{{old('profile')}}" name="profile" >
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
