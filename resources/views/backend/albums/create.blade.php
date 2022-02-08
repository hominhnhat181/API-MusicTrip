@php
    use App\Enums\AlbumStatus;
@endphp
@extends('backend.layouts.app')
@section('title')
    Album Detail
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto create-form">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Album Information') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.album.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Name') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" placeholder="{{ translate('Name') }}" id="name" name="name"  required>
                                @error('name')
                                    <strong class="error">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{translate('Description')}}</label>
                            <div class="col-md-9">
                                <textarea name="desc" rows="5" class="form-control text-area"></textarea>
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
                                    <input type="hidden" name="image" class="selected-files">
                                </div>
                                {{-- review upload Image --}}
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row align-items-baseline">
                            <label class="col-lg-3 col-from-label" for="type">{{translate('Status')}} <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select required name="status" id="status" class="mb-2 form-control aiz-selectpicker" >
                                    <option value="{{AlbumStatus::ACTIVE}}" selected>{{translate('Active')}}</option>
                                    <option value="{{AlbumStatus::DISABLE}}" >{{translate('Disable')}}</option>
                                </select>
                                @error('status')
                                    <p class="error_noti">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row align-items-baseline">
                            <label class="col-lg-3 col-from-label" for="type">{{translate('Feature')}} <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select required name="feature_id" id="feature_id" class="mb-2 form-control aiz-selectpicker" >
                                    <option selected disabled> Choose Feature </option>
                                    @foreach ($features as $feature)
                                        <option value="{{$feature->id}}" >{{translate($feature->name)}}</option>
                                    @endforeach
                                </select>
                                @error('feature_id')
                                    <p class="error_noti">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button class="btn btn-light"><a
                                    href="{{ route('admin.album.index') }}">{{ translate('Cancel') }}</a></button>
                            <button type="submit" class="btn btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
