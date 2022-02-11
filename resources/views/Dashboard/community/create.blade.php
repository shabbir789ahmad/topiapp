@extends('Dashboard.admin')
@section('content')

<form action="{{ route('comunity.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row mr-2 mt-3 ml-2">
		<div class="col-8 mx-auto">
			<div class="card shadow">
			<h4 class="card-header font-weight-bold text-light" style="background-color:#470D66">Upload New Community Video</h4>
				<div class="card-body">
				<div class="row">
				
				  <div class="col-md-12 col-12">
				   <label for="" class="font-weight-bold">
					New Video <span class="text-danger">*</span>
				   </label>
				   <input type="file" class="form-control" value="{{old('video')}}" name="video" accept="video/*">
				   <span class="text-danger">@error ('video') {{$message}}@enderror</span>
				 </div>
				 <div class="col-md-12 col-12">
				   <label for="" class="font-weight-bold mt-2">
					Select Category <span class="text-danger">*</span>
				   </label>
				   <select name="category_id" class="form-control category_video">
				   <option selected disabled>Select Modal</option>
				   @foreach($categories as $category)
				   <option value="{{$category['id']}}">{{$category['category_name']}}</option>
				   @endforeach
				   </select>
				   <span class="text-danger">@error ('video') {{$message}}@enderror</span>
				 </div>
				 <div class="col-md-12 col-12">
				   <label for="" class="font-weight-bold mt-2">
					Select Modal <span class="text-danger">*</span>
				   </label>
				   <select name="modal_id" class="form-control modal_video">
				   <option selected disabled>Select Modal</option>
				   
				   </select>
				   <span class="text-danger">@error ('video') {{$message}}@enderror</span>
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
