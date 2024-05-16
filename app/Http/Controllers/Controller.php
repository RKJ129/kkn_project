<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function setImg($request, $directory) {
        if($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . "_" . $img->getClientOriginalName();
            $img->move($directory, $imgName);            

            return $imgName;
        } else {
            return null;
        }
    }

    protected function imageUpdate($newImage, $oldImage) {
         return $newImage != null ? $newImage : $oldImage;
    }
}
