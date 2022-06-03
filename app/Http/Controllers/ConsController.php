<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;

class ConsController extends Controller
{
    //
    public function insCons(Request $info){
        // return $info->section;
        Consultation::create([
            'con_section' => $info->section,
            'con_content' => $info->content,
            'username' => session('info.username'),
        ]);
        (new FileController)->multiFile($info, 'cons');
        // return redirect('showallcon');
    }

    public function showCons(){
        $a = Consultation::where('username',session('info.username'))->get();
        return view('consultation',['value' => $a]);
    }

    public function showAllCons(){
        $cons = Consultation::orderByDesc('con_id')->get();
        foreach($cons as $con){
            $coms[$con->con_id] = (new CommController)->showComm($con->con_id);
            $comc[$con->con_id] = (new CommController)->comCount($con->con_id);
            $like[$con->con_id] = (new LikesController)->likeCount($con->con_id);
            $love[$con->con_id] = (new LikesController)->likeCheck($con->con_id);
        }
        return view('index',['cons' => $cons, 'com' => $coms, 'comc' => $comc, 'likes' => $like, 'liked' => $love]);
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
            return 'deleted';
        }else{
            return 'this is not your consultation!!';
        }
    }
}
