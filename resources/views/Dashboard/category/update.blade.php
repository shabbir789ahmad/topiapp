@extends('Dashboard.admin')
@section('content')

<form action="{{ route('categories.update', ['id' => $categories->id]) }}" method="POST" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	<div class="row mr-2 ml-2">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<label for="" class="font-weight-bold">
							Category Name <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control" name="category_name" value="{{$categories->category_name}}">
						<label for="" class="font-weight-bold mt-3">
							Category image <span class="text-danger">*</span>
						</label>
						<input type="file" class="form-control" name="image">

						<img src="{{asset('uploads/img/' .$categories->category_image)}}" width="10%" class="mt-2">
					</div>
					<button class="btn btn-primary text-light">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection