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

    public function login(){
        if(session('type') == 'admin'){
            return redirect('dashboard');
        }else{
            return view('adminLog');
        }
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

            return redirect('dashboard');
        }
    }

    public function dash(){
        if(session('type') == 'admin'){
            $count['doctors'] = (new DoctorController)   -> doctorCount();
            $count['users']   = (new UsersController)    -> usersCount();
            $count['cons']    = (new ConsController)     -> consCount();
            $reports          = (new RepoController)     -> getReports();
            $license          = (new LicensesController) -> notValid();
            return view('admin', ['counter' => $count,
                                  'reports' => $reports,
                                  'lic'     => $license, ]);
        }else{
            return redirect('adminlog');
        }
    }

    public function delCons($id){
        (new ConsController)->delFrAd($id);
        return redirect()->back();
    }

    public function delPub($id){
        $username = (new ConsController)->getPublisher($id);
        (new UsersController)->deleteU($username);
        return redirect()->back();
    }
}
