<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Gumlet\ImageResize;

class MediaController extends Controller
{
    public function insert(){
        $media = Media::all();
        return view('show-image',['media'=>$media]);
    }
    public function store(Request $request){
            // dd($request->datafile);
            
        if($request->hasFile("datafile")){
            $size = $request->file("datafile")->getSize();

            $profile_img = $request->datafile;
            $imgName = time().".".$profile_img->getClientOriginalName();

            $ext = explode(".",$imgName);
            // dd(end($ext));

            $profile_img->move("images/",$imgName);
            $upload = "images/".$imgName;
            $media = new Media();
            $media->image_path = $upload;
            $media->extension = end($ext);
            // dd($media);
            $media->file_size = $size;
            $media->save();
            return redirect()->back()->with('success','Image saved'); 

        
        }
       
       
    } 

    public function delimg(Request $request,$id){
        // dd($id);
        $media = Media::find($id);
        $media->delete();
        return redirect()->back()->with('info','Image Deleted');

        
    }
}
