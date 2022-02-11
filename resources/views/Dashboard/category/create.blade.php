@extends('Dashboard.admin')
@section('content')

<form action="{{ route('create.upload') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row mr-2 ml-2">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<label for="" class="font-weight-bold">
							Category Name <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control" name="category_name">
						<label for="" class="font-weight-bold mt-3">
							Category image <span class="text-danger">*</span>
						</label>
						<input type="file" class="form-control" name="image">
					</div>
					<button class="btn btn-primary text-light">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection
