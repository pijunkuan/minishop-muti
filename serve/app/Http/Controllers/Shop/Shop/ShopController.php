<?php

namespace App\Http\Controllers\Shop\Shop;

use App\Events\Shop\Block\BlockSuccessEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Shop\ShopStoreRequest;
use App\Http\Resources\Shop\ShopResource;
use App\Models\Shop;
use App\Models\ShopOrder;
use App\Models\ShopOrderPayment;
use App\Models\SysLevelVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function index()
    {
        $shops = auth('users')->user()->shops;
        return $this->jsonSuccessResponse(ShopResource::collection($shops));
    }
}
