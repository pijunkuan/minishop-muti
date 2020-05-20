<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>微信在线支付</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
{{--    <script src="{{asset('js/pingpp.js')}}"></script>--}}
    <script src="{{asset('js/qrcode.min.js')}}"></script>
    <!-- Styles -->
    <style>
        body {
            background: #333;
            margin: 0;
        }

        .wxqrcode {
            position: absolute;
            left: 50%;
            width: 600px;
            margin-left: -300px;
            height: 600px;
            top: 0;
            background-color: #f2ebe6;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, .5);
        }

        .qrcode-title {
            padding: 10px 0;
            background-color: #303133;
            color: #fff;
            font-size: 18px;
        }

        .qrcode-title span {
            vertical-align: middle;
        }

        .wxqrcode .quit {
            border-top: dotted 1px #ccc;
            background-color: #fff;
            margin: 0 130px;
            min-height: 480px;
        }

        #qrcode {
            margin: 20px 25px 5px;
            overflow: hidden;
        }

        #qrcode img {
            max-width: 90%;
            max-height: 90%;
            padding: 5%;
            border-radius: 5px;
            border: 1px solid #DCDFE6;
        }

        .qrcode-tip {
            margin-bottom: 20px;
            font-size: 13px;
            color: #606266;
        }

        .qr-shopname {
            margin: 10px 0;
            padding: 0 20px;
            font-size: 16px;
            font-weight: 600;
        }

        .qr-price {
            font-size: 24px;
            font-weight: bold;
            color: #F56C6C;
            margin: 10px 0;
        }

        .qr-orderno {
            padding: 5px 20px;
            font-size: 14px;
            color: #606266;
            border-top: 1px solid #E4E7ED;
        }

        .qr-orderno span:first-child {
            float: left;
        }

        .qr-orderno span:last-child {
            float: right;
        }

        @media (max-width: 768px) {
            .wxqrcode {
                width: 320px;
                margin-left: -160px;
            }

            .wxqrcode .quit {
                margin: 0 15px;
            }
        }

    </style>
</head>
<body>
<div class="wxqrcode">
    <div class="qrcode-title">
        <span>微信安全支付</span>
    </div>
    <div class="quit">
        <div id="qrcode"></div>
        <div class="qrcode-tip">请使用微信扫描二维码支付</div>
        <div class="qrcode-tip">或下载图片用微信打开扫描支付</div>
        <div class="qr-shopname">
           订单总额
        </div>
        <div class="qr-price">¥
            {{$amount ?? "0.00"}}
        </div>
        <div class="qr-orderno">
            <span>订单编号</span>
            <span>
                {{$order_no ?? '0000000000'}}
            </span>
        </div>
    </div>
</div>

<script>


    //判断是否微信登陆
    function isWeiXin() {
        var ua = window.navigator.userAgent.toLowerCase();
        console.log(ua);//mozilla/5.0 (iphone; cpu iphone os 9_1 like mac os x) applewebkit/601.1.46 (khtml, like gecko)version/9.0 mobile/13b143 safari/601.1
        if (ua.match(/MicroMessenger/i) == 'micromessenger') {
            return true;
        } else {
            return false;
        }
    }

    new QRCode(document.getElementById('qrcode'), {
        text: "{!! $url !!}",
        width: 256,
        height: 256,
        colorDark: '#000000',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    });
    if (isWeiXin()) {
        window.location.href = '{!! $url !!}';
    }

</script>

</body>
</html>
