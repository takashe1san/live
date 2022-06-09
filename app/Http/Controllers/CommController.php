<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommController extends Controller
{
    //
    public function insComm(Request $info){
        if (session('type') == 'user'){
            $usertype = 'username';
        }else if (session('type') == 'doctor'){
            $usertype = 'doctor';
        }
        if(isset($info->con_id)){
            $commentTo = 'consultation';
        }

        
        Comment::create([
            'com_content' => $info->content,
            $usertype => session('info.username'),
            $commentTo => $info->con_id,
        ]);
        // return redirect('showallcon');
    }

    public function showComm($con_id){
        $com = Comment::where('consultation', $con_id)->get();
        return $com;
    }

    public function comCount($id){
        $count = Comment::where('consultation', $id)->count();
        return $count;
    }

    public function deleteCom($id){
        Comment::where('com_id', $id)->delete();
        return redirect()->back();
    }

    public function getID(){
        $id = Comment::where('username', session('info.username'))->latest('con_id')->first()->con_id;
        return $id;
    }
}
