<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{URL::asset('bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="{{URL::asset('bootstrap.min.js')}}"></script>
    <style>
        .img-container{
            max-height: 100px;
            overflow: hidden;
            border-radius: 50%;
            max-width: 100px;
        }
        .img-rounded{
            transform: translate(-12px, -44px);
            width: 100px;
        }
    </style>
</head>
<body>

@extends('parts.user')
    @section('img',      session('img'))
    @section('name',     session('info.name'))
    @section('username', session('info.username'))
    @section('email',    session('info.email'))
    @section('bio',      session('info.bio'))
    @section('birth',    session('info.birth'))

</body>
</html>