<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('signup')}}" method="post">
        @csrf
        <select name="type" id="type">
            <option value="users">User</option>
            <option value="doctors">Doctor</option>
        </select>
        <input type="text" name="username" id="username" placeholder="username"/>
        @error('username')
            {{$message}}
        @enderror
        <input type="text" name="email" id="email" placeholder="email"/>
        @error('email')
            {{$message}}
        @enderror
        <input type="text" name="name" id="name" placeholder="name"/>
        @error('name')
            {{$message}}
        @enderror
        <input type="password" name="password" id="password" placeholder="password"/>
        @error('password')
            {{$message}}
        @enderror
        {{-- <input type="password" name="rpassword" id="password" placeholder="rpassword"/> --}}
        <input type="date" name="birth" id="birth"/>
        @error('date')
            {{$message}}
        @enderror
        <select name="bloodtyp" id="bloodtyp">
            <option value="n" selected>prefer not saying</option>
            <option value="o+">O+</option>
            <option value="o-">O-</option>
            <option value="a+">A+</option>
            <option value="a-">A-</option>
            <option value="b+">B+</option>
            <option value="b-">B-</option>
            <option value="ab+">AB+</option>
            <option value="ab-">AB-</option>
        </select>
        <input type="submit" value="send"/>
    </form>
</body>
</html>