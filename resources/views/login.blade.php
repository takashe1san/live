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
          <div class="select-box">
            <div class="select-box__current" tabindex="1">
              <div class="select-box__value">
                <input class="select-box__input" type="radio" id="0" value="user" name="type" checked="checked"/>
                <p class="select-box__input-text">User</p>
              </div>
              <div class="select-box__value">
                <input class="select-box__input" type="radio" id="1" value="doctor" name="type"/>
                <p class="select-box__input-text">Doctor</p>
              </div>
              <i class="bi bi-caret-down-fill"></i>
            </div>
            <ul class="select-box__list">
              <li>
                <label class="select-box__option" for="0" aria-hidden="aria-hidden">User</label>
              </li>
              <li>
                <label class="select-box__option" for="1" aria-hidden="aria-hidden">Doctor</label>
              </li>
            </ul>
          </div>
          <input class="form__input" type="text" name="username" placeholder="Name">
          @error('susername')
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
          @error('spassword')
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
          <div class="select-box">
            <div class="select-box__current" tabindex="1">
              <div class="select-box__value">
                <input class="select-box__input" type="radio" id="0" value="user" name="type" checked="checked"/>
                <p class="select-box__input-text">User</p>
              </div>
              <div class="select-box__value">
                <input class="select-box__input" type="radio" id="1" value="doctor" name="type"/>
                <p class="select-box__input-text">Doctor</p>
              </div>
              <i class="bi bi-caret-down-fill"></i>
            </div>
            <ul class="select-box__list">
              <li>
                <label class="select-box__option" for="0" aria-hidden="aria-hidden">User</label>
              </li>
              <li>
                <label class="select-box__option" for="1" aria-hidden="aria-hidden">Doctor</label>
              </li>
            </ul>
          </div>
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
