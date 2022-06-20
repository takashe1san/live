@forelse ($cons as $con)

@php
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
        <input type="text" hidden value="{{$_SERVER['HTTP_HOST'].'/'.$con->con_id}}">
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
                    <span>{{dateTrans($con->con_date)}} - {{$con->con_section}}</span>
                </div>
                </div>
            </div>
            <a href="#">
                <i class="fa fa-ellipsis-v"></i>
            </a>
        </div>
        
        <p class="post-text">{{$con->con_content}}</p>
        <div class="media">
            @foreach ($attach[$con->con_id] as $atta)
                @if ($atta->ext == 'jpg' || $atta->ext == 'png' || $atta->ext == 'jpeg')
                <div class="fFile" data-tooltip="Image">
                    <i class="mediaType" hidden>img</i>
                    <i class="src" hidden>{{$atta->mediaDir}}</i>
                    <i class="bi biImage" ></i>
                </div>
                @elseif($atta->ext == 'mp4' || $atta->ext == 'mov')
                <div class="fFile" data-tooltip="Video">
                    <i class="mediaType" hidden>video</i>
                    <i class="src" hidden>{{$atta->mediaDir}}</i>
                    <i class="bi biPlay" ></i>
                </div>
                @elseif($atta->ext == 'pdf')
                <div class="fFile" data-tooltip="Pdf">
                    <i class="mediaType" hidden>pdf</i>
                    <i class="src" hidden>{{$atta->mediaDir}}</i>
                    <i class="bi biPdf" ></i>
                </div>
                @elseif($atta->ext == 'mp3' || $atta->ext == 'wav')
                <div class="fFile" data-tooltip="Sound">
                    <i class="mediaType" hidden>audio</i>
                    <i class="src" hidden>{{$atta->mediaDir}}</i>
                    <i class="bi biMusic" ></i>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="comm">
        <div class="comment">
            @forelse ($com[$con->con_id] as $item)
                @if($item->doctor != null)
                    <div class="doc">
                        <img src="{{$comImgs[$item->com_id]}}" alt="">
                        <span class="commUserName">{{$item->doctor}} </span>
                        <p>{{$item->com_content}}</p>
                        <span>{{dateTrans($item->com_date)}} ago</span>
                    </div>
                @else
                    @if($item->username == $con->username)
                        <div class="user">
                            <img src="{{$comImgs[$item->com_id]}}" alt="">
                            <span class="commUserName">{{$item->username}} </span>
                            <p>{{$item->com_content}}</p>
                            <span>{{dateTrans($item->com_date)}} ago</span>
                        </div>
                    @else
                        <div class="users">
                            <img src="{{$comImgs[$item->com_id]}}" alt="">
                            <span class="commUserName">{{$item->username}} </span>
                            <p>{{$item->com_content}}</p>
                            <span>{{dateTrans($item->com_date)}} ago</span>
                        </div>
                    @endif
                @endif
            @empty
               <span class="commEmpty">there is no comment</span> 
            @endforelse
        </div>
        <div class="writ-comment">
            <form action="#" method="post" class="Fwrit-comment">
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