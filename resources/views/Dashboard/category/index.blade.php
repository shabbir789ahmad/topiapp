@extends('Dashboard.admin')
@section('content')




<div class="row">
	<div class="col-12">
		<div class="form-group ml-3">
			<a href="{{route('category.create')}}"><button class="btn btn-primary">Create</button></a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body pb-0">

				@if(count($categories) > 0)

				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="thead-light">
							<tr>
								<th scope="col">Image</th>
								<th scope="col">Name</th>
								<th scope="col">Operation</th>
							</tr>
						</thead>
						<tbody>
							@foreach($categories as $category)
							<tr>
								<td class="col-1"><img src="{{$category['category_image']}}" class="" height="50rem" width="100%"></td>
								<td class="col-6">{{ $category->category_name }}</td>
								<td class="col-1 d-flex">
									<a href="{{ route('categories.edit', ['id' => $category->id]) }}" type="submit" class="btn btn-xs btn-info">
										Edit
									</a>
									<form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn btn-xs btn-danger">
											Delete
										</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				@else

				<x-not_found_data resource="products" new="category.create"></x-not_found_data>

				@endif
							
			</div>
		</div>
	</div>
</div>

@endsection
