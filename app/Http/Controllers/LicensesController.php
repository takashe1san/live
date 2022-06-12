<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;

class LicensesController extends Controller
{
    //
    public function addLic(Request $info){
        if(session('type') == 'doctor'){
            License::create([
                'lic_num' => $info->num,
                'lic_typ' => $info->typ,
                'lic_ini_date' => $info->ini,
                'lic_exp_date' => $info->exp,
                'lic_issuing_place' => $info->place,
                'doctor' => session('info.username'),
            ]);
            return redirect('/');
        }else{
            return 'something went wronge!!';
        }
    }

    public function LicExists(){
        if(session('type') == 'doctor'){
            if(License::where('doctor', session('info.username'))->exists()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function validLic($id){
        if(session('type') == 'admin' && License::where('lic_id', $id)->exists()){
            License::where('lic_id', $id)->first()->update([
                'valid_date' => date('Y-m-d H:i:s')
            ]);
            return 'License valided';
        }else{
            return 'something went wronge!!!';
        }
    }
}
