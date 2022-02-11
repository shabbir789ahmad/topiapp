@extends('Dashboard.admin')
@section('content')
       
                         <div class="row">
			   <div class="col-12 col-md-12">
			   <div class="card">
			   <div class="card-body text-center">
			   @foreach($videos as $video)
			    <video id="my-video" class="video-js" controls preload="auto" width="600" height="400" data-setup="{}">
                                <source src="{{asset($video->video)}}" type='video/mp4'>
                           </video>
                           @endforeach	
                           </div>
                           </div>
		          </div>						
			</div>
@endsection
