@extends('home')

@section('content')

<div class="login-box row" style="overflow:hidden">
 <div class="col-md-4"></div>
    <div class="card card-outline card-primary col-md-4 " style="margin-top:10%;overflow:hidden"> 
        <div class="card-header text-center">
            <a href="#" class="h1">Topi App </a>
        </div>
        <div class="card-body">

            <p class="login-box-msg text-center">Sign in to start your session</p>

            <form id="login-form" action="{{ route('authenticate') }}" method="post">
                @csrf
                
                <div class="form-group">
                    <label for="">
                        <i class="fa fa-fw fa-envelope"></i>
                        Email
                    </label>
                    
                    <input type="email" class="form-control" name="email" />

                <div class="form-group">
                    <label for="">
                        <i class="fa fa-fw fa-key"></i>
                        Password
                    </label>
                    <input type="password" class="form-control" name="password"/>
                </div>

                <div class="row">
                    {{-- <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div> --}}

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>

                </div>
            </form>

            {{-- <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p> --}}

        </div>

        <div class="overlay d-none">
            <i class="fas fa-2x fa-spin fa-sync-alt"></i>
        </div>

    </div>

</div>

@endsection

@section('script')

@parent

<script>
    $(document).ready(function() {

        $('#login-form').submit(function() {
            
            $('.overlay').removeClass('d-none');

        });
        
    });
</script>

@endsection
