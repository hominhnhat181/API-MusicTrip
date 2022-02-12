// var audios = document.getElementsByTagName('audio');
// var playButton = document.getElementById("play");
// var pauseButton = document.getElementById("pause");
// var playhead = document.getElementById("elapsed");
// var timeline = document.getElementById("slider");
// var timer = document.getElementById("timer");
// var preSong = document.getElementById("pre-song");
// var nextSong = document.getElementById("next-song");
// pauseButton.style.visibility = "hidden";
// var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;

// // restart another song when active one song
// function resetAudio(){
//     document.addEventListener('play', function(e) {
//         for (var i = 0; i < audios.length; i++) {
//             if (audios[i] != e.target) {
//                 audios[i].currentTime = 0;
//                 audios[i].pause();
//             } else {
//                 var classGrandpa = $(e.target).parent().parent().parent().attr('class');
//                 var poster = $('.' + classGrandpa + ' .main_track_img').attr('src');
//                 var trackName = $('.' + classGrandpa + ' .info .trackSong').attr('track');
//                 var artistName = $('.' + classGrandpa + ' .info .trackArtist').attr('artist');
//                 changePlayerInfomation(poster, trackName, artistName);
//             }
//         }
//     }, true);
// }


// function changePlayerInfomation(poster, trackName, artistName) {
//     var mainImage = document.getElementById('tracks_main_img');
//     var playerTrackName = document.getElementById('track-player');
//     var playerTrackArtist = document.getElementById('artist-player');
//     playerTrackName.innerHTML = trackName;
//     playerTrackArtist.innerHTML = artistName;
//     mainImage.src = poster;
// }




// $(document).on('click', '.start_music', function() {
//     var music = document.getElementById($(this).attr('audio'));
//     var preId = $(this).attr('pre');
//     var nextId = $(this).attr('next');
//     var duration = music.duration;

//     $(playButton).trigger('click');
//     music.addEventListener("timeupdate", timeUpdate, false);

//     playButton.onclick = function playAudio() {
//         music.play();
//         playButton.style.visibility = "hidden";
//         pauseButton.style.visibility = "visible";
//     }

//     pauseButton.onclick = function() {
//         music.pause();
//         playButton.style.visibility = "visible";
//         pauseButton.style.visibility = "hidden";
//     }

//     // nên chuyển về click -> function
//     preSong.onclick = function preSong() {
//         if (preId) {
//             resetAudio();
//             preMusic = document.getElementById('music' + preId);
//             preId = $(preMusic).parent().attr('pre');
//             nextId = $(preMusic).parent().attr('next');
//             music = document.getElementById($(preMusic).parent().attr('audio'));
//             duration = music.duration;

//             $(playButton).trigger('click');
//             music.play();
//             music.addEventListener("timeupdate", timeUpdate, false);

//         } else {
//             music.currentTime = 0;
//         }
//     }

//     nextSong.onclick = function nextSong() {
//         if (nextId) {
//             resetAudio();
//             nextMusic = document.getElementById('music' + nextId);
//             preId = $(nextMusic).parent().attr('pre');
//             nextId = $(nextMusic).parent().attr('next');
//             music = document.getElementById($(nextMusic).parent().attr('audio'));
//             duration = music.duration;
//             music.play();
//             music.addEventListener("timeupdate", timeUpdate, false);
//             $(playButton).trigger('click');

//         } else {
//             music.currentTime = 0;
//         }
//     }

//     function timeUpdate() {
//         var playPercent = timelineWidth * (music.currentTime / duration);
//         playhead.style.width = playPercent + "px";
//         // currentTime
//         var secondsIn = Math.floor(music.currentTime);
//         var seconds = secondsIn % 60;
//         var foo = secondsIn - seconds;
//         var minutes = foo / 60;
//         if (seconds < 10) {
//             seconds = "0" + seconds.toString();
//         }
//         timer.innerHTML = minutes + ":" + seconds;
//         // duration
//         var minutes = Math.floor(duration / 60);
//         var seconds = Math.floor(duration - minutes * 60);
//         allTime.innerHTML = minutes + ':' + seconds;
//         // auto next song
//         if (secondsIn == duration) {
//             $(document).ready(function() {
//                 $asd =  $(nextSong).trigger('click');
//                 if( $asd){
//                      console.log('next song turn success');
//                 }
//             });
//         }
//         console.log(secondsIn, Math.floor(duration));
//     }





//     function setVolume(percentage) {
//         music.volume = percentage;

//         var percentageOfVolume = music.volume / 1;
//         var percentageOfVolumeSlider = document.getElementById('volumeMeter').offsetWidth *
//             percentageOfVolume;

//         document.getElementById('volumeStatus').style.width = Math.round(percentageOfVolumeSlider) + "px";
//     }

//     //Set's new volume id based off of the click on the volume bar.
//     function setNewVolume(obj, e) {
//         var volumeSliderWidth = obj.offsetWidth;
//         var evtobj = window.event ? event : e;
//         clickLocation = evtobj.layerX - obj.offsetLeft;

//         var percentage = (clickLocation / volumeSliderWidth);
//         setVolume(percentage);
//     }
// });