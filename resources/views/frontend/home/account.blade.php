@extends('frontend.layouts.app')

@section('content')

<form action="{{Route('admin.profile.update',['id'=>$admins->id])}}" method="POST" style="all: unset">
    @csrf
    {{-- {{ method_field('PUT') }} --}}
    <div class="row gutters_account">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <div id="profile-container">
                                    @if (!empty(Auth::user()->google_id)||!empty(Auth::user()->facebook_id))
                                    <img id="profileImage" src="{{Url($master->image)}}">
                                    @else
                                    <img id="profileImage" src="{{Url('front/images/'.$master->image)}}">
                                    @endif
                                </div>
                                <input id="imageUpload" type="file" name="image" value="{{$master->image}}">
                            </div>
                            <h5 style="font-weight: 500" class="user-name">{{$master->name}}</h5>
                            <h5 style="font-weight: 500" class="user-email">{{$master->email}}</h5>
                        </div>
                        <div class="about">
                            <h5 class="mb-2 text-primary">Adminstrator</h5>
                            <p>Manager</p>
                            <p style="position: relative; bottom: -88px">Join Date
                                <br>{{$master->created_at->toDateString()}}</p>

                            <img style="max-height: 100px; position: relative; top: -72px"
                                src="http://localhost/myproject/public/layout/images/member.png" alt="Member"
                                title="MEMBER">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <h6 class="mb-3 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" name="name" id="fullName"
                                    value="{{$master->name}}" placeholder="Enter full name">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">New Password</label>
                                <input autocomplete="off" type="password" name="password" class="form-control"
                                    id="website" placeholder="">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value=""
                                    placeholder="Enter phone number">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="website"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Email</label>
                                <input type="email" class="form-control" name="email" id="eMail"
                                    value="{{$master->email}}" placeholder="Enter email ID">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-3 text-primary">Address</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Street">Street</label>
                                <input type="name" class="form-control" name="street" value="" id="Street"
                                    placeholder="Enter Street">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="ciTy">City</label>
                                <input type="name" class="form-control" name="city" id="ciTy" value=""
                                    placeholder="Enter City">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <a type="button" href="{{route('admin.dashboard')}}"
                                    class="btn btn-secondary">Cancel</a>
                                <input class="btn btn-secondary" style="background-color: rgb(158, 216, 153)"
                                    type="submit" value="Update">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection