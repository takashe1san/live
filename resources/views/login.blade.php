<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<!-- FontAweome CDN Link for Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{URL::asset('asset/style.css') }}" />
<title>log | Live Health</title>
<style>.spanError{color: red;}</style>
</head>
  <body>
    <div class="main">
      <div class="container a-container" id="a-container">
        <form action=" {{ route('signup') }} " class="form" id="a-form" method="POST">
        @csrf
          <h2 class="form_title title">Create Account</h2>
          <select name="type" class="select-box">
            <option value="user">user</option>
            <option value="doctor">doctor</option>
          </select>
          <input class="form__input" type="text" name="username" placeholder="Username">
          @error('username')
          <span class="spanError">{{$message}}</span>
          @enderror
          <input class="form__input" type="text" name="username" placeholder="Fullname">
          @error('name')
                <span class="spanError">{{$message}}</span>
          @enderror
          <input class="form__input" type="text" name="email" placeholder="Email">
          @error('email')
              <span class="spanError">{{$message}}</span>
            @enderror
          <input class="form__input" type="password" name='password' placeholder="Password">
          @error('password')
                <span class="spanError">{{$message}}</span>
          @enderror
          <input class="form__input" type="date"  name='birth'/>
          @error('birth')
              <span class="spanError">{{$message}}</span>
          @enderror
          <button type="submit" class="form__button button submit">SIGN UP</button>
        </form>
      </div>
      <div class="container b-container" id="b-container">
        <form action=" {{route('login')}} " class="form" id="b-form" method="POST">
        @csrf
          <h2 class="form_title title">Sign in to Website</h2>
          @error('log')
                <span class="spanError">{{$message}}</span>
          @enderror
            <select name="type" class="select-box">
              <option value="user">user</option>
              <option value="doctor">doctor</option>
            </select>
          <input class="form__input" type="text" name='username' placeholder="Username">
          <input class="form__input" type="password" name='password' placeholder="Password">
          <a class="form__link">Forgot your password?</a>
          <button type="submit" class="form__button button submit">SIGN IN</button>
        </form>
      </div>
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title">Welcome Back !</h2>
          <p class="switch__description description">To keep connected with us please login with your personal info</p>
          <button class="switch__button button switch-btn">SIGN IN</button>
        </div>
        <div class="switch__container is-hidden" id="switch-c2">
          <h2 class="switch__title title">Hello Friend !</h2>
          <p class="switch__description description">Enter your personal details and start journey with us</p>
          <button class="switch__button button switch-btn">SIGN UP</button>
        </div>
      </div>
    </div>
<!-- partial -->
<script src="{{URL::asset('asset/app.js') }}"></script>

</body>
</html>
