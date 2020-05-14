<?php

return [
    "codes"=>["express","other","no_shipment"],
    "cost_types"=>["numeric","weight"],
    "methods" => [
        [
            "code" => "express",
            "title" => "快递",
            "cost"=>null
        ],
        [
            "code"=>"other",
            "title"=>"其他物流",
            "cost"=>null
        ],
        [
            "code"=>"no_shipment",
            "title"=>"无需物流",
            "cost"=>false
        ]
    ]
];
