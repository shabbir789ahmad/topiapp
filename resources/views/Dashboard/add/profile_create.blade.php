@extends('Dashboard.admin')
@section('content')

<form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	
	<div class="row mr-2 ml-2">
		<div class="col">
		
			<div class="card shadow">
			<h4 class="card-header font-weight-bold text-light" style="background-color:#470D66">Upload Company Profile</h4>
			
				<div class="card-body">
				<div class="row">
				  <div class="col-md-6 col-12">
				  <label for="" class="font-weight-bold ">
							Banner Id<span class="text-danger">*</span>
						</label>
						 <input type="file" class="form-control" name="profile">
				 </div>
				
				</div>
				
				
					<div class="form-group">
						

						
						
						
						
					</div>
					<button class="btn btn-primary text-light">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection
