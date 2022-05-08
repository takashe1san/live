<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnsController extends Controller
{
    //
    public function insAns(Request $info){
        // return $info;
        Answer::create([
            'ans_content' => $info->content,
            'consultation'=> $info->con_id,
            'doctor' => session('info.username'),
        ]);
        // return redirect('showcon');
    }

    public function showAns(){
        $a = Answer::where('doctor',session('info.username'))->get();
        return view('answer',['value' => $a]);
    }

    public function showAllAns(){
        $a = Answer::get();
        return view('answer',['value' => $a]);
        // return $a;
    }

    public function deleteAns($id){
        Answer::where('ans_id', $id)->delete();
        return redirect()->back();
    }
}
