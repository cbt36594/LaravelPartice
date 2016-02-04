<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 150px;
            }
        </style>
    </head>
    <body>
        <a href="http://tw.yahoo.com">yahoo</a><br>
        <a href="dataInput/123">輸入測試</a><br>
        <a href="{{route('home')}}">首頁</a><br>
        <a href="{{route('Input',123)}}">第二頁</a><br>
        <a href="{{route('dataInputOption','test')}}">第三頁</a><br>
        <a href="{{route('dataInputMulti',['777',888])}}">第四頁</a><br>
        <a href="{{route('vendorWelcome')}}">welcome</a><br>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
    </body>
</html>
