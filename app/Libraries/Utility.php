<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Storage;

class Utility {
    public static function nameToSlug($name) {
        // Convert to lowercase
        $slug = mb_strtolower($name, 'UTF-8');

        // Remove accents
        $slug = preg_replace('/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/i', 'a', $slug);
        $slug = preg_replace('/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/i', 'e', $slug);
        $slug = preg_replace('/i|í|ì|ỉ|ĩ|ị/i', 'i', $slug);
        $slug = preg_replace('/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/i', 'o', $slug);
        $slug = preg_replace('/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/i', 'u', $slug);
        $slug = preg_replace('/ý|ỳ|ỷ|ỹ|ỵ/i', 'y', $slug);
        $slug = preg_replace('/đ/i', 'd', $slug);
        
        // Replace spaces with dashes
        $slug = str_replace(' ', '-', $slug);

        // Replace underscores with dashes
        $slug = str_replace('_', '-', $slug);
        
        // Remove non-alphanumeric characters (except dashes)
        $slug = preg_replace('/[^a-z0-9-_]/u', '', $slug);
    
        // Remove multiple consecutive dashes
        $slug = preg_replace('/-+/', '-', $slug);

        // Remove dash at start and end of string
        $slug = preg_replace('/^-|-$/', '', $slug);
    
        return $slug;
    }
    

    public static function uploadFile($file, $path)
    {
        if (!empty($file)) {
            $array = explode('.', $file->getClientOriginalName());
            array_pop($array);
            $slug = implode('-', $array);
            $name = time() . '-' . self::nameToSlug($slug) . '.' . $file->getClientOriginalExtension();
            $file->storeAs($path, $name);

            return $name;
        }

        return false;
    }

    public static function deleteFile($fileName, $path)
    {
        if (!empty($fileName) && Storage::exists($path . $fileName)) {
            Storage::delete($path . $fileName);
            return true;
        }

        return false;
    }
}
