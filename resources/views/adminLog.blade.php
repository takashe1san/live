<!DOCTYPE html>
<html>
<head>
    <title> CSS Login Screen Tutorial </title>
    <link rel="stylesheet" href="{{URL::asset('asset/adminlog.css') }}">
</head>
<body>
  <body>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>ADMIN LOGIN</h3>
            <p>you need to login to use admin permissions</p>
          </div>
        </div>
        <form class="login-form" method="POST" action="{{url('adlog')}}">
          @csrf
          <input name="username" type="text" placeholder="username"/>
          <input name="password" type="password" placeholder="password"/>
          <button type="submit">login</button>
        </form>
      </div>
    </div>
</body>
</body>
</html>