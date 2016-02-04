<html>
<head>

    <body>
            <h1>{{$user_file}}</h1>
           <img src="/{{$user_file}}">
        <foreach ($datas as data)
            <h1>{{ $data->by_user }}</h1>
            <p>{{ $data->description }}</p>
        @endforeach
    </body>
    </head>

</html>
