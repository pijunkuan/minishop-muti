<?php

namespace App\Http\Controllers\Front\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->get('ori_shop');
        $products = $shop->products();
        if ($name = $request->get('name')) {
            foreach (explode(" ", $name) as $value) {
                $products = $products->where('product_title', 'like', "%{$value}%");
            }
        }
        if($request->get('Q4S')){
            $product_ids = ProductVariant::where('quantity','>',0)->pluck('product_id');
            $products = $products->whereIn('id',$product_ids);
        }
        if(is_array($request->get('categories')) && count(array_filter($request->get('categories')))){
            $product_ids = ProductCategory::whereIn('category_id',$request->get('categories'))->pluck('product_id');
            $products = $products->whereIn('id',$product_ids);
        }
        $products = $products->orderBy('created_at','desc');
        $products = $products->where('on_sale',true)->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new ProductCollection($products));
    }

    public function show(Request $request)
    {
        $shop = $request->get('ori_shop');
        $product = $shop->products()->findOrFail($request->route()->parameter('product'));
        return $this->jsonSuccessResponse(new ProductDetail($product));
    }
}
