<?php

namespace App\Http\Controllers\Apps\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\ImageRequest;
use App\Http\Resources\Image\ImageCollection;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->get('ori_shop');
        $images = $shop->images();
        $images = $images->orderBy('id','desc')->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new ImageCollection($images));
    }

    public function store(ImageRequest $request)
    {
        $shop = $request->get('ori_shop');
        $volume = $shop->level->level['pic_limit'];
        if($shop->images()->sum('img_bytes') >= ($volume * pow(1024,3)))
            return $this->jsonErrorResponse(401,"图片空间已使用完，无法创建");

        $file = $request->file('file');
        $fileName = date('YmdHis').str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT).".".$file->getClientOriginalExtension();
        $savePath = env("APP_NAME")."/images/".$fileName;
        Storage::put($savePath,File::get($file));
        $img = $shop->images()->create([
            "img_file"=>$savePath,
            "img_name"=>$fileName,
            "img_bytes"=>$file->getSize()
        ]);
        return $this->jsonSuccessResponse($img);
    }

    public function destroy(Request $request)
    {
        $shop = $request->get('ori_shop');
        $image = $shop->images()->findOrFail($request->route()->parameter('image'));
        if($image->img_file){
            Storage::delete($image->img_file);
            $image->delete();
        }
        return $this->jsonSuccessResponse();

    }
}
