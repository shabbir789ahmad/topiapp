@extends('Dashboard.admin')
@section('content')

@if($alert=Session::get('success'))
<div class="alert alert-success alert-dismissible fade show ml-2 mr-2" role="alert">
  <strong>Successfull!</strong> {{$alert}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="row">
	<div class="col-4 col-md-4">
		<div class="form-group ml-3">
			<a href="{{route('create')}}"><button class="btn btn-primary">Create </button></a>
			
		</div>
	</div>
	<div class="col-md-4 col-4">
         <select class="form-control" id="category">
         <option selected disabled hidden>Sort By Category</option>
           @forelse($categories as $category)
             <option value="{{$category['id']}}">{{$category['category_name']}}</option>
           @empty
           <option>Please Upload Category</option>
           @endforelse
         </select>
        </div>
        <div class="col-md-4 col-4">
         <select class="form-control" id="free">
         <option selected disabled hidden>Sort By Free Premium</option>
          <option value="0">Free</option>
          <option value="1">Premium</option>
         </select>
       </div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card ml-1 mr-1 ml-md-2 mr-md-2">
			<div class="card-body pb-0">

				@if(count($modals) > 0)

				<x-same-modal :modals="$modals"  />

				@else

				<div class="alert " role="alert" style="background: #1A8E76;">
	<h4 class="alert-heading"><i class="fa fa-exclamation-circle"></i>&nbsp;No Record Found!</h4>
	<p>You have not added any Record yet!</p>
	<hr>
	<p class="mb-0 ">Click <a href="{{ route('create') }}" class="text-danger">here</a> to add New Record</p>
</div>
				@endif
							
			</div>
		</div>
	</div>
</div>

<form id="category_submit">

  <input type="hidden" name="category" id="category_input">
  <input type="hidden" name="free" id="free_input">
  </form>

<!-- Modal -->
<div class="modal fade" id="testmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Test Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('upload.test4')}}" method="Post" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
         <input type="hidden" name="modal_id" id="modal_id">
         <input type="hidden" name="type" id="premium">
         <label class="font-weight-bold">Choose Image</label>
         <input type="file" name="image" class="form-control" accept="image/*">
      </div>
      
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Test</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>



</script

@endsection
