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
        $a = Consultation::orderByDesc('con_id')->get();
        return view('index',['cons' => $a]);
    }

    public function getCons($id){
        return Consultation::where('con_id',$id)->first();
    }

    public function getID(){
        $id = Consultation::where('username', session('info.username'))->latest('con_id')->first()->con_id;
        return $id;
    }

    public function deleteCons($id){
        Consultation::where('con_id',$id)->delete();
        return redirect()->back();
    }
}
