<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ URL::asset('style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('cons/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


</head>
<body>
    <div class="container_post Ac">
        <i class="bi bi-x-circle-fill btnPostAc" id="btnPost"></i>
        <div class="wrapper">
          <section class="post">
            <header>Create Post</header>
            <form  action="{{route('cons')}}" method="post" id="formPost" enctype="multipart/form-data">
              <div class="content">
                @csrf
                <img src="{{ URL::asset('cons/icons/logo.png') }}" alt="logo">
                <div class="details">
                  <p>CodingNepal</p>
                  <div class="privacy">
                    <input type="text" name="section" value="General" hidden>
                    <i class="ii bi bi-globe"></i>
                    <span alt="Anyone on or off Facebook">Public</span>
                    <i class="bi bi-caret-down-fill"></i>
                  </div>
                </div>
              </div>
              <textarea name="content" placeholder="What's on your mind, CodingNepal?" spellcheck="false" required></textarea>
              <div class="options">
                <p id="fileConfig">Add to Your Post</p>
               <i class="bi bi-images" alt="gallery" id="fileImg" ></i>
               <input type="file" name="attach[]" id="inputfile" multiple hidden>
              </div>
              <button type="submit" id="sendPost">Post</button>
            </form>
          </section>
          <section class="audience">
            <header>
              <div class="arrow-back">
                <!-- <i class="fas fa-arrow-left"></i> -->
                <i class="bi bi-arrow-left-circle-fill"></i>
              </div>
              <p>Select Audience</p>
            </header>
            <div class="content">
              <p>Who can see your post?</p>
              <span>Your post will show up in News Feed, on your profile and in search results.</span>
            </div>
            <ul class="list">
              <li class="active">
                <div class="column">
                  <div class="icon">
                    <!-- <i class="fas fa-globe-asia"></i> -->
                    <i class="bi bi-globe"></i>
                  </div>
                  <div class="details">
                    <p>Public</p>
                    <span>Anyone on or off Facebook</span>
                  </div>
                </div>
                <div class="radio"></div>
              </li>
              <li>
                <div class="column">
                  <div class="icon">
                    <!-- <i class="fas fa-user-friends"></i> -->
                    <i class="bi bi-people-fill"></i>
                  </div>
                  <div class="details">
                    <p>Friends</p>
                    <span>Your friends on Facebook</span>
                  </div>
                </div>
                <div class="radio"></div>
              </li>
              <li>
                <div class="column">
                  <div class="icon">
                    <!-- <i class="fas fa-lock"></i> -->
                    <i class="bi bi-shield-lock"></i>
                  </div>
                  <div class="details">
                    <p>Only me</p>
                    <span>Only you can see your post</span>
                  </div>
                </div>
                <div class="radio"></div>
              </li>
            </ul>
          </section>
        </div>
      </div>
  <script src="{{ URL::asset('cons/app.js') }}"></script>
    
</body>
</html>