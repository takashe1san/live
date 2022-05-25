<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="upinfo" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="name" value="{{session('info.name')}}"/><br>
        <textarea name="bio" id="bio" cols="30" rows="5">{{session('info.bio')}}</textarea><br>
        <input type="email" name="email" id="email " placeholder="email" value="{{session('info.email')}}"/><br>
        @if( session('type') == 'user')
            <select name="blood" id="blood">
                <option value="Null">blood type</option>
                <option value="o+">o+</option>
                <option value="o-">o-</option>
                <option value="a+">a+</option>
                <option value="a-">a-</option>
                <option value="b+">b+</option>
                <option value="b-">b-</option>
                <option value="ab+">ab+</option>
                <option value="ab-">ab-</option>
            </select>
        @endif
        @if(session('type') == 'doctor')
            <select name="section" id="blood">
                <option value="general">general</option>
                <option value="internal">internal</option>
            </select>
        @endif
        <br>
        <input type="submit" value="update">
    </form>
</body>
</html>