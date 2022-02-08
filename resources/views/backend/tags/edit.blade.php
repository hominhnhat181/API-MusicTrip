@php
    use App\Enums\TagStatus;
@endphp
@extends('backend.layouts.app')
@section('title')
    Tag Detail
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto create-form">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Tag Information') }}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.tag.update', $tag->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf {{method_field('PUT')}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Name') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" placeholder="{{ translate('Name') }}" value="{{$tag->name}}" id="name" name="name"  required>
                                @error('name')
                                    <strong class="error">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row align-items-baseline">
                            <label class="col-lg-3 col-from-label" for="type">{{translate('Status')}} <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select required name="status" id="status" data-selected="{{$tag->status}}" class="mb-2 form-control aiz-selectpicker" >
                                    <option value="{{TagStatus::ACTIVE}}" selected>{{translate('Active')}}</option>
                                    <option value="{{TagStatus::DISABLE}}" >{{translate('Disable')}}</option>
                                </select>
                                @error('status')
                                    <p class="error_noti">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button class="btn btn-light"><a
                                    href="{{ route('admin.tag.index') }}">{{ translate('Cancel') }}</a></button>
                            <button type="submit" class="btn btn-primary">{{ translate('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
