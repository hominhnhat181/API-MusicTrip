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
                    @foreach ($data as $song)
                        @php $count += 1 @endphp
                        <tr>
                            <th scope="row" class="center">{{ $count }}</th>
                            <td class="title_track" style="display: flex">
                                <img src="{{ url('front/images/' . $song->image) }}" alt="">
                                <div class="info">
                                    <a href="" id="track">{{ $song->name }}</a>
                                    <br>
                                    <a href="" id="artist">{{ $song->artists->name }}</a>
                                </div>
                            </td>
                            <td>{{ $song->albums->name }}</td>
                            <td>{{ $song->tags->name }}</td>
                            <td>{{ $song->created_at->toDateString() }}</td>
                            <td>
                                {{-- <button id="control{{$song->id}}" value="off" href="">play</button> --}}
                                <audio class="real-song" id="song{{ $song->id }}" controls style="height:54px;">
                                    <source src="{{ asset($song->song) }}" type="audio/mp3">
                                </audio>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script>
        document.addEventListener('play', function(e) {
            var audios = document.getElementsByTagName('audio');
            for (var i = 0, len = audios.length; i < len; i++) {
                if (audios[i] != e.target) {
                    audios[i].currentTime = 0;
                    audios[i].pause();
                }
            }
        }, true);
    </script>

@endsection
