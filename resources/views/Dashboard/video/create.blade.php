@extends('Dashboard.admin')
@section('content')

<form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row mr-2 ml-2">
		<div class="col">
			<div class="card shadow">
			<h4 class="card-header font-weight-bold text-light" style="background-color:#470D66">Train Modal</h4>
				<div class="card-body">
				<div class="row">
				 <div class="col-md-6 col-12">
				   <label for="" class="font-weight-bold ">
				     Category<span class="text-danger">*</span>
				   </label>
			          <select class="form-control" name="category_id">
				    <option  selected hidden disabled>Select Category </option>
					@forelse($categories as $category)
					   <option value="{{$category['id']}}">{{$category['category_name']}}</option>
					@empty
                                         <option  selected hidden disabled>No Category Found</option>
					@endforelse
							
				 </select>
				 <span class="text-danger">@error ('category_id') {{$message}}@enderror</span>
				 </div>
				 <div class="col-md-6 col-12">
				   <label for="" class="font-weight-bold">
					Video Name <span class="text-danger">*</span>
				   </label>
				   <input type="text" class="form-control" name="video_name">
				   <span class="text-danger">@error ('video_name') {{$message}}@enderror</span>
				 </div>
				</div>
				<div class="row">
				 <div class="col-md-6 col-12">
				  <label for="" class="font-weight-bold mt-3">
					Video<span class="text-danger">*</span>
				  </label>
				 <input type="file" class="form-control" name="video" accept="video/*">
				 <span class="text-danger">@error ('video') {{$message}}@enderror</span>
				 </div>
				 <div class="col-md-6 col-12">
				  <label for="" class="font-weight-bold mt-3">
					Audio<span class="text-danger">*</span>
				  </label>
				 <input type="file" class="form-control" name="audio" accept="audio/*">
				 <span class="text-danger">@error ('audio') {{$message}}@enderror</span>
				 </div>
				</div>
				<div class="row">
				 <div class="col-md-6 col-12">
				  <label for="" class="font-weight-bold mt-3">
							Premium<span class="text-danger">*</span>
						</label>
						<select class="form-control" name="premium">
						<option  selected hidden disabled>Select Video Type </option>
							<option value="1">Premium</option>
							<option value="0">Free</option>
						</select>
						<span class="text-danger">@error ('premium') {{$message}}@enderror</span>
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
