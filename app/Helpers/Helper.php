<?php
namespace App\Helpers; 
class Helper {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */
    public static function upload_album() {
    	//echo "string"; die;
        $name = time().'.'.$media->getClientOriginalExtension();
        if($type == "audio"){
           $destinationPath = public_path('/audio/album');
           $path = "public/audio/album";
        }else{
           $destinationPath = public_path('/video/album');
           $path = "public/video/album";
        } 
        $media->move($destinationPath, $name);
        return $path."/".$name;
    }
    public static function test($id){
        echo $id;
        }
        
    public static function encrypt($sData){
        $id=(double)$sData*525325.24;
        return base64_encode($id);
        }

    public static function decrypt($sData){
        $url_id=base64_decode($sData);
        $id=(double)$url_id/525325.24;
        return $id;
        }
}