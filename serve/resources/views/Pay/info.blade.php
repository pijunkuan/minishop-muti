<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>友情提示</title>
</head>
<body>
<div class="content">
    <h1 >友情提示</h1>
    <h4>{{$message}}</h4>
</div>

</body>

<style>
    .content {
        position: absolute;
        left:50%;
        margin-left: -151px;
        margin-top: 60px;
        text-align: center;
        width: 300px;
        height: 300px;
        border:1px solid;
        border-radius: 14px;
    }
</style>

</html>
