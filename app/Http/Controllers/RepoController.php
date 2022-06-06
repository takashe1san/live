<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class RepoController extends Controller
{
    //
    public function addRepo ($id){
        if(session('type') == 'user'){
            $reporter = 'user';
        }elseif(session('type') == 'doctor'){
            $reporter = 'doctor';
        }else{
            return 'login to report '.$id;
        }
        Report::create([
            $reporter     => session('info.username'),
            'con'         => $id,
        ]);
        return 'reported '.$id;
    }

    public function getReports(){
        $repo = Report::orderByDesc('rep_id')->get();
        return $repo;
    }
}
