<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addAdd(Request $info){
        Admin::create([
            'username' => $info->username,
            'email'    => $info->email,
            'name'     => $info->name,
            'password' => md5($info->password),
        ]);
        return 'succuss';
    }

    public function adminLog(Request $info){
        $userInfo = Admin::where('username', $info->username)->first();

        $password = md5($info->password);
        
        if($userInfo->password == $password){
            session([
                'type' => 'admin',
                'info' => $userInfo,
            ]);

            (new FileController)->imgCheck();

            return redirect('show');
        }
    }

    public function dash(){
        $count['doctors'] = (new DoctorController)->doctorCount();
        $count['users']   = (new UsersController) ->usersCount();
        $count['cons']    = (new ConsController)  ->consCount();
        return view('admin', ['counter' => $count]);
    }
}
