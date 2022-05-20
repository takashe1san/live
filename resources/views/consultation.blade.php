<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ URL::asset('style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('btnCom/style.css') }}" rel="stylesheet"> --}}
    <link href="{{URL::asset('post/style.css')}}" rel="stylesheet" id="bootstrap-css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- FontAweome CDN Link for Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Document</title>
</head>
<body>
    @foreach ($value as $item)
    one
        @php
        // checking if the cons have attachments
            $existing = false;
            $dir = public_path('images/users/'. $item->username .'/cons/'. $item->con_id .'/');
            $filedir = 'images/users/'. $item->username .'/cons/'. $item->con_id .'/';
            if(file_exists($dir)){
                $scaned   = scandir($dir);
                $existing = true;
                $count    = 0;
                }
        @endphp

        @extends('parts.cons')
            @section('post-username', $item->username)
            @section('post-content', $item->con_content)
            @if($existing == true)
                @section('post-media')
                    Attachments:
                    @foreach($scaned as $file)
                        @if($file == '.' || $file == '..')
                            @continue
                        @endif
                        <a href='{{$filedir}}{{$file}}' target="_blank">file{{++$count}}</a> .
                    @endforeach
                @endsection
            @endif
    @endforeach
            


                    {{-- delete btn --}}
                    {{-- @if (session('type') == 'user' && session('info.username') == $item->username)
                        <a href="{{route('dcons')}}/{{$item->con_id}}">delete</a>
                    @endif --}}

                    {{-- report btn --}}
                    {{-- @if (session('type') !== 'user' || session('info.username') !== $item->username)
                        <form action="insertrep" method="get">
                            <input type="hidden" name="type" value="con">
                            <input type="hidden" name="id" value="{{$item->con_id}}">
                            <input type="hidden" name="raison" value="r1">
                            <input type="submit" value="report">
                        </form> 
                    @endif --}}
                    {{-- <p class="sp-paragraph mb-0">{{$item->con_content}}</p> --}}

                    {{-- showing attachments --}}
            

                <!-- /.sp-content -->
                    {{-- <div class="box">
                    <span class="x spanSl">C</span>
                    <form class="none animeSl comment" action="" method="post">
                        @csrf
                        <div class="select_file">
                            <input type="hidden" name="con_id" value="{{$item->con_id}}">
                            <input id="file-select" type="file" name="file-select" hidden>
                        <label id="file-select-btn" class="select-btn" for="file-select">Choose File</label>
                        <span id="file-select-text">No file chosen</span>
                        </div>
                    
                        <textarea name="comment" id="" cols="30" rows="10"></textarea>
                        <button type="submit">Send</button>
                    </form>
                    </div> --}}
                    {{-- @if (session('type') == 'doctor')
                    <div class="box">
                        <span class="x spanSl">A</span>
                        <form class="none animeSl answer" action="" method="post">
                        @csrf
                        <div class="select_file">
                            <input type="hidden" name="con_id" value="{{$item->con_id}}">
                            <input id="file-select" type="file" name="file-select" hidden>
                        <label id="file-select-btn" class="select-btn" for="file-select">Choose File</label>
                        <span id="file-select-text">No file chosen</span>
                        </div>
                        
                        <textarea name="content" id="" cols="30" rows="10"></textarea>
                        <button type="submit" class="answer">Send</button>
                        </form>
                    </div> 
                    @endif --}}
    <script src="{{ URL::asset('btnCom/app.js') }}"></script>
    <script src="{{ URL::asset('ajax/answer.js') }}"></script>
    {{-- <script src="{{ URL::asset('ajax/comment.js') }}"></script> --}}

</body>
</html>