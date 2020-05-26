<?php


namespace App\Services\YuanPian;


use Illuminate\Http\Exceptions\HttpResponseException;

class SmsService
{
    static public function template($content, $data)
    {
        $arr = explode("#",$content);
        $keys = array();
        foreach ($arr as $value){
            $mb = mb_strlen($value);
            $st = strlen($value);
            if($mb == $st) $keys[]= $value;
        }
        if(count($keys)){
            foreach($keys as $key){
                if(!isset($data[$key]))
                    throw (new HttpResponseException(response()->json([
                        'code' => 422,
                        "msg" => "缺少 {$key} 参数",
                        "data" => null,
                    ], 422)));
                $content = str_replace("#{$key}#",$data[$key],$content);
            }
        }
        return $content;
    }
}
