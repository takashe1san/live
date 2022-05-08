<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    //add new user
    public function addDoc(Request $info){
        //putting doctor information to database
        Doctor::create([
            'username' => $info->username,
            'name'     => $info->name,
            'email'    => $info->email,
            'password' => md5($info->password),
            'birth'    => $info->birth,
            'blood_typ'=> $info->bloodtyp,
        ]);
    }

    //getting user information from database
    public function docInfo(Request $info){
        return Doctor::where('username',$info->username)->get()->first();
    }

    public function upInfo(Request $info){
        Doctor::where('username', session('info.username'))
        ->first()
        ->update([
            'name'      => $info->name,
            'bio'       => $info->bio,
            'email'     => $info->email,
            'section' => $info->section,
        ]);
        
        $sess = session('info');
        $sess->name      = $info->name;
        $sess->bio       = $info->bio;
        $sess->email     = $info->email;
        $sess->section = $info->section;
        
        session(['info' => $sess]);
    }

    public function deleteD($username){
        Doctor::where('username', $username)->delete();
    }

    public function showAll(){
        $acc = Doctor::get();
        return view('userlist', ['info' => $acc]);
    }
}
