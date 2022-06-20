<?php

namespace App\Http\Controllers;


use App\Models\Doctor;
use App\Models\User;
use App\Notifications\NewUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //add new user
    public function addUser(Request $info){
        //putting user information to database
        User::create([
            'username' => $info->username,
            'name'     => $info->name,
            'email'    => $info->email,
            'password' => Hash::make($info->password),
            'birth'    => $info->birth,
            // 'blood_typ'=> $info->bloodtyp,
        ]);
        $this->notify($info->username);
    }

    public function notify($username){
        $user = User::where('username', $username)->first();
        $user->notify(new NewUser);
    }
    public function notification(){
        $user = Auth::guard(session('type'))->user();
        $data =$user->unreadNotifications[0]->data;
        return $data;
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
            'password'  => md5($info->pass),
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
    
    public function usersCount(){
        $count = User::count();
        return $count;
    }
}
