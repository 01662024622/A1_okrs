<?php

namespace App\Http\Controllers\Functions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageCropController extends Controller
{
    function upload(Request $request)
    {
        if($request->has('image'))
        {
            $image_data = $request->image;
            $image_array_1 = explode(";", $image_data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $image_name = time() . '.'.$request->image->getClientOriginalExtension();
            $upload_path = public_path('/public/storage/' . $image_name);
            file_put_contents($upload_path, $data);
            return response()->json(['path' => '/public/storage/' . $image_name]);
        }
    }
}
