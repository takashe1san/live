<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class RepoController extends Controller
{
    //
    public function addRepo (Request $info){
        switch($info->type){
            case 'con':
                $type = 'reported_con';
                break;
            case 'com':
                $type = 'reported_comm';
                break;
            case 'ans':
                $type = 'reported_ans';
                break;
        }
        if(session('type') == 'user'){
            $reporter = 'username';
        }elseif(session('type') == 'doctor'){
            $reporter = 'doctor';
        }
        Report::create([
            'rep_raison'  => $info->raison,
            // 'rep_details' => $info->detail,
            $reporter     => session('info.username'),
            $type         => $info->id,
        ]);
        return redirect()->back();
    }
}
