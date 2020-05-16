<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel=stylesheet href="//at.alicdn.com/t/font_1789330_ptlh42r5dqn.css">
        <title>Vue Test</title>
        <link href="{{asset($file.'css/template-libs.css')}}" rel=stylesheet>
        <link href="{{asset($file.'css/app.css')}}" rel=stylesheet>

    </head>
    <body>
       <div id="app"></div>
    </body>
    <script src="{{asset($file.'js/template-libs.js')}}"></script>
    <script src="{{asset($file.'js/app.js')}}"></script>

</html>
