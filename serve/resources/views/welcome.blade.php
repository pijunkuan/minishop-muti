<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel=stylesheet href="//at.alicdn.com/t/font_1789330_ptlh42r5dqn.css">
        <title>Vue Test</title>
        @foreach ($csses as $css)
            <link href="{{asset($css)}}" rel=stylesheet>
            @endforeach
    </head>
    <body>
       <div id="app"></div>
    </body>
    @foreach($jses as $js)
        <script src="{{asset($js)}}"></script>
        @endforeach
</html>
