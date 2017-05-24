$( document ).ready(function() {
    var node_server     = $("#node").val();
    var client_id       = $("#id").val();
    var base            = $("#base").val()+'/';
    var base_video      = $("#base").val() + '/uploads/video/';
    var base_propaganda = $("#base").val() + '/uploads/video/';
    var playlist        = [];

    var socket = io.connect(node_server, {'forceNew' : true});

    socket.on('show-error', function(data){
        console.log(data);
    });

    function playVideo(){
        var data = {
            id: client_id
        };
        socket.emit('play-tv', data);
    }

    function addSong(){
        var code = $("#code").val();
        if(!code)
        {
            alert('Debe colocar un codigo');
        }
        $.get( base + "check/" + code, function( song ) {
            if(song.id){
                var data = {
                    id:     client_id,
                    song:   base_video + song.code + ".mp4"
                }
                socket.emit('add-song', data);
                var data = {
                    id:     client_id,
                    song:   base_propaganda + "propaganda.mp4"
                }
                socket.emit('add-song', data);
                $("#songs").append('<tr id="'+code+'"><td style="text-align: center;">'+code+'</td></tr>');
            }
            else{
                alert('Musica no encontrada');
            }
        });
    }

    $("#playButton").click(function(e){
        playVideo();
    });

    $("#changeButton").click(function(e){
        console.log('Change video ...');
        changeVideo();
    });

    $("#setPlayList").click(function(e){
        console.log('');

    });

    $("#add-button").click(function(e){
        console.log('add');
        addSong();
    });
});