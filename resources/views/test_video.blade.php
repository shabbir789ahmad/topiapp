@extends('Dashboard.admin')
@section('content')

<form action="{{ route('create.image') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row mr-2 ml-2">
		<div class="col">
			<div class="card">
				<div class="card-body">
					video id="my-video" class="video-js" controls preload="auto" width="200" height="100" data-setup="{}">
                                <source src="{{url('http://59.103.234.58:8005/var/www/topi/train_video/train_video/' .$modal->video)}}" type='video/mp4'>
                                </video>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection
