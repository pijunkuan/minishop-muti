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
    <div class="button" onclick="location.href = '{{$url}}'">
        返回
    </div>
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
        border:1px solid #666;
        border-radius: 14px;
        color:#636363;
    }
    .button {
        margin-left: 100px;
        margin-top:60px;
        line-height: 30px;
        width: 100px;
        height: 30px;
        border: 1px solid #666;
        border-radius: 5px;
        cursor:pointer;
        color:#636363;
    }
    .button:hover{
        background-color:#ddd;
    }
</style>

</html>
