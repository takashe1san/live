@forelse ($cons as $con)

@php
    //Create a date object out of a string (e.g. from a database):
    $date1 = date_create_from_format('Y-m-d H:i:s', $con->con_date);

    //Create a date object out of today's date:
    $date2 = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));

    //Create a comparison of the two dates and store it in an array:
    $diff = (array) date_diff($date1, $date2);

    //Output the array:
    // echo '<pre>'.print_r($diff,1).'</pre>';

    if($diff["y"]>0){
    $date= $diff["y"] . " year";
    }else if($diff["m"]>0){
        $date= $diff["m"] . " mon";
    }else if($diff["d"]>0){
        $date= $diff["d"] . " day";
    }else if($diff["h"]>0){
        $date= $diff["h"] . " hour";
    }else if($diff["i"]>0){
        $date= $diff["i"] . " min";
    }else if($diff["s"]>0){
        $date='NOW';
    } 

    //*****************
    $img = "/images/users/".$con->username."/personal.jpg";

    //*****************
    if($liked[$con->con_id]){
        $lik_icon = 'bi-hand-thumbs-up-fill';
    }else{
        $lik_icon = 'bi-hand-thumbs-up';
    }
@endphp

<div class="postes">
    <button class="btt btnlike notlike">
        <span hidden>{{$con->con_id}}</span>
        <i class="bi {{$lik_icon}}"></i>
        <likeCount>{{$likes[$con->con_id]}}</likeCount>
        
    </button>
    <button class="btt btncomm hiddcomm">
        <i class="bi bi-chat-left-text"></i>
        20
    </button>
    <button class="btt btnshear notshare">
        <span hidden>{{$_SERVER['HTTP_HOST'].'/'.$con->con_id}}</span>
        <i class="bi bi-share"></i>
        2
    </button>
    
    <div class="posts ">
        <i class="settPost bi bi-three-dots-vertical"></i>
        <ul class="settPostList">
            <li class="PostDelet">
                <span hidden>{{$con->con_id}}</span>
                @csrf
                delet
            </li>
            <li class="PostRep">
                <span hidden>{{$con->con_id}}</span>
                Ablagh
            </li>
        </ul>
        <div class="post-row">
            <div class="user-profile">
                <img src="{{URL::asset('post/icons/logo.png')}}" alt="logo">
                <div class="details">
                <p>{{$con->username}}</p>
                <div class="postTime">
                    <i class="ii bi bi-alarm"></i>
                    <span>{{$date}}</span>
                </div>
                </div>
            </div>
            <a href="#">
                <i class="fa fa-ellipsis-v"></i>
            </a>
        </div>
        
        <p class="post-text">{{$con->con_content}}</p>
        <div class="media">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-play" viewBox="0 0 16 16">
                <path d="M6 6.883v4.234a.5.5 0 0 0 .757.429l3.528-2.117a.5.5 0 0 0 0-.858L6.757 6.454a.5.5 0 0 0-.757.43z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
              </svg>
        </div>
        
    </div>
    <div class="comm">
        <div class="comment">
            @forelse ($com[$con->con_id] as $item)
                @php
                     //Create a date object out of a string (e.g. from a database):
                    $date1 = date_create_from_format('Y-m-d H:i:s', $item->com_date);
                    //Create a date object out of today's date:
                    $date2 = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));
                    //Create a comparison of the two dates and store it in an array:
                    $diff = (array) date_diff($date1, $date2);
                   
                    if($diff["y"]>0){
                        $dateC= $diff["y"] . "y";
                    }else if($diff["m"]>0){
                        $dateC= $diff["m"] . "mon";
                    }else if($diff["d"]>0){
                        $dateC= $diff["d"] . "d";
                    }else if($diff["h"]>0){
                        $dateC= $diff["h"] . "h";
                    }else if($diff["i"]>0){
                        $dateC= $diff["i"] . "min";
                    }else if($diff["s"]>0){
                        $dateC='NOW';
                    }
                @endphp

                @if($item->doctor != null)
                    <div class="doc">
                        <img src="./icons/logo.png" alt="">
                        <p>{{$item->com_content}}</p>
                        <span>{{$dateC}} ago</span>
                    </div>
                @else
                    @if($item->username == $con->username)
                        <div class="user">
                            <img src="./icons/logo.png" alt="">
                            <p>{{$item->com_content}}</p>
                            <span>{{$dateC}} ago</span>
                        </div>
                    @else
                        <div class="users">
                            <img src="./icons/logo.png" alt="">
                            <p>{{$item->com_content}}</p>
                            <span>{{$dateC}} ago</span>
                        </div>
                    @endif
                @endif
            @empty
               <span class="commEmpty">there is no comment</span> 
            @endforelse
        </div>
        <div class="writ-comment">
            <form action="/insertCom" method="post" class="Fwrit-comment">
                @csrf
                <input type="hidden" name="con_id" value={{$con->con_id}}>
                <input type="text" name="content" class="comm_content" placeholder="Write Your Comment">
                <button type="submit" class="btnFwrit-comment">
                    <i class="bi bi-send"></i>
                </button>
            </form>
        </div>
    </div>
</div>
@empty
    
@endforelse