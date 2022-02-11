@extends('Dashboard.admin')
@section('content')

<form action="{{ route('create.bulk2') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="card mr-3 ml-3">
	  <div class="card-body">
	   <button class="btn btn-primary text-light">Save</button>
      </div>
    </div>

    <div class="card mr-3 mt-3 ml-3">
	  <div class="card-body">
	    <label for="" class="font-weight-bold mt-2">
		  Category<span class="text-danger">*</span>
		</label>
		<select class="form-control category" name="category_id" required>
	      <option  selected hidden disabled>Select Category </option>
			@forelse($categories as $category)
	         <option value="{{$category['id']}}">{{$category['category_name']}}</option>
			@empty
             <option  selected hidden disabled>No Category Found</option>
			@endforelse
		</select>
		<span class="text-danger">@error ('category_id') {{$message}} @enderror</span>
      </div>
    </div>
	

    <div class="field_wrapper">
     <div>
      <div class="card ml-3 mr-3">
       <div class="card-body">
    	<button  type="button" class="btn bg-color add_button" ><i class="fa fa-fw fa-plus"></i>Add</button>
         <div class="row">
          <div class="col-md-6">
           <label for="" class="font-weight-bold mt-2">
			  Video Name<span class="text-danger">*</span>
			</label>
            <input type="text" name="video_name[]" class="form-control" value=""/>
            <span class="text-danger">@error ('video_name') {{$message}} @enderror</span>
          </div>
          <div class="col-md-6">
           <label for="" class="font-weight-bold mt-2">
			 Video <span class="text-danger">*</span></label>
           <input type="file" name="videob[]" accept="video/*" class="form-control" value=""/>
           <span class="text-danger">@error ('videob') {{$message}} @enderror</span>
          </div>
   
          <div class="col-md-6">
           <label for="" class="font-weight-bold mt-2">
			 Audio<span class="text-danger">*</span></label>
           <input type="file" name="audiob[]" accept="audio/*" class="form-control" value=""/>
           <span class="text-danger">@error ('audiob') {{$message}} @enderror</span>
          </div>
          <div class="col-md-6">
           <label for="" class="font-weight-bold mt-2">
			 Type<span class="text-danger">*</span></label>
           <select class="form-control" name="premium[]">
           	<option selected hidden disabled>Select Type</option>
			 <option value="1">Premium</option>
			 <option value="0">Free</option>
		   </select>
		   <span class="text-danger">@error ('premium') {{$message}} @enderror</span>
          </div>
         </div>
       </div>
     </div>
    </div>
  </div>

	
</form>

@endsection