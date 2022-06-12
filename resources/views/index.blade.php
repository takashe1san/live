<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{URL::asset('post/style/style.css')}}">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- FontAweome CDN Link for Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <title>Live Health</title> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            @if(session('type') != null)
            @php
            $imgProfil = session('img');
            $username = session('info.username');
            $bio = session('info.bio');
            @endphp
            <div class="image-text">
                <span class="image">
                    <img src="{{session('img')}}" alt="" >
                </span>

                <div class="text logo-text">
                    <span class="name">{{$username}}</span>
                    <span class="profession">{{$bio}}</span>
                </div>
            </div>
            @else
            @php
            $imgProfil = "URL::asset('post/icons/logo.png')";
            $username = "LiveHealth";
            $bio = "consultation & answer";
            @endphp
            <div class="image-text">
                <span class="image" >
                    <img src="{{$imgProfil}}" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">{{$username}}</span>
                    <span class="profession">{{$bio}}</span>
                </div>
            </div>
            @endif

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>
                <div class="search_box_sl">
                        <ul>
                        </ul>
                    </div>
                <ul class="menu-links" >
                    <li class="nav-link ac">
                        <a href="#">
                            <i class='bi bi-house-door icon' ></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-link" id="add">
                        <a href="#">
                            <i class='bi bi-chat-square-text icon' ></i>
                            <span class="text nav-text">Add Post</span>
                        </a>
                    </li>

                    <li class="btnpostssett nav-link sle">
                        <a href="#">
                            <i class='bi bi-bookmarks icon' ></i>
                            <span class="text nav-text">Revenue</span>
                        </a>
                    </li>
                    <div class="postssett">
                        <ul>
                            <li class="po_sl"><a href="/">All Consultations</a></li>
                            <li class="po_sl"><a href="/myCons">My Consultations</a></li>
                            <li class="po_sl"><a href="/likedCons">Liked Consultations</a></li>
                        </ul>
                    </div>
                    <li class="btnNotifications nav-link sle">
                        <a href="#">
                            <i class=' bi bi-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                        
                    </li>
                    <div class="Notifications">
                        <i class="backnot  bi bi-arrow-left-circle"></i>
                        <ul>
                            <li class="NotificationsSle">
                                <img src="{{URL::asset('post/icons/logo.png')}}" class="imgNotsmal">
                                <p class="pNotsmal">ssssssssssssss</p>
                                <span class="sendersmal" hidden>user: AboIbrahem</span>
                                <span class="subsmal" hidden>sub: Hello</span>
                                <span class="timeNotsmal">3h ago</span>
                            </li>
                            <li class="NotificationsSle">
                                <img src="{{URL::asset('post/icons/logo.png')}}" class="imgNotsmal">
                                <p class="pNotsmal">ggggggg</p>
                                <span class="sendersmal" hidden>user: Ahmad</span>
                                <span class="subsmal" hidden>sub: Hello</span>
                                <span class="timeNotsmal">2h ago</span>
                            </li>
                        </ul>
                        <div class="showNotifications">
                            <div>
                                <img src="{{URL::asset('post/icons/logo.png')}}"class="imgNotlarg" >
                                <span class="timeNotlarg"></span>
                            </div>
                            <span class="sender"></span>
                            <span class="sub"></span>
                            <p class="pNotlarg"></p>
                        </div>
                    </div>
                    <li class="nav-link sle" >
                        <a href="#">
                            <i class='bi bi-gear icon' id="showProfile"></i>
                            <span class="text nav-text">Profile</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">

                @if (session('type') != null)     
                    <li class="">
                        <a href="/logout">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>    
                @else
                    <li class="">
                        <a href="/log">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">Login</span>
                        </a>
                    </li>        
                @endif
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>
    <div class="lic">
        <p>go to dkfmokwmgod</p>
        <span id="showlec_formRun">click Here</span>
    </div>
    <section class="cont">

        <section class="left">
            {{-- cons section --}}
            <div class="container_post container_postSl">
                <div class="wrapper">
                <section class="post">
                @if (session('type') == 'user')
                    <form  action="#" method="post" id="formPost" enctype="multipart/form-data">
                        @csrf
                        <i id="postType" hidden>user</i>
                        <div class=" user-profile">
                            <img src="{{session('img')}}" alt="logo">
                            <div class="details">
                                <p>{{session('info.username')}}</p>
                                <div class="privacy">
                                    <input type="hidden" name="section" value="General">
                                    <i class="ii bi bi-globe"></i>
                                    <span alt="Anyone on or off Facebook">General</span>
                                    <i class="bi bi-caret-down-fill"></i>
                                </div>
                            </div>
                        </div>
                        <textarea name="content" placeholder="Write your Consultation here" spellcheck="false" required></textarea>
                        <div class="options">
                            <p id="fileConfig">Add to Your Post</p>
                            <i class="bi bi-images" alt="gallery" id="fileImg" ></i>
                            <input type="file" name="attach[]" id="inputfile" multiple hidden>
                        </div>
                        <button id="sendPost" name="s">Post</button>
                    </form>
                    @else
                    <form  action="#" method="post" id="formPost" enctype="multipart/form-data">
                        @csrf
                        <i id="postType" hidden>doctor</i>
                        <div class=" user-profile">
                            <img src="icons/logo.png" alt="logo">
                            <div class="details">
                                <p>{{session('info.username')}}</p>
                                <div class="privacy">
                                    <input type="text" name="section" value="General" hidden>
                                    <i class="ii bi bi-globe"></i>
                                    <span alt="Anyone on or off Facebook">General</span>
                                    <i class="bi bi-caret-down-fill"></i>
                                </div>
                            </div>
                        </div>
                        <textarea name="content" placeholder="Write your Quick info here" spellcheck="false" required></textarea>
                        {{-- <div class="options">
                            <p id="fileConfig">Add to Your Post</p>
                            <i class="bi bi-images" alt="gallery" id="fileImg" ></i>
                            <input type="file" name="attach[]" id="inputfile" hidden>
                        </div> --}}
                        <button id="sendPost" name="s">Post</button>
                    </form>
                    @endif
                </section>
                <section class="audience">
                    <header>
                    <div class="arrow-back">
                        <!-- <i class="fas fa-arrow-left"></i> -->
                        <i class="bi bi-arrow-left-circle-fill"></i>
                    </div>
                    <p>Select Audience</p>
                    </header>

                    <ul class="list">
                    <li class="active">
                        <div class="column">
                        <div class="icon">
                            <!-- <i class="fas fa-globe-asia"></i> -->
                            <i class="bi bi-globe"></i>
                        </div>
                        <div class="details">
                            <p>General</p>
                            <span>To General Doctors</span>
                        </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                    <li>
                        <div class="column">
                        <div class="icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <div class="details">
                            <p>Internal</p>
                            <span>To Internal Doctors</span>
                        </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                    <li>
                        <div class="column">
                        <div class="icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="details">
                            <p>Pediatrics</p>
                            <span>To Pediatrics Doctors</span>
                        </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                    <li>
                        <div class="column">
                        <div class="icon">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                        <div class="details">
                            <p>Cardiology</p>
                            <span>To Cardiology Doctors</span>
                        </div>
                        </div>
                        <div class="radio"></div>
                    </li>
                    </ul>
                </section>
                </div>
            </div>
            @include('cons')
        </section>
        <section class="right">
            <div class="right-sidebar">
                <div class="sidebar-title">
                    <h4>Quick Info</h4>
                </div>
                <div class="event">
                    <ul>
                        @foreach ($info as $item)
                        <li class="eventSel">
                            <div class="right-event">
                                <p>
                                    {{$item->info_content}}
                                </p>
                                {{-- <a>More Info</a> --}}
                            </div>
                        </li>
                        @endforeach
                        {{-- <li class="eventSel">
                            <div class="right-event">
                                <p>
                                    Willson Tech Park
                                </p>
<<<<<<< HEAD
                                <a>More Info</a>
                            </div>
                        </li> --}}
