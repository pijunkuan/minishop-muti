<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=viewport content="width=device-width,initial-scale=1">
    <link rel=stylesheet href=//at.alicdn.com/t/font_1789330_ptlh42r5dqn.css>
    <link rel="shortcut icon" href="{{$ico}}">

    <title>{{$title}}</title>
    <link href="{{asset($file.'css/app.css?v='.time())}}" rel=stylesheet>
</head>
<body>
<div id="app"></div>
<script src="{{asset($file.'js/template-elementUI.js?v='.time())}}"></script>
<script src="{{asset($file.'js/template-libs.js?v='.time())}}"></script>
<script src="{{asset($file.'js/app.js?v='.time())}}"></script>
</body>


</html>
