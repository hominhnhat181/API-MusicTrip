@extends('../frontend/layouts/blank')

@section('content')
<div class="content " id="form-login">
    <div class="container">
        <div class="row">
            <div class="col-md-5 contents">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="mb-4">
                        <h3>Sign In to <br><strong>My Chill Box</strong></h3>
                    </div>
                    <form action="{{route('login-handle')}}" method="POST">
                        @csrf {{method_field('POST')}}
                        <div class="form-group first">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="email">
                        </div>
                        <div class="form-group last mb-4">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="d-flex mb-5 align-items-center">
                            <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                <input type="checkbox" checked="checked" />
                                <div class="control__indicator"></div>
                            </label>
                            <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                        </div>
                        <button type="submit"  class="btn text-white btn-block btn-primary">Log In</button>
                        <span class="d-block text-left my-4 text-muted"> or sign in with</span>
                        <div class="social-login">
                            <a class="facebook social-connect" href="{{ route('login.social', 'facebook') }}">
                                <i class="lab la-facebook-f link-social"></i> </a>
                            <a href="#" class="twitter social-connect">
                                <i class="lab la-twitter link-social"></i> </a>
                            <a class="google social-connect" href="{{ route('login.social', 'google') }}">
                                <i class="lab la-google-plus link-social"></i> </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

{{-- <script src="{{asset('front/login/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('front/login/js/popper.min.js')}}"></script>
  <script src="{{asset('front/login/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('front/login/js/main.js')}}"></script> --}}

@endsection
