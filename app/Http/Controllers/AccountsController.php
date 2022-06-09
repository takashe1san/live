<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DoctorController;
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
        if($info->type == 'user'){
            $userInfo = (new UsersController)->userInfo($info);
        }elseif($info->type == 'doctor'){
            $userInfo = (new DoctorController)->docInfo($info);
        }

        
        $rules = [
            'username' => [
                'required',
            ],
            'password' => [
                'required',
            ]
        ];
        
        $msgs = [
            'username.required' => 'required field',
            'password.required' => 'required field',
        ];

        $valid = Validator::make($info->all() , $rules , $msgs);
        
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput($info->all());
        }

        $password = md5($info->password);
        
        if($userInfo->password == $password){
            session([
                'type' => $info->type,
                'info' => $userInfo,
            ]);

            (new FileController)->imgCheck();

            return redirect('/');
        }else{
            $valid->errors()->add('password', 'wronge password');
            return redirect()->back()->withErrors($valid)->withInput($info->all());
            // return $valid->errors();
        }
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
