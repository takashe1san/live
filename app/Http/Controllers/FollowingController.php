<?php

namespace App\Http\Controllers;

use App\Models\Following;
use Illuminate\Http\Request;

class FollowingController extends Controller
{
    //
    public function followCheck($username){
        if(session('type') == 'user'){
            $res = Following::where('doctor', $username)->where('user', session('info.username'))->exists();
            return $res;
        }else{
            return false;
        }
    }

    public function followCount($username){
        $count = Following::where('doctor', $username)->count();
        return $count;
    }

    public function follow($username){
        if(session('type') == 'user'){
            if($this->followCheck($username)){
                Following::where('doctor', $username)->where('user', session('info.username'))->delete();
            }else{
                Following::create([
                    'user' => session('info.username'),
                    'doctor' => $username,
                ]);
            }
        }
        return $this->followCount($username);
    }
}
