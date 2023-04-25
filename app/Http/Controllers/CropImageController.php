<?php

namespace App\Http\Controllers;

use App\Models\CropImage;
use Illuminate\Http\Request;

class CropImageController extends Controller
{
    public function index()
    {
        return view('crop-image-upload');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cropImageUploadAjax(Request $request)
    {
        $folderPath = public_path('upload/');
        // dd($folderPath);
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        // dd($image_base64);
 
        $imageName = uniqid() . '.png';
        // dd($imageName);

        $imageFullPath = $folderPath . $imageName;
        // dd($imageFullPath);
        file_put_contents($imageFullPath, $image_base64);

        $saveFile = new CropImage;
        $saveFile->name = $imageName;
        // dd($saveFile);
        $saveFile->save();

        return response()->json(['success' => 'Crop Image Uploaded SuccessFully']);
    }
}
