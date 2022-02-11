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
                    @foreach ($songs as $song)
                    {{-- cần tìm id đang play để tính pre và next --}}
                        @php
                            $count += 1;
                            $this_id = $song->id;
                            $flipped = array_flip($songIds);
                            // dd($flipped);
                            $next_id = $songIds[$flipped[$this_id] - 1] ?? null;
                            $pre_id  =$songIds[$flipped[$this_id] + 1] ?? null;
                        @endphp
                        <tr class="hihi{{ $song->id }}">
                            <th scope="row" class="center">{{ $count }}</th>
                            <td class="title_track" style="display: flex">
                                <img class="main_track_img" src="{{ asset($song->image) }}" alt="">
                                <div class="info">
                                    <a class="trackSong" track="{{ $song->name }}" href=""
                                        id="track">{{ $song->name }}</a>
                                    <br>
                                    <a class="trackArtist" artist="{{ $song->artists->name }}" href=""
                                        id="artist">{{ $song->artists->name }}</a>
                                </div>
                            </td>
                            <td>{{ $song->albums->name }}</td>
                            <td>{{ $song->tags->name }}</td>
                            <td>{{ $song->created_at->toDateString() }}</td>
                            <td class="haha">
                                <button class="btn btn-success start_music" pre="{{$pre_id}}" next="{{$next_id}}" audio="music{{ $song->id }}" value="off">play
                                    <audio class="real-song" id="music{{ $song->id }}">
                                        <source src="{{ asset($song->song) }}" type="audio/mp3">
                                    </audio>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')

@endsection
