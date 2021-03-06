<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;

class ConsController extends Controller
{
    //
    public function insCons(Request $info){
        if(session('type') == 'user'){
            Consultation::create([
                'con_section' => $info->section,
                'con_content' => $info->content,
                'username' => session('info.username'),
            ]);
            (new FileController)->multiFile($info, 'cons');
            return 'consultation added';
        }else{
            return "you can't add consultation!!";
        }
    }

    public function showAllCons(){
        $cons = Consultation::orderByDesc('con_id')->get();
        $atta[-1]="";$coms[-1]=''; $comc[-1]='';$like[-1]='';$love[-1]='';$imgs[-1]='';$comi[-1]='';
        foreach($cons as $con){
            $coms[$con->con_id] = (new CommController) ->showComm($con->con_id);
            $comc[$con->con_id] = (new CommController) ->comCount($con->con_id);
            $like[$con->con_id] = (new LikesController)->likeCount($con->con_id);
            $love[$con->con_id] = (new LikesController)->likeCheck($con->con_id);
            $imgs[$con->con_id] = (new FileController) ->showImg('user',$con->username);
            $atta[$con->con_id] = (new FileController) ->getAttach($con->con_id);
            foreach($coms[$con->con_id] as $com){
                if($com->username != null){
                    $comi[$com->com_id] = (new FileController) ->showImg('user',$com->username);
                }elseif($com->doctor != null){
                    $comi[$com->com_id] = (new FileController) ->showImg('doctor',$com->doctor);
                }
            }
        }
        $lic = (new LicensesController)->LicExists();
        $info = (new InfoController)->showInfo();
        return view('index',['cons'     => $cons,
                             'attach'   => $atta,
                             'com'      => $coms,
                             'comc'     => $comc, 
                             'likes'    => $like, 
                             'liked'    => $love, 
                             'consImgs' => $imgs, 
                             'info'     => $info,
                             'comImgs'  => $comi,
                             'lic'      => $lic]);
    }

    public function showCons($id){        
        $cons = Consultation::where('con_id', $id)->orderByDesc('con_id')->get();
        $atta[-1]="";$coms[-1]=''; $comc[-1]='';$like[-1]='';$love[-1]='';$imgs[-1]='';$comi[-1]='';
        foreach($cons as $con){
            $coms[$con->con_id] = (new CommController) ->showComm($con->con_id);
            $comc[$con->con_id] = (new CommController) ->comCount($con->con_id);
            $like[$con->con_id] = (new LikesController)->likeCount($con->con_id);
            $love[$con->con_id] = (new LikesController)->likeCheck($con->con_id);
            $imgs[$con->con_id] = (new FileController) ->showImg('user',$con->username);
            $atta[$con->con_id] = (new FileController) ->getAttach($con->con_id);
            foreach($coms[$con->con_id] as $com){
                if($com->username != null){
                    $comi[$com->com_id] = (new FileController) ->showImg('user',$com->username);
                }elseif($com->doctor != null){
                    $comi[$com->com_id] = (new FileController) ->showImg('doctor',$com->doctor);
                }
            }
        }
        $lic = (new LicensesController)->LicExists();
        $info = (new InfoController)->showInfo();
        return view('index',['cons' => $cons,
                            'attach' => $atta,
                            'com' => $coms,
                            'comc' => $comc, 
                            'likes' => $like, 
                            'liked' => $love, 
                            'consImgs' => $imgs, 
                            'info' => $info,
                            'comImgs' => $comi,
                            'lic'      => $lic]);
}

