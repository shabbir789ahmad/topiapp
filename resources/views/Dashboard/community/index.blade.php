@extends('Dashboard.admin')
@section('content')
<div class="sd" style="background-color:#EDEDF0">
<div class="card shadow py-2">
       <div class="row mt-3">
	<div class="col-12 col-md-2">
		<div class="form-group ml-3">
			<a href="{{route('comunity.create')}}"><button class="btn btn-primary">Create </button></a>
			
		</div>
	</div>
	<div class="col-md-3 col-12">
         <select class="form-control category_video ">
         <option selected disabled hidden>Sort By Category</option>
        
           @forelse($categories as $modal)
             <option value="{{$modal['id']}}">{{$modal['category_name']}}</option>
           @empty
           <option>Please Upload Category</option>
           @endforelse
         </select>
        </div>
	<div class="col-md-3 col-12">
         <select class="form-control modal_video" id="modal">
         <option selected disabled hidden>Sort By Modal</option>
           
         </select>
        </div>
        <div class="col-md-3 col-12">
         <select class="form-control" id="premium">
         <option selected disabled hidden>Sort By Free Premium</option>
          <option value="0">Free</option>
          <option value="1">Premium</option>
         </select>
       </div>
</div>
</div>

                         <div class="row">
                         @foreach($videos as $video)
			   <div class="col-12 col-md-6 mt-2">
			   <div class="card shadow">
			   <form action="{{route('comunity.delete',['id'=>$video['id']])}}" method="POST">
                             @csrf
                             @method('DELETE')
                             <button class="btn btn-danger float-right mr-2 mt-2" onclick="return confirm('are you sure to Delete')">Delete</button>
                            </form>
			   <div class="card-body text-center">
			   
			    <video id="my-video" class="video-js" controls preload="auto" width="100%" height="400" data-setup="{}" loading="lazy">
                                <source src="{{asset($video->video)}}" type='video/mp4'>
                           </video>	
                           </div>
                           </div>
		          </div>
		          
                           @endforeach						
			</div>
			</div>
			<form id="video_form">
			 <input type="hidden" name="video_type" id="video_type">
			 <input type="hidden" name="modal_type" id="modal_type">
			</form>
		
@endsection