=======
                                <a></a>
                            </div>
                        </li>
                        
>>>>>>> 5bc69f3559a7e94bd9fa8c3caafa685ddd1a3f25
                    </ul>
                    
                </div>
            </div>
        </section>
    
    </section>
    <section class="ExSetting">
        <div class="AlertBox">
            
            <i class="bi bi-check-circle-fill"></i>
            <p></p>
            <button>Ok</button>
        </div>
        <div class="ooooh"></div>
        
        @if (session('type') == 'user')
        <div class="profile">
            <i id="closeShowProfile" class="bi bi-x-circle"></i>
          <form action="#" method="post" id="formEditProfile">
            <div class="leftProfile">
                <input type="file" hidden name=""  >
                <input type="text" name=""  value="{{session('info.username')}}">
                <input type="text" name=""  value="{{session('info.name')}}">
                <input type="text" name=""  value="{{session('info.email')}}">
                <input type="password" name=""  value="**********">
                <div class="selectProfile">
                    {{-- <select name="" value="male">
                        <!-- <option  selected>Six</option> -->
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select> --}}
                    <select name="" value="">
                        <!-- <option  selected>Six</option> -->
                        <option value="-o">-o</option>
                        <option value="+o">+o</option>
                        <option value="+B">+B</option>
                        <option value="-B">-B</option>
                        <option value="-A">-A</option>
                        <option value="+A">+A</option>
                        <option value="+AB">+AB</option>
                        <option value="-AB">-AB</option>
                    </select>
                </div>
                <input type="date" name="" value="{{session('info.birth')}}">
            </div>
            <div class="rightProfile">
                <input type="file" name="" id="editImgProfile" hidden>
                <label class="btnOff" for="editImgProfile" id="btneditImgProfile"><i class="bi bi-pencil"></i></label>
                <img src="{{$imgProfil}}" alt="">
                <textarea name=""  cols="30" rows="10">{{$bio}}</textarea>
            </div>
            <div class="btnProfile">
                <button id="saveProfile" class="btnOff">SAVE</button>
                <button id="editProfile">Edit</button>
            </div>
          </form>
        </div>
        @else
        <div class="profile">
            <i id="closeShowProfile" class="bi bi-x-circle"></i>
          <form action="#" method="post" id="formEditProfile">
            <div class="leftProfile">
                <input type="file" hidden name=""  >
                <input type="text" name=""  value="{{$username}}">
                <input type="text" name=""  value="Full Name">
                <input type="text" name=""  value="Email">
                <input type="password" name=""  value="**********">
                <div class="selectProfile">
                    <select name="" value="noSix">
                        <!-- <option  selected>Six</option> -->
                        <option value="Mile">Mile</option>
                        <option value="Mile">Femile</option>
                    </select>
                    <select name="" value="noSix">
                        <!-- <option  selected>Six</option> -->
                        <option value="-o">-o</option>
                        <option value="+o">+o</option>
                        <option value="+B">+B</option>
                        <option value="-B">-B</option>
                        <option value="-A">-A</option>
                        <option value="+A">+A</option>
                        <option value="+AB">+AB</option>
                        <option value="-AB">-AB</option>
                    </select>
                </div>
                <input type="date" name="" >
                <input type="file" name="" id="shFile" hidden>
                <label class="labelInput" for="shFile">Uplode Your Shahadaaa</label>
            </div>
            <div class="rightProfile">
                <input type="file" name="" id="editImgProfile" hidden>
                <label class="btnOff" for="editImgProfile" id="btneditImgProfile"><i class="bi bi-pencil"></i></label>
                <img src="{{$imgProfil}}" alt="">
                <textarea name=""  cols="30" rows="10">{{$bio}}</textarea>
            </div>
            <div class="btnProfile">
                <button id="saveProfile" class="btnOff">SAVE</button>
                <button id="editProfile">Edit</button>
            </div>
          </form>
        </div>
        @endif
        <div class="showMedia">
            <i id="closeShowMedia" class="bi bi-x-circle"></i>
            <div class="showMediaJs"></div>
        </div>
        <div class="showAudio">
            <i id="closeShowAudio" class="bi bi-x-circle"></i>
            <div class="showAudioJs"></div>
        </div>
        <div class="btnGoToUp">
            <i class="bi bi-arrow-up-circle"></i>
            <i class="bi bi-arrow-up-circle-fill"></i>
        </div>
    </section>
    <script src="{{URL::asset('post/script/script.js')}}"></script>
    <script src="{{URL::asset('post/script/app.js')}}"></script>
    <script src="{{URL::asset('post/script/media.js')}}"></script>

</body>
</html>