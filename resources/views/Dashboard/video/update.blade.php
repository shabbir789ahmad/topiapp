@extends('Dashboard.admin')
@section('content')

<form action="{{ route('video.update', ['id' => $modal->id]) }}" method="POST" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	
	<div class="row mr-2 ml-2">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<label for="" class="font-weight-bold">
							Video Name <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control" name="video_name" value="{{$modal['video_name']}}">
						<label for="" class="font-weight-bold mt-3">
							Video<span class="text-danger">*</span>
						</label>
						<input type="file" class="form-control" name="video" accept="video/*" value="{{$modal['video']}}"> 
						<span class="text-danger">@error ('video') {{$message}} @enderror</span><br>
						<label for="" class="font-weight-bold mt-3">
							Audio<span class="text-danger">*</span>
						</label>
						<input type="file" class="form-control" name="audio" accept="audio/*" value="{{$modal['audio']}}">
						<span class="text-danger">@error ('audio') {{$message}} @enderror</span><br>
						<label for="" class="font-weight-bold mt-3">
							Premium<span class="text-danger">*</span>
						</label>
						<select class="form-control" name="premium">
							@if($modal->premium==1)
							<option value="1" >Premium</option>
							<option value="0">free</option>
							@else
							<option value="0">Free</option>
							<option value="1">Premium</option>
							@endif
						</select>
						
				        
				           <input type="hidden" class="form-control" name="color" value="{{$modal['color']}}">
				           <input type="hidden" class="form-control" name="approve" value="{{$modal['approve']}}">
				
					</div>
					<button class="btn btn-primary text-light">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection
