{{-- 
</div>

@php
@endphp
<div class="player">
    <ul>
        <li class="cover">
            <div class="player_info" style="display: flex">
                <div class="player_img">
                    <img
                        src="http://i1285.photobucket.com/albums/a583/TheGreatOzz1/Hosted-Images/Noisy-Freeks-Image_zps4kilrxml.png" />
                </div>
                <div class="player_track">
                    <h1>The Noisy Freaks</h1>
                    <h2>I Need You Back</h2>
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
                <span class="expend"><svg class="step-foreward" viewBox="0 0 25 25" xml:space="preserve">
                        <g>
                            <polygon
                                points="20.7,4.3 16.6,4.3 16.6,11.6 4.3,4.3 4.3,20.7 16.7,13.4 16.6,20.7 20.7,20.7" />
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
                        <p>0:00</p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
 --}}

@if(isset($data))
@foreach ($data as $green)
<script type="text/javascript">
    // var audio = document.getElementById("{{$green->id}}");
    // var playButton = document.getElementById("play");
    // var pauseButton = document.getElementById("pause");
    // var playhead = document.getElementById("elapsed");
    // var timeline = document.getElementById("slider");
    // var timer = document.getElementById("timer");
    // var duration;

    
    // pauseButton.style.visibility = "hidden";


    // var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;
    // audio.addEventListener("timeupdate", timeUpdate, false);


    // function timeUpdate() {
    //     var audio = document.getElementById("song-{{$green->id}}");
    //     var playPercent = timelineWidth * (audio.currentTime / duration);
    //     playhead.style.width = playPercent + "px";
    //     var secondsIn = Math.floor(((audio.currentTime / duration) / 3.5) * 100);
    //     if (secondsIn <= 9) {
    //         timer.innerHTML = "0:0" + secondsIn;
    //     } else {
    //         timer.innerHTML = "0:" + secondsIn;
    //     }
    // }


    // function play{{$green->id}}(){
    //     var audio = document.getElementById("song{{$green->id}}");
    //     var btn = document.getElementById("control{{$green->id}}").value;
    //     if( btn == "off"){
    //         audio.play();
    //         document.getElementById("control{{$green->id}}").value="on";
    //         playButton.style.visibility = "hidden";
    //         pause.style.visibility = "visible";
    //     }else{
    //         audio.pause();
    //         document.getElementById("control{{$green->id}}").value="off";
    //         playButton.style.visibility = "visible";
    //         pause.style.visibility = "hidden";
    //     }
    // }

  
    // playButton.onclick = function() {
    //     var audio = document.getElementById("song{{$green->id}}");
    //     audio.play();
    //     playButton.style.visibility = "hidden";
    //     pause.style.visibility = "visible";
    // }


    // pauseButton.onclick = function() {
    //     var audio = document.getElementById("{{$green->id}}");
    //     audio.pause();
    //     playButton.style.visibility = "visible";
    //     pause.style.visibility = "hidden";
    // }


    // audio.addEventListener("canplaythrough", function() {
    //     var audio = document.getElementById("{{$green->id}}");
    //     duration = audio.duration;
    // }, false);


</script>
@endforeach
@endif






{{-- </div>
<div id="aplayer"></div>
<style>
    #aplayer{
        z-index: 999;
        width: 100%;
        margin: 0;
        padding: 0;
        position: absolute;
        bottom: 0;
        background: rgb(13, 17, 36);
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.css  ">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.js"></script>
<script>
const ap = new APlayer({
    container: document.getElementById('aplayer'),
    listFolder: true,
    audio: [
    {
        name: 'whatername',
        artist: 'Greenday',
        url: '../front/audio/whatername.mp3',
        cover: '../front/images/greenday-21.jpg'
    },
    {
        name: 'whatername',
        artist: 'Greenday',
        url: '../front/audio/whatername.mp3',
        cover: '../front/images/greenday-21.jpg'
    },
    {
        name: 'whatername',
        artist: 'Greenday',
        url: '../front/audio/whatername.mp3',
        cover: '../front/images/greenday-21.jpg'
    },
]
});
</script> --}}
