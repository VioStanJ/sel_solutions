<?php

namespace App;

use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class Utils
{
    public static function mkdir($name)
    {
        // '/channels/cover'
        if(!File::isDirectory($name)){
            File::makeDirectory($name, 0777, true, true);
        }
    }

    public static function deleteFile($file,$temp)
    {
        if($temp){
            if($file != $temp){
                if(file_exists(public_path($file))){
                    File::delete(public_path($file));
                }
            }
        }
    }

    public static function fileExist($file = '')
    {
        if(empty($file)){
            return false;
        }

        if(is_null($file)){
            return false;
        }

        if(!file_exists(public_path($file))){
            return false;
        }

        return true;
    }

    public static function generateOTP($n) {

	    $generator = "1357902468";

	    $result = "";

        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand()%(strlen($generator))), 1);
        }

    	return $result;
    }
}
