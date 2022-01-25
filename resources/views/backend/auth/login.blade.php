@extends('backend.layouts.blank')
@section('title')
    LOGIN
@endsection
@section('content')
    <div class="h-100 bg-cover bg-center py-5 d-flex align-items-center login-admin">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-4 mx-auto">
                    <div class="card text-left">
                        <div class="card-body">
                            <div class="mb-5 text-center">
                               @auth
                                   {{Auth()->user()->name}}
                               @endauth
                                <p>Login to your account.</p>
                            </div>
                            <form class="pad-hor" method="get" action="{{route('admin.login.handle')}}">
                                @csrf {{ method_field('get') }}
                                {{-- <input type="hidden" name="_token" value="bsVjkUzaZ8StmXN7jETNzQkuu5T4aomqFM0OnH0X"> --}}
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control" name="email" value="" required=""
                                        autofocus="" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" name="password" required=""
                                        placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block reset">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function autoFill() {
            $('#email').val('nhat@ho');
            $('#password').val('123');
        }
    </script>
@endsection
