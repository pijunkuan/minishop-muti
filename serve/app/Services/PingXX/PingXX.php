<?php


namespace App\Services\PingXX;


use App\Exceptions\ApiException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Pingpp\Charge;
use Pingpp\Pingpp;
use Pingpp\Transfer;
use Pingpp\WxpubOAuth;

class PingXX
{
    //Ping++ 生产环境key
    private $Ping_live_key;
    //Ping++ 测试环境key
    private $Ping_test_key;
    //Ping++ 密钥地址
    private $Ping_key_path;
    private $Ping_pub_key_path;
    //微信公众号id
    private $Wx_pub_id;
    //微信公众号密钥
    private $Wx_pub_key;

    private $Ping_app_id;

    public function __construct($ping_app_id)
    {
        $this->Ping_key_path = storage_path('/Key/private_key.pem');
        $this->Ping_pub_key_path = storage_path('/Key/public_key.pem');
        $this->Wx_pub_id = env('WX_PUB_ID');
        $this->Wx_pub_key = env('WX_PUB_KEY');
        $this->Ping_live_key = env('PING_LIVE_KEY');
        $this->Ping_test_key = env('PING_TEST_KEY');
        $this->Ping_app_id = $ping_app_id;
        switch (env('PING_MODEL')) {
            case "test":
                $ping_key = $this->Ping_test_key;
                break;
            default:
                $ping_key = $this->Ping_live_key;
                break;
        }

        Pingpp::setApiKey($ping_key);
        PingPP::setPrivateKeyPath($this->Ping_key_path);
    }

    /**
     * @param $params
     * pay_no,amount,no,url
     * @return Charge
     */
    public function pc_alipay($params)
    {
        $amount = ceil($params['amount'] * 100);
        $c = [
            'order_no' => $params['no'],
            'app' => array('id' => $this->Ping_app_id),
            'channel' => "alipay_pc_direct",
            'amount' => $amount,
            'client_ip' => $_SERVER['REMOTE_ADDR'],
            'currency' => 'cny',
            'subject' => "{$params['no']}",
            'body' => "订单：{$params['no']}",
            'extra' => [
                'success_url' => $params['url']
            ]
        ];
        $charge = Charge::create($c);
        return $charge;
    }

    public function m_alipay($params)
    {
        $amount = ceil($params['amount'] * 100);
        $c = [
            'order_no' => $params['no'],
            'app' => array('id' => $this->Ping_app_id),
            'channel' => "alipay_wap",
            'amount' => $amount,
            'client_ip' => $_SERVER['REMOTE_ADDR'],
            'currency' => 'cny',
            'subject' => "{$params['no']}",
            'body' => "订单：{$params['no']}",
            'extra' => [
                'success_url' => $params['url']
            ]
        ];
        $charge = Charge::create($c);
        return $charge;
    }

    public function m_wxpay($params, $code = null)
    {
        try {
            $open_id = WxpubOAuth::getOpenid($this->Wx_pub_id, $this->Wx_pub_key, $code);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            throw (new HttpResponseException(response()->json([
                'code' => 422,
                "message" => $exception->getMessage(),
                "body" => null,
            ], 422)));
        }
        $amount = ceil($params['amount'] * 100);
        $c = [
            'order_no' => $params['no'],
            'app' => array('id' => $this->Ping_app_id),
            'channel' => "wx_pub",
            'amount' => $amount,
            'client_ip' => $_SERVER['REMOTE_ADDR'],
            'currency' => 'cny',
            'subject' => "{$params['no']}",
            'body' => "订单：{$params['no']}",
            'extra' => [
                'open_id' => $open_id
            ]
        ];
        $charge = Charge::create($c);
        return $charge;
    }

    public function scan_wxpay($params)
    {
        $amount = ceil($params['amount'] * 100);
        $c = [
            'order_no' => $params['no'],
            'app' => array('id' => $this->Ping_app_id),
            'channel' => "wx_pub_qr",
            'amount' => $amount,
            'client_ip' => $_SERVER['REMOTE_ADDR'],
            'currency' => 'cny',
            'subject' => "{$params['no']}",
            'body' => "订单：{$params['no']}",
            'extra' => [
                'product_id' =>$params['no']
            ]
        ];
        $charge = Charge::create($c);
        return $charge;
    }

    public function wx_getToken($order_no)
    {
        $url = env("WX_PAY_HTTP");
        $redirect_url = $url . $order_no;
        $url = WxpubOAuth::createOauthUrlForCode($this->Wx_pub_id, $redirect_url);
        return $url;
    }

    public function transfer_alipay($params)
    {
        $amount = ceil($params['amount'] * 100);
        $c = [
            'order_no' => $params['no'],
            'app' => array('id' => $this->Ping_app_id),
            'channel' => "alipay",
            'amount' => $amount,
            'currency' => 'cny',
            'type' => 'b2c',
            'recipient' => $params['recipient'],
            'description' => $params['description'],
            'extra' => [
                'recipient_name' => $params['name']
            ]
        ];
        $charge = Transfer::create($c);
        return $charge;
    }

    public function charge_retrieve($id)
    {
        return Charge::retrieve($id);
    }

    public function refund_create($params)
    {
        $ch = $this->charge_retrieve($params['pay_no']);
        $data = array();
        $data['description'] = $params['content'];
        if(isset($params['amount']) && !is_null($params['amount'])) $data['amount'] = ceil($params['amount'] * 100);
        return $ch->refunds->create($data);
    }

    public function refund_retrieve($params)
    {
        $ch = $this->charge_retrieve($params['pay_no']);
        return $ch->refunds->retrieve($params['refund_no']);
    }

    /**
     * 验证 webhooks 签名方法：
     * raw_data：Ping++ 请求 body 的原始数据即 event ，不能格式化；
     * signature：Ping++ 请求 header 中的 x-pingplusplus-signature 对应的 value 值；
     * pub_key_path：读取你保存的 Ping++ 公钥的路径；
     * pub_key_contents：Ping++ 公钥，获取路径：登录 [Dashboard](https://dashboard.pingxx.com)->点击管理平台右上角公司名称->开发信息-> Ping++ 公钥
     */
    public function verify_signature($raw_data, $signature)
    {
        $pub_key_contents = file_get_contents($this->Ping_pub_key_path);
        return openssl_verify($raw_data, base64_decode($signature), $pub_key_contents, 'sha256');
    }
}
