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
                        @php $count += 1 @endphp
                        <tr class="hihi{{ $song->id }}">
                            <th scope="row" class="center">{{ $count }}</th>
                            <td class="title_track" style="display: flex">
                                <img class="main_track_img" src="{{ asset($song->image) }}" alt="">
                                <div class="info">
                                    <a class="trackSong" track="{{ $song->name }}" href="" id="track">{{ $song->name }}</a>
                                    <br>
                                    <a class="trackArtist" artist="{{$song->artists->name}}" href="" id="artist">{{ $song->artists->name }}</a>
                                </div>
                            </td>
                            <td>{{ $song->albums->name }}</td>
                            <td>{{ $song->tags->name }}</td>
                            <td>{{ $song->created_at->toDateString() }}</td>
                            <td class="haha">
                                <button class="btn btn-success start_music"  audio="music{{$song->id}}" value="off" href="">play
                                    <audio class="real-song" id="music{{$song->id}}">
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
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script>
        var playhead = document.getElementById("elapsed");
        var timeline = document.getElementById("slider");
        var timer = document.getElementById("timer");
        var allTime = document.getElementById("allTime");
        var playButton = document.getElementById("play");
        var pauseButton = document.getElementById("pause");
        var audios = document.getElementsByTagName('audio');


        pauseButton.style.visibility = "hidden";
        var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;


       

        document.addEventListener('play', function(e) {
            for (var i = 0; i < audios.length; i++) {
                if (audios[i] != e.target) {
                    audios[i].currentTime = 0;
                    audios[i].pause();
                } else {
                    // poster
                    var classGrandpa = $(e.target).parent().parent().attr('class');
                    var poster = $('.' + classGrandpa + ' .main_track_img').attr('src');
                    changePlayerImage(poster);


                    // // time
                    // var audioId = $(e.target).attr('id');
                    // var duration = document.getElementById(audioId).duration;
                    // var currentTime = document.getElementById(audioId).currentTime;
                    // console.log(currentTime);
                    // $(currentTime).on('change', function() {
                    //     timeUpdate(duration, timelineWidth, currentTime);
                    // });
                }

                for (var i = 0; i < audios.length; i++) {
                    if (audios[i].duration > 0 && !audios[i].paused) {
                        console.log(audios[i].id);
                    } else {
                        console.log('not run');
                    }
                }
            }
        }, true);

        // done
        function changePlayerImage(poster) {
            var mainImage = document.getElementById('tracks_main_img');
            mainImage.src = poster;
        }


       

        // function timeUpdate(duration, timelineWidth, currentTime) {
        //     var playPercent = timelineWidth * (currentTime / duration);

        //     playhead.style.width = playPercent + "px";
        //     var secondsIn = Math.floor(((currentTime / duration) / 3.5) * 100);

        //     // console.log(currentTime);
        //     // console.log(duration);
        //     // console.log(secondsIn);
            
        //     if (secondsIn <= 9) {
        //         timer.innerHTML = "0:0" + secondsIn;
        //     } else {
        //         timer.innerHTML = "0:" + secondsIn;
        //     }
        //     // var clear = duration.toFixed(0);
        //     // var time = clear / 60;
        //     // var stringTime = time.toFixed(2);

        //     // var decimaPoint = stringTime.substring(2);
        //     // if(decimaPoint > 60){
        //     //     decimaPoint = decimaPoint - 60;
        //     //     time += 1;
        //     //     var stringTime = time.toFixed(2);
        //     // }
        //     // allTime.innerHTML = stringTime.split('.').join(':');

        // }
    </script> --}}
@endsection
