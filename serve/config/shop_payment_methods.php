<?php

return [
    "method_codes" => ["wallet", "cash"],
    "methods" => [
        [
            "code" => "wallet",
            "title" => "钱包支付",
            "img" => null,
            "des" => "钱包支付方式",
            "need_setting" => false,
            'need_wallet'=>false,
        ],
        [
            "code" => "cash",
            "title" => "货到付款",
            "img" => null,
            "des" => "货到付款方式",
            "need_setting" => false,
            'need_wallet'=>false,
        ],
        [
            "code" => "alipay",
            "title" => "支付宝",
            "img" => null,
            "des" => "支付宝手机支付",
            "need_setting" => false,
            'need_wallet'=>true,

        ],
        [
            "code" => "wxpay",
            "title" => "微信",
            "img" => null,
            "des" => "微信支付",
            "need_setting" => false,
            'need_wallet'=>true,

        ],
    ]
];
