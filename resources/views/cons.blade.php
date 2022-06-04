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
        <comCount>{{$comc[$con->con_id]}}</comCount>
    </button>
    <button class="btt btnshear notshare">
        <span hidden>{{$_SERVER['HTTP_HOST'].'/'.$con->con_id}}</span>
        <i class="bi bi-share"></i>
    </button>
    
    <div class="posts ">
        <i class="settPost bi bi-three-dots-vertical"></i>
        <ul class="settPostList">
            <li class="PostDelet">
                <span hidden>{{$con->con_id}}</span>
                @csrf
                delete
            </li>
            <li class="PostRep">
                <span hidden>{{$con->con_id}}</span>
                report
            </li>
        </ul>
        <div class="post-row">
            <div class="user-profile">
                <img src="{{$consImgs[$con->con_id]}}" alt="logo">
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
            <div class="fFile" data-tooltip="Image"><i class="bi biImage" ></i></div>
            <div class="fFile" data-tooltip="Music"><i class="bi biMusic" ></i></div>
            <div class="fFile" data-tooltip="Pdf"><i class="bi biPdf" ></i></div>
            <div class="fFile" data-tooltip="Play"><i class="bi biPlay" ></i></div>
            
            
            
            
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
                        <span class="commUserName">{{$dateC}} ago</span>
                        <p>{{$item->com_content}}</p>
                        <span>{{$dateC}} ago</span>
                    </div>
                @else
                    @if($item->username == $con->username)
                        <div class="user">
                            <img src="./icons/logo.png" alt="">
                            <span class="commUserName">{{$dateC}} ago</span>
                            <p>{{$item->com_content}}</p>
                            <span>{{$dateC}} ago</span>
                        </div>
                    @else
                        <div class="users">
                            <img src="./icons/logo.png" alt="">
                            <span class="commUserName">{{$dateC}} ago</span>
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