$( document ).ready(function() {
    var node_server     = $("#node").val();
    var client_id       = $("#id").val();
    var video_player    = $("#player");

    var base            = $("#base").val() + "/";
    var base_video      = $("#base").val() + '/uploads/video/';

    var playlist = [];
    
    var currentSong;
    var synced = false;

    var socket = io.connect(node_server, {'forceNew' : true});

    socket.on('connect', function(data){
        var client = {
            id:     client_id,
            socket: null,
            type: 'slave'
        };

        socket.emit('configure', client);
    });

    var videoChangingPending = false;
    var video = document.getElementById('player');
    var start, diff;
    start = new Date();
    function changeSource(data){
        console.log('change-source');
        try {
            video.src = data.song;
        }
        catch(e){
            alert(e);
        }
        video_player.attr('autoplay', true);
        video.load();

        try{
            video.play();
        }catch(e){
            alert(e);
        }
    }
    var used = false;
    socket.on('sync', function(data){
        used = false;
        start = new Date();
        console.log('sync');
        console.log('')
        video.pause();
        setTimeout(changeSource(data), 2000);
    });

    socket.on('response-time', function(data){
        var end = new Date();
        console.log('response-time');
        console.log(data.currentTime);
        console.log(data.start);
        console.log(end.getTime());
        console.log(end.getTime() - data.start);
        video.currentTime = data.currentTime + ((end.getTime()-data.start)/1000)/1000;
        console.log((end.getTime()-data['start'])/1000);
        socket.emit('debug-time', {diff: ((end.getTime()-data['start'])/1000), currentTime: video.currentTime})
    });

    video_player.on('canplay', function(){
        if(used == true)return;
        used = true;
        console.log('canplay');

        var data = {
            id: client_id
        };

        socket.emit('ask-time', data);
    });
});