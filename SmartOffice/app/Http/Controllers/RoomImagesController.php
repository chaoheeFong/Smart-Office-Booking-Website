<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomImages;
class RoomImagesController extends Controller
{
    
    //Store image
    public function storeImage(Request $request,int $roomId){
        
        if($request->image != null){
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $file= $request->file('image');
            $imageName = time().'.'.$request->image->extension();  
            $file-> move(public_path('public/Images'), $imageName);
            return RoomImages::create([
                'filename' => $imageName,
                'room_id' => $roomId,
            ]);
        }
       
    }
	
}
