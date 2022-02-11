<!DOCTYPE html>
<html lang="en">


<body>
<div class="row" style="overflow:hidden">
	<div class="col-12 col-md-12" style="overflow:hidden">
		<div class="card " style="overflow:hidden">
			<div class="card-body pb-0" style="overflow:hidden">
                      @foreach($response as $res)
				<h3 style="color:#000000">{{$res['privicy_header']}}</h3>
				<hr class="bg-dark">
				<h6>Privacy Policy</h6>
				<p>{{$res['privicy_content']}}</p>
				<ul>
				<li><a href="{{$res['google_play']}}">Google Play Service Providers</a></li>
				<li><a href="{{$res['addmobe']}}">AdMob</a></li>
				</ul>
				<h6>Log Data</h6>
				<p>{{$res['logdata_content']}}</p>
				
				<h6>Cookies</h6>
				<p>{{$res['cookies_content']}}</p>
				
				<h6>Service Providers</h6>
				<p>{{$res['providers_content']}}</p>
				
				<h6>Security</h6>
				<p>{{$res['security_content']}}</p>
				
				<h6>Links to Other Sites</h6>
				<p>{{$res['sites_content']}}</p>
				
				<h6>Children’s Privacy</h6>
				<p>{{$res['children_content']}}</p>
				
				<h6>Changes to This Privacy Policy</h6>
				<p>{{$res['change_content']}}</p>
				<hr>
				<h6>{{$res['privicy_footer']}}<a href="https://wasisoft.com/">WasiSoft Technologies</a></h6>
			@endforeach				
			</div>
		</div>
	</div>
</div>


</body>
</html>


