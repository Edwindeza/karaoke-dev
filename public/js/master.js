$( document ).ready(function() {
    var node_server     = $("#node").val();
    var client_id       = $("#id").val();
    var video_player    = $("#player");

    var base            = $("#base").val() + "/";
    var base_video      = $("#base").val() + '/uploads/video/';

    var playlist = [];
    
    var inList;

    var socket = io.connect(node_server, {'forceNew' : true});

    function playVideo(){
        console.log(video_player.get(0).src);
        video_player.get(0).load();
        video_player.get(0).play();
    }

    function stopVideo(){
        video_player.get(0).pause();
    }

    function changeVideo(){
        video_player.get(0).src = change_video;
        video_player.get(0).load();
    }

    function getNextVideo(){
        console.log('getNextVideo');
        var currentSong;

        if(playlist.length == 0){
            currentSong = base_video + "propaganda.mp4";
        }
        else{
            currentSong = playlist[0];
            playlist.splice(0, 1);
        }

        return currentSong;
    }

    function nextVideo(){
        console.log('nextVideo');
        inList = getNextVideo();
        video_player.get(0).src = inList;
        playVideo();
    }

    function addToPlayList(song){
        playlist.push(song);
    }

    video_player.on('ended', function(){
        nextVideo();

        var data = {
            id: client_id,
            currentTime: 0,
            song: inList
        };

        socket.emit('sync', data);
    });

    function init(){
        console.log('init');
        if(playlist.length == 0){
            video_player.get(0).src = base_video + "propaganda.mp4";
        }
        playVideo();
    }

    socket.on('connect', function(data){
        var client = {
            id:     client_id,
            socket: null,
            type: 'master'
        };

        socket.emit('configure', client);
    });
    var video = document.getElementById('player');
    socket.on('ask-time', function(data){
        console.log('ask-time');
        var start = new Date();
        data['currentTime'] = video.currentTime;
        data['start'] = start.getTime();
        socket.emit('response-time', data);
    });

    init();

    socket.on('add-song', function(data){
        console.log(data);
        addToPlayList(data);
    });
});