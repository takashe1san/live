<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('adlog')}}" method="post">
        @csrf
        <input type="text" name="username" id="username" placeholder="username"/>
        <input type="text" name="password" id="password" placeholder="password"/>
        <input type="submit" value="log">
    </form>
</body>
</html>