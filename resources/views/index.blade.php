<!-- Coding by CodingLab | www.codinglabweb.com -->
<!DOCTYPE html>
<html lang="en">
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
    
    <title>Dashboard Menu</title> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{URL::asset('post/icons/logo.png')}}" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Codinglab</span>
                    <span class="profession">Web developer</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

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
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Revenue</span>
                        </a>
                    </li>
                    <div class="postssett">
                        <ul>
                            <li class="po_sl">All Post</li>
                            <li class="po_sl">My Post</li>
                            <li class="po_sl">Doc Post</li>
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
                                <img src="./icons/logo.png" class="imgNotsmal">
                                <p class="pNotsmal">ssssssssssssss</p>
                                <span class="sendersmal" hidden>user: AboIbrahem</span>
                                <span class="subsmal" hidden>sub: Hello</span>
                                <span class="timeNotsmal">3h ago</span>
                            </li>
                            <li class="NotificationsSle">
                                <img src="./icons/logo.png" class="imgNotsmal">
                                <p class="pNotsmal">ggggggg</p>
                                <span class="sendersmal" hidden>user: Ahmad</span>
                                <span class="subsmal" hidden>sub: Hello</span>
                                <span class="timeNotsmal">2h ago</span>
                            </li>
                        </ul>
                        <div class="showNotifications">
                            <div>
                                <img src="./icons/logo.png"class="imgNotlarg" >
                                <span class="timeNotlarg"></span>
                            </div>
                            <span class="sender"></span>
                            <span class="sub"></span>
                            <p class="pNotlarg"></p>
                        </div>
                    </div>


                    <li class="btnLikes nav-link sle">
                        <a href="#">
                            <i class=' bi bi-heart icon' ></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                        
                    </li>
                    <div class="Likes">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <li class="btnsetting nav-link sle">
                        <a href="#">
                            <i class='bi bi-gear icon' ></i>
                            <span class="text nav-text">Setting</span>
                        </a>
                        
                    </li>
                    <div class="Setting">
                        <ul>
                            <li class="sett_sl" >ChangInfo</li>
                            <li class="sett_sl" >ChangPassword</li>
                            <li class="sett_sl" >ChangViow</li>
                            <li class="sett_sl" >ChangLang</li>
                        </ul>
                    </div>
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
    <section class="cont">

        <section class="left">
            {{-- cons section --}}
            <div class="container_post container_postSl">
                <div class="wrapper">
                <section class="post">
        
                    <form  action="#" method="post" id="formPost">
                        @csrf
                    <div class=" user-profile">
                        <img src="icons/logo.png" alt="logo">
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
                    <input type="file" name="fileImg" id="inputfile" hidden>
                    </div>
                    <button id="sendPost" name="s">Post</button>
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
            @include('cons')
        </section>
        <section class="right">
            <div class="right-sidebar">
                <div class="sidebar-title">
                    <h4>Events</h4>
                    <a href="#">See All</a>
                </div>
                <div class="event">
                    <div class="left-event">
                        <h3>18</h3>
                        <span>March</span>
                    </div>
                    <div class="right-event">
                        <h4>Social Media</h4>
                        <p>
                            <i class="fa fa-map-marker"></i>
                            Willson Tech Park
                        </p>
                        <a href="#">More Info</a>
                    </div>
                </div>
                <div class="event">
                    <div class="left-event">
                        <h3>22</h3>
                        <span>June</span>
                    </div>
                    <div class="right-event">
                        <h4>Mobile Marketing</h4>
                        <p>
                            <i class="fa fa-map-marker"></i>
                            Willson Tech Park
                        </p>
                        <a href="#">More Info</a>
                    </div>
                </div>

                <div class="sidebar-title">
                    <h4>Advertisement</h4>
                    <a href="#">Close</a>
                </div>
                <img src="images/advertisement.png" class="sidebar-ads">

                <div class="sidebar-title">
                    <h4>Conversation</h4>
                    <a href="#">Hide Chat</a>
                </div>
                <div class="online-list">
                    <div class="online">
                        <img src="images/member-1.png">
                    </div>
                    <p>Alison Mina</p>
                </div>
                <div class="online-list">
                    <div class="online">
                        <img src="images/member-2.png">
                    </div>
                    <p>Jackson Aston</p>
                </div>
                <div class="online-list">
                    <div class="online">
                        <img src="images/member-3.png">
                    </div>
                    <p>Samona Rose</p>
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
        <div class="elelment">
            <div class="element-main">
                <form action="#"  method="post" id="ChangPass" class="">
                <i class="closeChPass bi bi-x-circle"></i>
                <div class="l">
                    <h1>Forgot Password</h1>
                    <p> Plz.. Enter Your Email</p>
                        <input type="text" name="ss" placeholder="Your e-mail address">
                </div>
                <div class="lh">
                    <input type="text"  placeholder="Your Coden">
                    <input type="text"  placeholder="Your new Password">
                    <input type="text"  placeholder="Your new Password">
                </div>
                    <button>Reset my Password</button>
                </form>
            </div>
    </section>
    <script src="{{URL::asset('post/script/script.js')}}"></script>
    <script src="{{URL::asset('post/script/app.js')}}"></script>

</body>
</html>