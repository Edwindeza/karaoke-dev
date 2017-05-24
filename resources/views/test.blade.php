<!DOCTYPE HTML>
<html style="width: 100%;height: 100%;">
    <head>
      <!-- 
      This must be served by a web browser as it uses an async http
      request to fetch the cdg file.
      -->
      <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
      <script src="{{ asset('js/cdg.js') }}"></script>
      <script>
        $(document).ready(function() {
            var playlist    = [];
            var current     = 0;
            var max         = 0;
            var player = new CDGPlayer(document.getElementById('karaoke-display'));
            var song = document.getElementById('song');

            function addToPlayList(cdg, mp3){
                playlist.push({"cdg": cdg, "mp3": mp3});
                max = playlist.length;
            }

            function clearPlayList(cdg, mp3){
                playlist = [];
                current = 0;
                max = 0;
            }

            function play(){
                player.load(playlist[current].cdg);
                song.src = playlist[current].mp3;
                song.play();
                player.play();
            }

            function nextSong(){
                if(current >= max)return;
                current++;
                play();
            }

            function stopPlayList(){

            }

            function initPlayList(){
                play();
            }


            
            addToPlayList("{{ asset('karaoke/example1.cdg') }}", "{{ asset('karaoke/example1.mp3') }}");
            addToPlayList("{{ asset('karaoke/example2.cdg') }}", "{{ asset('karaoke/example2.mp3') }}");
            addToPlayList("{{ asset('karaoke/example3.cdg') }}", "{{ asset('karaoke/example3.mp3') }}");

            //player.load("{{ asset('karaoke/example2.cdg') }}");
            
            song.addEventListener("playing", function() {
                player.resume();
            });
            song.addEventListener("pause", function() {
                player.pause();
            });

            song.addEventListener("ended", function(){
                nextSong();
            });
            initPlayList();
        });
      </script>
    </head>
    <body style="width: 100%;height: 100%;">
        <video id="video" src="{{ asset('karaoke/ex1.mp4') }}" autoplay="autoplay" controls style="position: absolute;left: 0;top: 0;right: 0;bottom: 0;height: 100%;width: 100%;">
            
        </video>
    </body>
</html>