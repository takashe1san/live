<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    //first section -> personal img <- ****************************

    public function personal(Request $info){
        if($info->hasFile('img')) {
            $file = $info->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = 'personal.' . $ext;
            
            $this->imgDelete();

            // $imgDir =;

            $file->storeAs('images/' . session('type') . 's/' . session('info.username') , $filename);

            Media::create([
                'name'          => $filename,
                'ext'           => $ext,
                'mediaDir'      => 'images/' . session('type') . 's/' . session('info.username'),
                session('type') => session('info.username'),
            ]);

            $this->imgCheck();

            // return redirect('/');
        }
    }
    
    public function imgCheck(){
        $img = $this->showImg(session('type'), Auth::guard(session('type'))->user()->username);
        session(['img' => $img]);
    }

    public function imgDelete(){
        if(Media::where( session('type')  , session('info.username'))->exists()){
            $eImg = Media::where([session('type') => session('info.username')])->first();
            unlink("images/". session('type') . "s/" . session('info.username') ."/".$eImg->name);
            $eImg->delete();
        }

        $this->imgCheck();

        return redirect('/');
    }

    //second section -> Atachments <- *************************

    public function multiFile(Request $info, $sec) {
        switch ($sec) {
            case 'cons':
                # code...
                $id = (new ConsController)->getID();
                break;
            
            case 'comment':
                $id = (new CommController)->getID();
                break;
                
            default:
                # code...
                break;
        }


        if($info->hasFile('attach')) {
            $path = 'images/' . session('type') .'s/'. session('info.username') .'/'. $sec .'/'. $id .'/';
            foreach($info->file('attach') as $file){
                $name = $file->getClientOriginalName();
                $ext  = $file->getClientOriginalExtension();

                $file->storeAs($path, $name);

                Media::create([
                    'name' => $name,
                    'ext'  => $ext,
                    'mediaDir' => 'images/' . session('type') .'s/'. session('info.username') .'/'. $sec .'/'. $id .'/'.$name,
                    $sec => $id,
                ]);
            }
        }
    
    }

    public function showImg($type, $username){
        if(Media::where( $type  , $username)->exists()){
            $imgInfo = Media::where( $type , $username)->first();
            $img = $imgInfo->mediaDir."/$imgInfo->name";
        }else{
            $img = "images/".session('type')."s/personal.png"; 
        }
        return $img;
    }

    public function test(Request $info){
        return $info;
    }

    public function getAttach($id){
        $attach = Media::where('cons', $id)->get();
        return $attach;
    }
}
