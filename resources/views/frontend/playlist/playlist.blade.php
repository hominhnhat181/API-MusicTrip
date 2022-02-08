@extends('frontend.layouts.app')

@section('content')
<div class="playlist">
    <div class="top_playlist">

    </div>
    <div class="playlist_table">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col" class="center">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Album</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody class="playlist">
                @php $count = 0 @endphp
                @foreach ($data as $dt)
                @php $count += 1 @endphp
                <tr>
                    <th scope="row" class="center">{{$count}}</th>
                    <td class="title_track" style="display: flex">
                        <img src="{{url('front/images/'.$dt->image)}}" alt="">
                        <div class="info">
                            <a href="" id="track">{{$dt->name}}</a>
                            <br>
                            <a href="" id="artist">{{$dt->artists->name}}</a>
                        </div>
                    </td>
                    <td>{{$dt->albums->name}}</td>
                    <td>{{$dt->tags->name}}</td>
                    <td>{{$dt->created_at->toDateString()}}</td>
                    <td>
                        {{-- <button id="control{{$dt->id}}" value="off" href="">play</button> --}}
                        <audio id="song{{$dt->id}}" controls style="height:54px;">
                            <source  src="{{ Storage::url($dt->song) }}" type="audio/mp3">
                        </audio>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection