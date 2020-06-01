<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopAuthenticate extends Model
{
    public $table = "shop_authenticates";
    const AUTH_STATUS_PENDING = 'pending';
    const AUTH_STATUS_SUCCESS = 'success';
    const AUTH_STATUS_FAILED = 'failed';

    const authStatusMap = [
        self::AUTH_STATUS_PENDING => "审核中",
        self::AUTH_STATUS_SUCCESS => "认证通过",
        self::AUTH_STATUS_FAILED => "认证失败",
    ];

    const AUTH_TYPE_PERSON = "person";
    const AUTH_TYPE_COMPANY = "company";

    const authTypeMap = [
        self::AUTH_TYPE_PERSON=>"个人认证",
        self::AUTH_TYPE_COMPANY=>"企业认证",
    ];

    protected $guarded = [];
    protected $casts = [
        "images"=>"array"
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class,"shop_id");
    }
}
