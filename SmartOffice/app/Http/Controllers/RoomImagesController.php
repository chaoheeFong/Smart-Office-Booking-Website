<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomImages;
use App\Models\Room;
class RoomImagesController extends Controller
{
    
    /**
     * Store image
     *
     * @param Request $request
     * @param int $roomId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function storeImage(Request $request,int $roomId){
        
<<<<<<< Updated upstream
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Images'), $filename);
            return RoomImages::create([
                'filename' => $filename,
                'room_id' => $roomId,
            ]);
=======
        
        

        $file = $request->file('image');

        if ($file != null) {
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $imageName);
    
            $roomImage = new RoomImages();
            $roomImage->filename = $imageName;
    
            $room = Room::find($roomId);
            $room->images()->save($roomImage);
    
            return $roomImage;
        } else {
            return response()->json(['error' => 'Image is null.']);
>>>>>>> Stashed changes
        }
    }
       
    
	
}
