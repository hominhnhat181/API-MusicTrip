</div>

@php
@endphp
<div class="player">
    <ul>
        <li class="cover">
            <div class="player_info" style="display: flex">
                <div class="player_img">
                    <img id="tracks_main_img"
                        src="http://i1285.photobucket.com/albums/a583/TheGreatOzz1/Hosted-Images/Noisy-Freeks-Image_zps4kilrxml.png" />
                </div>
                <div class="player_track">
                    <h1 id="track-player">The Noisy Freaks</h1>
                    <h2 id="artist-player">I Need You Back</h2>
                </div>
            </div>
        </li>
        <li class="info">
            <div class="controls">
                <span class="expend"><svg class="step-backward" viewBox="0 0 25 25" xml:space="preserve">
                        <g>
                            <polygon points="4.9,4.3 9,4.3 9,11.6 21.4,4.3 21.4,20.7 9,13.4 9,20.7 4.9,20.7" />
                        </g>
                    </svg></span>
                <svg id="play" viewBox="0 0 25 25" xml:space="preserve">
                    <defs>
                        <rect x="-49.5" y="-132.9" width="446.4" height="366.4" />
                    </defs>
                    <g>
                        <circle fill="none" cx="12.5" cy="12.5" r="10.8" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.7,6.9V18c0,0,0.2,1.4,1.8,0l8.1-4.8c0,0,1.2-1.1-1-2L9.8,6.5 C9.8,6.5,9.1,6,8.7,6.9z" />
                    </g>
                </svg>
                <svg id="pause" viewBox="0 0 25 25" xml:space="preserve">
                    <g>
                        <rect x="6" y="4.6" width="3.8" height="15.7" />
                        <rect x="14" y="4.6" width="3.9" height="15.7" />
                    </g>
                </svg>
                <span class="expend">
                    <svg class="step-foreward" viewBox="0 0 25 25" xml:space="preserve">
                        <g>
                            <polygon points="20.7,4.3 16.6,4.3 16.6,11.6 4.3,4.3 4.3,20.7 16.7,13.4 16.6,20.7 20.7,20.7" />
                        </g>
                    </svg>
                </span>
            </div>
            <div class="button-items">
                <div style="display: flex">
                    <div class="time">
                        <p id="timer">0:00</p>
                    </div>
                    <div id="slider">
                        <div id="elapsed"></div>
                    </div>
                    <div class="time">
                        <p id="allTime">0:00</p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
    var audios = document.getElementsByTagName('audio');
    // restart another song when active one song
    document.addEventListener('play', function(e) {
        for (var i = 0; i < audios.length; i++) {
            if (audios[i] != e.target) {
                audios[i].currentTime = 0;
                audios[i].pause();
            } else {
                var classGrandpa = $(e.target).parent().parent().parent().attr('class');
                var poster = $('.' + classGrandpa + ' .main_track_img').attr('src');
                var trackName = $('.' + classGrandpa + ' .info .trackSong').attr('track');
                var artistName = $('.' + classGrandpa + ' .info .trackArtist').attr('artist');
                changePlayerInfomation(poster, trackName, artistName);
            }
        }
    }, true);

    function changePlayerInfomation(poster, trackName, artistName) {
        var mainImage = document.getElementById('tracks_main_img');
        var playerTrackName = document.getElementById('track-player');
        var playerTrackArtist = document.getElementById('artist-player');
        playerTrackName.innerHTML = trackName;
        playerTrackArtist.innerHTML = artistName;
        mainImage.src = poster;
    }

    var playButton = document.getElementById("play");
    var pauseButton = document.getElementById("pause");
    var playhead = document.getElementById("elapsed");
    var timeline = document.getElementById("slider");
    var timer = document.getElementById("timer");
    var duration;
    pauseButton.style.visibility = "hidden";

    var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;

    $(document).on('click', '.start_music', function() {
        // var audioId = 
        var music = document.getElementById($(this).attr('audio'));

        music.play();
        music.addEventListener("timeupdate", timeUpdate, false);
        playButton.style.visibility = "hidden";
        pause.style.visibility = "visible";

        function timeUpdate() {
            var minus = 0;
            var playPercent = timelineWidth * (music.currentTime / duration);
            playhead.style.width = playPercent + "px";

            // currentTime
            var secondsIn = Math.floor(music.currentTime);

            var seconds = secondsIn % 60;
            var foo = secondsIn - seconds;
            var minutes = foo / 60;
            if (seconds < 10) {
                seconds = "0" + seconds.toString();
            }
            timer.innerHTML = minutes + ":" + seconds;

            // duration
            var minutes = Math.floor(duration / 60);
            var seconds = Math.floor(duration - minutes * 60);
            allTime.innerHTML = minutes + ':' + seconds;
        }

        playButton.onclick = function() {
            music.play();
            playButton.style.visibility = "hidden";
            pause.style.visibility = "visible";
        }

        pauseButton.onclick = function() {
            music.pause();
            playButton.style.visibility = "visible";
            pause.style.visibility = "hidden";
        }

        music.addEventListener("canplaythrough", function() {
            duration = music.duration;
        }, false);
    });
</script>
