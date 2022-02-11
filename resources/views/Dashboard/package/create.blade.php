@extends('Dashboard.admin')
@section('content')

<form action="{{ route('package.upload') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row mr-2 ml-2">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<label for="" class="font-weight-bold">
							Package Name <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control" name="package_name">
						<label for="" class="font-weight-bold mt-3">
							Package Detail <span class="text-danger">*</span>
						</label>
						<textarea class="form-control" placeholder="package detail Here" rows="5"></textarea>
						<label for="" class="font-weight-bold mt-3">
							Package Price <span class="text-danger">*</span>
						</label>
						<input type="number" class="form-control" name="package_price">
					</div>
					<button class="btn btn-primary text-light">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection
