<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DoctorController;
use App\Models\Media;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Validator ;

class AccountsController extends Controller
{
    //creating new account
    public function signup(Request $info){

    // $rules = [
    //     'username' => [
    //             'required',
    //             'max:40',
    //             'min:5',
    //         ],
    //         'email' => [
    //             'required',
    //             'email',
                
    //             'max:60'
    //         ],
    //         'name' => [
    //             'required',
    //             'max:50'
    //         ],
    //         'password' => [
    //             'required',
    //             // 'regex:/^.*(?=.{7,})(?=.{,70})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
    //             'max:70',
    //             'min:7',
    //         ],
    //         'birth' => [
    //             'required',
    //             'date',
    //         ]
    //     ];
        
        
    //     $valid = Validator::make($info->all() , $rules);
        
        // if($valid->fails()){
        //     return redirect()->back()->withErrors($valid)->withInput($info->all());
        // }
        //checking account type
        if($info->type == 'user'){
            (new UsersController)->addUser($info);
        }elseif($info->type == 'doctor'){
            (new DoctorController)->addDoc($info);
        }
        
        $this->login($info);
        return redirect('show');
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
            'username.required' => 'the username is required',
            'username.max'      => 'username must be less than 40 character',
            'username.min'      => 'username must be more than 5 character',
            'password.required' => 'the password is required',
            'password.regex'      => 'wrong formula',
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

            return redirect('show');
            // return $userInfo;
        }else{
            return 'false';
        }
    }

    //logout from your account
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
