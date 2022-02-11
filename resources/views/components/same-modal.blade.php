<div>
    <div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="thead-light">
							<tr>
								<th scope="col">video</th>
								<th scope="col">Audio</th>
								<th scope="col">Name</th>
								<th scope="col">Test</th>
								<th scope="col">Premium</th>
								<th scope="col">Train Videos</th>
								
								
								<th scope="col" class="{{ (request()->is('video')) ? 'hide ' : 'show' }}">Approved</th>
								<th scope="col">Operation</th>
							</tr>
						</thead>
						<tbody>
							@foreach($modals as $modal)
							@if($modal['approve']==1 && request()->is('video'))
							<tr>
							
								<td class="col-1"><video id="my-video" class="video-js" controls preload="auto" width="200" height="100" data-setup="{}">
                                <source src="{{asset($modal->video)}}" type='video/mp4' >
                                </video></td>
								<td class="col-0"> <audio controls style="width:10rem">
                                  <source src="{{asset($modal->audio)}}" type="audio/mpeg" width="2%"> 
                                   </audio></td>
                                   <td>{{ $modal->video_name }}</td>
                                   <td>
                                    <a href="#" type="btn" class="btn btn-primary btn-xs test_video" data-id="{{$modal['id']}}" data-pre="{{$modal['premium']}}">
						Test
						</a>
                                    
                                    </td>
								
								<td>@if($modal->premium==0) Free @else Premium @endif</td>
								<td><a href="{{route('tra.modal', ['id' => $modal->id])}}" class="btn btn-xs btn-info">Videos</a></td>
								
                                    
                                    
                                    
                                    
								<td class="d-flex" scope="col">
								
							      
						<a href="{{ route('video.edit', ['id' => $modal->id]) }}" type="submit" class="btn btn-xs btn-info">
										<i class="fas fa-edit"></i>
						</a>
									
									
									<form action="{{ route('video.destroy', ['id' => $modal->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
										@method('DELETE')
										@csrf
										<button class="btn btn-danger ml-1" type="submit">
										<i class="fas fa-trash-alt "></i>
										</button>
									</form>
								</td>
							</tr>
							@elseif($modal['approve']==0 && request()->is('not/approved'))
							
							<tr>
							
								<td class="col-1"><video id="my-video" class="video-js" controls preload="auto" width="200" height="100" data-setup="{}">
                                <source src="{{$modal->video}}" type='video/mp4'>
                                </video></td>
								<td class="col-0"> <audio controls style="width:10rem">
                                  <source src="{{$modal->audio}}" type="audio/mpeg"> 
                                   </audio></td>
								<td>{{ $modal->video_name }}</td>
								<td>
                                    <a href="#" type="btn" class="btn btn-primary btn-xs test_video" data-id="{{$modal['id']}}" data-pre="{{$modal['premium']}}">
						Test
						</a>
                                    
                                    </td>
                                    <td> @if($modal->premium==0) Free @else Premium @endif</td>
								<td><a href="{{route('tra.modal', ['id' => $modal->id])}}" class="btn btn-xs btn-info">Videos</a></td>
								
								
                                    
                                    
                                    <td scope="col" ><input type="checkbox" data-id="{{$modal['id']}}" data-title="{{$modal['video_name']}}" data-message="{{$modal['video_name']}}" name="user_status" class="js-switchu" 
     {{ $modal->approve == 1 ? 'checked' : '' }} ></td>
								<td class="d-flex" scope="col">
								
							      
						<a href="{{ route('video.edit', ['id' => $modal->id]) }}" type="submit" class="btn btn-xs btn-info">
										<i class="fas fa-edit"></i>
						</a>
									
									
									<form action="{{ route('video.destroy', ['id' => $modal->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
										@method('DELETE')
										@csrf
										<button class="btn btn-danger ml-1" type="submit">
										<i class="fas fa-trash-alt "></i>
										</button>
									</form>
								</td>
							</tr>
							@endif
							@endforeach
						</tbody>
					</table>
				</div>
</div>
