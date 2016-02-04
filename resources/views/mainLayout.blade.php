<html>
   <head>
      <title>標題@yield('titleTest')</title>

    </head>
    <body>
          <h1>主內容</h1>
          @section('menu')
               選單<br>
          @show

          <div class="test">

              mainLayout放一些內容<br><br>
              @yield('testContent')
        </div>
    </body>


</html>
