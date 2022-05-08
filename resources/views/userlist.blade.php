<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{URL::asset('bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="{{URL::asset('bootstrap.min.js')}}"></script>
</head>
<body>
    @foreach($info as $user)
    
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4 img-container">
                        {{-- <img src="{{session('img')}}" alt="" class="img-rounded img-responsive"/> --}}
                    </div>
                    
                    <div class="col-sm-6 col-md-8">
                        <h4>{{$user->name}}</h4>

                        <small> 
                            <cite title="San Francisco, USA">
                                <i class="glyphicon glyphicon-user"></i> 
                                {{$user->username}}
                            </cite>
                        </small>

                        <p>
                            <i class="glyphicon glyphicon-pencil"></i>
                            {{$user->bio}}
                            <br />

                            <i class="glyphicon glyphicon-envelope"></i>
                            {{$user->email}}
                            <br />

                            <i class="glyphicon glyphicon-gift"></i>
                            {{$user->birth}}
                            {{-- <br/>
                            <a href="/file">change img</a>
                            <a href="/del-img">delete img</a>
                            <br/>
                            <a href="/del-acc">delete my account</a>
                        </p> --}}

                         {{-- logout button --}}
                        {{-- <div class="btn-group">
                            <a href="{{url('logout')}}">
                                <button type="button" class="btn btn-danger">
                                    logout
                                </button>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @endforeach
</body>
</html>