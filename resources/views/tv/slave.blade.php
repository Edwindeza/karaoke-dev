<!DOCTYPE html>
<html>
<head>
    <title>C'cretos</title>
    <script type="text/javascript" src="{{ config('rt.host') }}/socket.io/socket.io.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.1.0.min.js' )}}"></script>
    <script type="text/javascript" src="{{ asset('js/slave.js' )}}"></script>
    <style type="text/css">
        div#container{
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            overflow: hidden;
            z-index: -100;
        }

        video#player{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body style="width: 100%;height: 100%;">
    <video id="player" src="{{ route('index') }}/uploads/video/video1.mp4" controls="controls" muted="muted" style="position: absolute;left: 0;top: 0;right: 0;bottom: 0;height: 100%;width: 100%;">
    </video>
    <input type="hidden" name="node" value="{{ config('rt.host') }}" id="node">
    <input type="hidden" name="id" value="{{ $id }}" id="id">
    <input type="hidden" id="base" value="{{ route('index') }}">
</body>
</html>