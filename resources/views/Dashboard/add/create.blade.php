@extends('Dashboard.admin')
@section('content')

<form action="{{ route('add.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="row mr-2 ml-2">
		<div class="col">
		<input type="hidden" name="id" value="{{$adds['id']}}>
			<div class="card shadow">
			<h4 class="card-header font-weight-bold text-light" style="background-color:#470D66">Update Add Unit Ids </h4>
			
				<div class="card-body">
				<div class="row">
				  <div class="col-md-6 col-12">
				  <label for="" class="font-weight-bold ">
							Banner Id<span class="text-danger">*</span>
						</label>
						 <input type="text" class="form-control" value="{{$adds['banner_id']}}" name="banner_id">
				 </div>
				 <div class="col-md-6 col-12">
				   <label for="" class="font-weight-bold">
					Native Id<span class="text-danger">*</span>
				   </label>
				   <input type="text" class="form-control" value="{{$adds['native_id']}}"  name="native_id">
				 </div>
				</div>
				<div class="row">
				 <div class="col-md-6 col-12">
				  <label for="" class="font-weight-bold mt-3">
					Interstitial<span class="text-danger">*</span>
				  </label>
				 <input type="text" class="form-control"  value="{{$adds['inter_id']}}"  name="inter_id" >
				 </div>
				 <div class="col-md-6 col-12">
				  <label for="" class="font-weight-bold mt-3">
					Rewarded<span class="text-danger">*</span>
				  </label>
				 <input type="text" class="form-control" value="{{$adds['reward_id']}}"  name="reward_id" >
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
