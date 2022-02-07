@extends('backend.layouts.app')
@section('title')
    Edit Admin
@endsection
@section('content')
<div id="subject" style="margin-bottom: 80px ">
    <div class="row">
        <div class="col-lg-8 mx-auto create-form">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Customer Information') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Name') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('Name') }}" value="{{$user->name}}" id="name" name="name"
                                    class="form-control" required>
                                @error('name')
                                    <strong class="error_noti">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Email') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('Email') }}" value="{{$user->email}}" id="email" name="email"
                                    class="form-control" required>
                                @error('email')
                                    <strong class="error_noti">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Phone Number') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('Phone Number') }}"  value="{{$user->phone_number}}" id="phone" name="phone_number"
                                    class="form-control" required>
                                @error('mobile')
                                    <strong class="error_noti">{{$message}}</strong>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Address ') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('Address') }}" value="{{$user->address}}" id="address" name="address"
                                    class="form-control" required>
                                @error('address')
                                    <strong class="error_noti">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Address 2') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('Address 2') }}" value="{{$user->address_2}}" id="address_2" name="address_2"
                                    class="form-control" >
                                @error('address_2')
                                    <strong class="error_noti">{{$message}}</strong>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('City') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('City') }}" value="{{$user->provinces_id}}" id="provinces_id" name="provinces_id"
                                    class="form-control" >
                                @error('provinces_id')
                                    <strong class="error_noti">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('District') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('District') }}" value="{{$user->district_id}}" id="district_id" name="district_id"
                                    class="form-control" >
                                @error('district_id')
                                    <strong class="error_noti">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Ward') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('Ward') }}" value="{{$user->ward_id}}" id="ward_id" name="ward_id"
                                    class="form-control" >
                                @error('ward_id')
                                    <strong class="error_noti">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Password') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="password" placeholder="{{ translate('Password') }}"id="password" name="password"
                                    class="form-control" >
                                @error('password')
                                    <strong class="error_noti">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Password Confirm') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="password" placeholder="{{ translate('Confirm Password') }}"  id="password_confirmation" name="password_confirmation"
                                    class="form-control" >
                                @error('password_confirmation')
                                    <strong class="error_noti">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{ translate('Image') }}</label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ translate('Browse') }}
                                        </div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" value="{{ $file->id ?? 0 }}" name="image" class="selected-files">
                                </div>
                                {{-- review upload Image --}}
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button class="btn btn-light"><a href="{{route('admin.user.index')}}">{{ translate('Cancel') }}</a></button>
                            <button type="submit" class="btn btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