    public function showMyCons(){
        $cons = Consultation::where('username', session('info.username'))->orderByDesc('con_id')->get();
        $atta[-1]="";$coms[-1]=''; $comc[-1]='';$like[-1]='';$love[-1]='';$imgs[-1]='';$comi[-1]='';
        foreach($cons as $con){
            $coms[$con->con_id] = (new CommController) ->showComm($con->con_id);
            $comc[$con->con_id] = (new CommController) ->comCount($con->con_id);
            $like[$con->con_id] = (new LikesController)->likeCount($con->con_id);
            $love[$con->con_id] = (new LikesController)->likeCheck($con->con_id);
            $imgs[$con->con_id] = (new FileController) ->showImg('user',$con->username);
            $atta[$con->con_id] = (new FileController) ->getAttach($con->con_id);
            foreach($coms[$con->con_id] as $com){
                if($com->username != null){
                    $comi[$com->com_id] = (new FileController) ->showImg('user',$com->username);
                }elseif($com->doctor != null){
                    $comi[$com->com_id] = (new FileController) ->showImg('doctor',$com->doctor);
                }
            }
        }
        $lic = (new LicensesController)->LicExists();
        $info = (new InfoController)->showInfo();
        return view('index',['cons' => $cons,
                             'attach' => $atta,
                             'com' => $coms,
                             'comc' => $comc, 
                             'likes' => $like, 
                             'liked' => $love, 
                             'consImgs' => $imgs, 
                             'info' => $info,
                             'comImgs' => $comi,
                             'lic'      => $lic]);
    }

    public function showLikedCons(){
        $liked = (new LikesController)->likedCons();
        $cons = Consultation::whereIn('con_id', $liked)->orderByDesc('con_id')->get();
        $atta[-1]="";$coms[-1]=''; $comc[-1]='';$like[-1]='';$love[-1]='';$imgs[-1]='';$comi[-1]='';
        foreach($cons as $con){
            $coms[$con->con_id] = (new CommController) ->showComm($con->con_id);
            $comc[$con->con_id] = (new CommController) ->comCount($con->con_id);
            $like[$con->con_id] = (new LikesController)->likeCount($con->con_id);
            $love[$con->con_id] = (new LikesController)->likeCheck($con->con_id);
            $imgs[$con->con_id] = (new FileController) ->showImg('user',$con->username);
            $atta[$con->con_id] = (new FileController) ->getAttach($con->con_id);
            foreach($coms[$con->con_id] as $com){
                if($com->username != null){
                    $comi[$com->com_id] = (new FileController) ->showImg('user',$com->username);
                }elseif($com->doctor != null){
                    $comi[$com->com_id] = (new FileController) ->showImg('doctor',$com->doctor);
                }
            }
        }
        $lic = (new LicensesController)->LicExists();
        $info = (new InfoController)->showInfo();
        return view('index',['cons' => $cons,
                             'attach' => $atta,
                             'com' => $coms,
                             'comc' => $comc, 
                             'likes' => $like, 
                             'liked' => $love, 
                             'consImgs' => $imgs, 
                             'info' => $info,
                             'comImgs' => $comi,
                             'lic'      => $lic]);
    }

    public function getCons($id){
        return Consultation::where('con_id',$id)->first();
    }

    public function getID(){
        $id = Consultation::where('username', session('info.username'))->latest('con_id')->first()->con_id;
        return $id;
    }

    public function deleteCons($id){
        $con = Consultation::where('con_id',$id)->first();
        if($con->username == session('info.username') && session('type') == 'user'){
            $con->delete();
            return 'deleted cons'.$id;
        }else{
            return 'this is not your consultation!!';
        }
    }

    public function delFrAd($id){
        Consultation::where('con_id',$id)->first()->delete();
    }

    public function getPublisher($id){
        $publisher = Consultation::where('con_id', $id)->first()->username;
        return $publisher;
    }

    public function consCount(){
        $count = Consultation::count();
        return $count;
    }

    public function Csearch($content=null){
        $a='';
        if($content != null){
            $cons = Consultation::where('con_content', 'LIKE','%'.$content.'%')->get();
            foreach($cons as $con){
                $a .= '<li>'.$con->con_content.'     <a href="/con/'.$con->con_id.'">more...</a></li> ';
            }
        }
        return $a;
    }
}
