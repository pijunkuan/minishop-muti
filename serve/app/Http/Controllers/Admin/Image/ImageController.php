<?php

namespace App\Http\Controllers\Admin\Image;

use App\Http\Controllers\Controller;
use App\Http\Resources\Image\ImageCollection;
use App\Http\Resources\Image\ImageResource;
use App\Models\AdminImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        $images = new AdminImage();

        $images = $images->orderBy('created_at','desc')->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new ImageCollection($images));
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileName = date('YmdHis').str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT).".".$file->getClientOriginalExtension();
        $savePath = env("APP_NAME")."/a_images/".$fileName;
        Storage::put($savePath,File::get($file));
        $url = Storage::url($savePath);
        $img =AdminImage::create([
            "img_file"=>$savePath,
            "img_name"=>$fileName,
            "img_bytes"=>$file->getSize(),
            "img_link"=>$url
        ]);
        $img->refresh();
        return $this->jsonSuccessResponse(new ImageResource($img));
    }

    public function destroy(Request $request)
    {
        $image = AdminImage::findOrFail($request->route()->parameter('image'));
        if($image->img_file){
            Storage::delete($image->img_file);
            $image->delete();
        }
        return $this->jsonSuccessResponse();
    }
}
