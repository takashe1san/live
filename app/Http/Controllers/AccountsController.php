<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator ;

class AccountsController extends Controller
{
    //creating new account
    public function signup(Request $info){

        $rules = [
            'username' => [
                'required',
                'max:40',
                'min:5',
                'unique:users,username'
            ],
            'email' => [
                'required',
                'email', 
                'max:60',
                'unique:users,email',
            ],
            'name' => [
                'required',
                'max:50'
            ],
            'password' => [
                'required',
                'max:70',
                'min:7',
            ],
            'birth' => [
                'required',
                'date',
            ]
        ];

        $msgs = [
            'username.required' => 'username is required',
            'username.max'      => 'username must be <40 character',
            'username.min'      => 'username must be >5 character',
            'username.unique'   => 'this username is used',
            'email.required'    => 'email is required',
            'email.email'       => 'wronge formula',
            'email.max'         => 'email must be <60 character',
            'email.unique'      => 'this email is exist',
            'name.required'     => 'name is required',
            'name.max'          => 'name must be <50 character',
            'password.required' => 'password is required',
            'password.max'      => 'password must be <70 character',
            'password.min'      => 'password must be >7 character',
            'birth.required'    => 'birth is required',
            'birth.date'        => 'wronge formula',
        ];
        
        
        $valid = Validator::make($info->all() , $rules, $msgs);
        
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput($info->all());
        }
        //checking account type
        if($info->type == 'user'){
            (new UsersController)->addUser($info);
        }elseif($info->type == 'doctor'){
            (new DoctorController)->addDoc($info);
        }
        
        $this->login($info);
        return redirect('/');
    }

    public function login(Request $info){
            $credentials = $info->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);
            if (Auth::guard($info->type)->attempt($credentials)) {
                $info->session()->regenerate();
                session([ 'type' => $info->type, ]);
                (new FileController)->imgCheck();
                return redirect('/');
            }
            return back()->withErrors([
                'log' => 'wronge username or password',
            ])->onlyInput('username');
    }

    public function logout(){
        session()->flush();
        return redirect('log');
    }

    // show personal information
    public function showInfo(){
        return view('user');
    }

    public function upInfo(Request $info){
        if(session('type') == 'user'){
            (new UsersController)->upInfo($info);
        }elseif(session('type') == 'doctor'){
            (new DoctorController)->upInfo($info);
        }else return 'failed';

        (new FileController)->personal($info);

        return 'updated';
    }

    public function deleteAcc(){
        if(session('type') == 'user'){
            (new UsersController)->deleteU(session('info.username'));
        }elseif(session('type') == 'doctor'){
            (new DoctorController)->deleteD(session('info.username'));
        }

        $ac = $this->logout();
        return $ac;
    }
}
