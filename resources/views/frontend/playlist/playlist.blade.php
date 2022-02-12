@extends('frontend.layouts.app')

@section('content')
    <div class="playlist">
        <div class="top_playlist">
            <div class="banner-container">
                <div class="banner-poster">
                    <img class="main-poster" src="{{ asset($album->image) }}" alt="Poster">
                    <img class="blur" src="{{ asset($album->image) }}">
                </div>
                <div class="banner-info">
                    <div class="banner-how">
                        <div class="list-type">
                            <h5 class="list-type-content">ALBUM</h5>
                        </div>
                        <div class="list-name">
                            <h1 class="list-name-content">{{ $album->name }}</h1>
                        </div>
                        {{-- <div class="list-info">
                            <h1 class="list-info-content">PLAYLIST Catch all the latest music from artists you follow, plus new singles picked for you. Updates every Friday.</h1>
                        </div> --}}
                        <div class="list-status">
                            <p class="status-info">
                                <a class="artist-link">Artist of Album</a>
                                <span class="album-date">
                                    <span class="dots"> • </span>2018<span class="dots"> • </span>
                                </span>
                                <span class="all-song"> {{ $totalSongs }} song, </span>
                                <span class="all-time">5 min 12 sec</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="playlist_table">
            <div class="playlist-area">
                <div class="top-playlist">
                    <button class="btn btn-success"><i class="las la-pause"></i></button>
                </div>
                <div class="playlist-area-table">
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
                                    $next_id = $songIds[$flipped[$this_id] - 1] ?? null;
                                    $pre_id = $songIds[$flipped[$this_id] + 1] ?? null;
                                @endphp
                                <tr class="hihi{{ $song->id }}">
                                    <th scope="row" class="center">{{ $count }}</th>
                                    <td class="title_track" style="display: flex">
                                        <img class="main_track_img" src="{{ asset($song->image) }}" alt="">
                                        <div class="info">
                                            <a class="trackSong" track="{{ $song->name }}" href="" id="track">{{ $song->name }}</a>
                                            <br>
                                            <a class="trackArtist" artist="{{ $song->artists->name }}" href="" id="artist">{{ $song->artists->name }}</a>
                                        </div>
                                    </td>
                                    <td>{{ $song->albums->name }}</td>
                                    <td>{{ $song->tags->name }}</td>
                                    <td>{{ $song->created_at->toDateString() }}</td>
                                    <td class="haha">
                                        <button class="btn btn-success start_music" pre="{{ $pre_id }}"
                                            next="{{ $next_id }}" audio="music{{ $song->id }}" value="off">play
                                            <audio class="real-song" id="music{{ $song->id }}">
                                                <source src="{{ asset($song->song) }}" type="audio/mp3">
                                            </audio>
                                        </button>
                                    </td>
                                    <td>
                                        <div class="VpYFchIiPg3tPhBGyynT">
                                            <img class="n5XwsUqagSoVk8oMiw1x" width="14" height="14" alt="" src="https://open.scdn.co/cdn/images/equaliser-animated-green.f93a2ef4.gif">
                                            <button class="RfidWIoz8FON2WhFoItU" aria-label="Pause" tabindex="-1" aria-expanded="false">
                                                <svg height="32" role="img" width="32" viewBox="0 0 24 24" class="UIBT7E6ZYMcSDl1KL62g">
                                                    <rect x="5" y="3" width="4" height="18" fill="currentColor"></rect>
                                                    <rect x="15" y="3" width="4" height="18" fill="currentColor"></rect>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
