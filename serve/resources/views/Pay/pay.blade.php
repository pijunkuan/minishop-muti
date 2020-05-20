<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>{{ $charge->order_no }} | 在线支付</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <script src="{{asset('js/pingpp.js')}}"></script>
    <!-- Styles -->
</head>
<body>
	<div style="width:280px;text-align:center;position:absolute;margin-left:50%;left:-150px;padding:10px;margin-top:20px">
    <h2>正在跳转中....</h2>
</div>

<script>



    var data = {!! $charge !!};

    pingpp.createPayment(data, function(result, err) {
    	if (result == "success"){
			window.location = '{!! $url??"" !!}'
		}else{
    		window.location =  '{!! $url??"" !!}'
    	}
    });

</script>

</body>
</html>
