@extends('backend.layouts.app')
@section('title')
    New Tracks
@endsection
@section('content')
    <div id="subject">
        <div class="row">
            <div class="col-lg-8 mx-auto create-form">
                <div class="card customer-form">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('Tracks Information') }}</h5>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.song.update', $song->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf {{ method_field('PUT') }}
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">{{ translate('Name') }}
                                    <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="{{ translate('Name') }}" value="{{ $song->name }}"
                                        id="name" name="name" class="form-control" required>
                                    @error('name')
                                        <strong class="error_noti">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"
                                    for="signinSrEmail">{{ translate('Image') }}</label>
                                <div class="col-md-9">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                {{ translate('Browse') }}
                                            </div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" value="{{ $image->id ?? 0 }}" name="image" class="selected-files">
                                    </div>
                                    {{-- review upload Image --}}
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row align-items-baseline">
                                <label class="col-sm-3 col-from-label">{{ __('Tracks') }}: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group" data-toggle="aizuploader" data-type="all">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium"> {{ translate('Browse') }}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" name="song"  value="{{ $track->id ?? 0 }}" id="upload_id" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm"></div>
                                </div>
                            </div>
                            <div class="form-group row align-items-baseline">
                                <label class="col-lg-3 col-from-label" for="type">{{ translate('Feature') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select required name="artist_id" data-selected="{{ $song->artist_id }}"
                                        id="artist_id" class="mb-2 form-control aiz-selectpicker">
                                        <option selected disabled> Choose Artist </option>
                                        @foreach ($artists as $artist)
                                            <option value="{{ $artist->id }}">{{ translate($artist->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('artist_id')
                                        <p class="error_noti">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row align-items-baseline">
                                <label class="col-lg-3 col-from-label" for="type">{{ translate('Feature') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select required name="album_id" data-selected="{{ $song->album_id }}" id="album_id"
                                        class="mb-2 form-control aiz-selectpicker">
                                        <option selected disabled> Choose Album </option>
                                        @foreach ($albums as $album)
                                            <option value="{{ $album->id }}">{{ translate($album->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('album_id')
                                        <p class="error_noti">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row align-items-baseline">
                                <label class="col-lg-3 col-from-label" for="type">{{ translate('Feature') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select required name="tag_id" data-selected="{{ $song->tag_id }}" id="tag_id"
                                        class="mb-2 form-control aiz-selectpicker">
                                        <option selected disabled> Choose Feature </option>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ translate($tag->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag_id')
                                        <p class="error_noti">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-0 text-right">
                                <button class="btn btn-light"><a
                                        href="{{ route('admin.song.index') }}">{{ translate('Cancel') }}</a></button>
                                <button type="submit" class="btn btn-primary">{{ translate('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
