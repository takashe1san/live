<?php

namespace App\Http\Controllers;


use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //add new user
    public function addUser(Request $info){
        //putting user information to database
        User::create([
            'username' => $info->susername,
            'name'     => $info->name,
            'email'    => $info->email,
            'password' => md5($info->spassword),
            'birth'    => $info->birth,
            // 'blood_typ'=> $info->bloodtyp,
        ]);
    }

    //getting user information from database
    public function userInfo(Request $info){
        return User::where('username',$info->username)->first();
    }

    public function upInfo(Request $info){
        User::where('username', session('info.username'))
        ->first()
        ->update([
            'name'      => $info->name,
            'bio'       => $info->bio,
            'email'     => $info->email,
            'blood_typ' => $info->blood,
        ]);

        $sess = session('info');
        $sess->name      = $info->name;
        $sess->bio       = $info->bio;
        $sess->email     = $info->email;
        $sess->blood_typ = $info->blood;
        
        session(['info' => $sess]);
    }
    
    public function deleteU($username){
        User::where('username', $username)->delete();
    }

    public function showAll(){
        $acc = User::get();
        return view('userlist', ['info' => $acc]);
    }
    

}
