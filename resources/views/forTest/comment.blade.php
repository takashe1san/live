<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('style.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    {{-- {{print_r($cons->con_section)}} --}}
    @foreach ($value as $item)
        {{$item}} <br/>
        <!-- /.stream-post -->
        <div class="stream-post">
            {{-- cons end  --}}
            <div class="sp-author">
                <a href="#" class="sp-author-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt=""></a>
                <h6 class="sp-author-name"><a href="#">{{$item->username}}</a></h6>
            </div>
            <div class="sp-content">
                <div class="sp-info">{{$item->com_date}}</div>
                @if (session('info.username') == $item->username)
                    <a href="{{route('dcom')}}/{{$item->com_id}}">delete</a>
                @endif
                
                <p class="sp-paragraph mb-0">{{$item->com_content}}</p>
            </div>
            <!-- /.sp-content -->
        </div>
    @endforeach
    
</body>
</html>