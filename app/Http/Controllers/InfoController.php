<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    //
    public function insInfo(Request $info){
        if(session('type') == 'doctor'){
            Information::create([
                'section' => $info->section,
                'info_content' => $info->content,
                'doctor' => session('info.username'),
            ]);
            return 'information added';
        }else{
            return "you can't add information!!";
        }
    }
}
