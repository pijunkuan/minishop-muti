<?php

namespace App\Http\Controllers\Front\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->get('ori_shop');
        $categories = $shop->categories()->where('visibility',1)->get();
        return $this->jsonSuccessResponse($categories);
    }
}
