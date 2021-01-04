@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/categories/list.css') }}">
@endsection
@section('content')
    <h3>{{$post->title}}</h3>
    <span class="date">{{$post->created_at}}</span>
    <br>
    <br>

    <button class="btn btn-info" onclick="openFullscreen()">Mở rộng</button>
    <div class="row">
        <div class="col-12">{!! $post->content !!}</div>
    </div>
    <div id="full-screen" class="row">
        {!! $post->embed !!}
    </div>
@endsection

@section('js')
    <script type="text/javascript">

        var elem = document.getElementById("full-screen").firstChild;
        function openFullscreen() {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.mozRequestFullScreen) { /* Firefox */
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE/Edge */
                elem.msRequestFullscreen();
            }
        }
    </script>
@endsection
