<html>
<head>

    <body>

        @foreach ($datas as $data)
            <h1>{{ $data->user_name }}</h1>
            <p>{{ $data->description }}</p>
        @endforeach

    </body>
    </head>

</html>
