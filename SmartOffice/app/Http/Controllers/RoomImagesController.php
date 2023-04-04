<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomImages;
class RoomImagesController extends Controller
{
    
    //Store image
    public function storeImage(Request $request,int $roomId){
        
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Images'), $filename);
            return RoomImages::create([
                'filename' => $filename,
                'room_id' => $roomId,
            ]);
        }
       
    }
	
}
