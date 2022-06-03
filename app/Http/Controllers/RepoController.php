<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class RepoController extends Controller
{
    //
    public function addRepo ($typ, $id){
        switch($typ){
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
            $reporter = 'user';
        }elseif(session('type') == 'doctor'){
            $reporter = 'doctor';
        }
        Report::create([
            $reporter     => session('info.username'),
            $type         => $id,
        ]);
        return 'reported '.$typ.$id;
    }
}
