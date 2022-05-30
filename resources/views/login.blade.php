<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{URL::asset('asset/style.css') }}" />
    <title>log | Live Health</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action=" {{route('login')}} " class="sign-in-form" method="POST">
            @csrf
            <h2 class="title">Sign in</h2>
              <input type="checkbox" value="doctor" name="type" id="Doc" hidden/>
              <input type="checkbox" value="user" name="type" id="User" hidden/>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name='username' placeholder="Username" />
              @error('username')
                {{$message}}
              @enderror
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name='password' placeholder="Password" />
              @error('password')
                {{$message}}
              @enderror
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </form>

          {{-- signup********************************************** --}}
          <form action=" {{ route('signup') }} " class="sign-up-form" method="post">
            @csrf
            <input type="checkbox" value="doctor" name="type" id="Doc1" hidden/>
            <input type="checkbox" value="user" name="type" id="User1" hidden/>            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name='susername' placeholder="Username" />
              @error('susername')
                {{$message}}
              @enderror
            </div>
              <div class="input-field">
                  <i class="fas fa-user"></i>
                  <input type="text" name='name' placeholder="Fullname" />
              </div>
              @error('name')
                {{$message}}
              @enderror
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name='email' placeholder="Email" />
            </div>
            @error('email')
              {{$message}}
            @enderror
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name='spassword' placeholder="Password" />
              @error('spassword')
                {{$message}}
              @enderror
            </div>
              <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input type="date"  name='birth'/>
                  @error('birth')
                    {{$message}}
                  @enderror
              </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
              <div class="select">
                  <span onclick="changeTypeDoc()">Doc</span>
                  <i onclick="changeType()">
                      <img src="{{URL::asset('asset/img/arrow-left-short.svg') }} "class="soosoo">
                  </i>
                  <span onclick="changeTypeUser()">User</span>
              </div>

          </div>
          <img src="{{URL::asset('asset/img/log.svg') }}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
              <div class="select_s">
                  <span onclick="changeTypeDoc()">Doc</span>
                  <i onclick="changeType()">
                      <img src="{{URL::asset('asset/img/arrow-left-short.svg') }} "class="soosoo">
                  </i>
                  <span onclick="changeTypeUser()">User</span>
              </div>
          </div>
          {{-- <img src="{{URL::asset('asset/img/register.svg') }}" clet="image" alt="" /> --}}
        </div>
      </div>
    </div>


    <script src="{{URL::asset('asset/app.js') }}"></script>
  </body>
</html>
