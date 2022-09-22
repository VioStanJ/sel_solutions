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
}
