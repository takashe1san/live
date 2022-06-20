<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    //add new user
    public function addDoc(Request $info){
        //putting doctor information to database
        Doctor::create([
            'username' => $info->susername,
            'name'     => $info->name,
            'email'    => $info->email,
            'password' => Hash::make($info->spassword),
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
            'password'  => md5($info->pass),
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

    public function Dsearch($username=null){
        $a='';
        if($username != null){
            $docs = Doctor::select('username')->where('username', 'LIKE','%'.$username.'%')->get();
            foreach($docs as $doc){
                $a .= '<ul>'.$doc->username.'</ul> ';
            }
        }
        return $a;
    }

    public function doctorCount(){
        $count = Doctor::count();
        return $count;
    }
}
