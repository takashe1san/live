<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function like($id){
        if($this->likeCheck($id)){
            $this->unlike($id);
        }else{
            $this->addLike($id);
        }
        return $this->likeCount($id);
    }

    public function addLike($id){
        if(session('type') == 'user'){
            $typ = 'user';
        }elseif(session('type') == 'doctor'){
            $typ = 'doc';
        }
        Like::firstOrCreate([
            'cons' => $id,
            $typ   => session('info.username'),
        ]);
        return 'liked '.$id;
    }

    public function unlike($id){
        Like::where('cons', $id)->delete();
        return 'unliked '.$id;
    }

    public function likeCheck($id){
        if(session('type') == 'user'){
            $typ = 'user';
            $res = Like::where('cons', $id)->where($typ, session('info.username'))->exists();
            return $res;
        }elseif(session('type') == 'doctor'){
            $typ = 'doc';
            $res = Like::where('cons', $id)->where($typ, session('info.username'))->exists();
            return $res;
        }else{
            return false;
        }

    }

    public function likeCount($id){
        $likes = Like::where('cons', $id)->count();
        return $likes;
    }
}
