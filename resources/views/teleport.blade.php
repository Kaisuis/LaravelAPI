<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

            <div class="content">
                <div class="title m-b-md">
                    Teleport
                </div>
            <form method="post" action="/search" >
               
                {{ csrf_field() }}

            Wpisz: <input type="text" name="searchQuery" id="q">
            <input type="submit" value="Szukaj">  
 
       </form>  
       
       @if(Session::has('message'))
       <p class="alert alert-info">{{ Session::get('message') }}</p>
       @endif
       
       <script>
        $('#q').keyup(function(){
        if($('#q').val().length >= 3) {
            var inputValue = $('#q').val();
            $.ajax({
       type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        cache: false,
                        encoding: "UTF-8",
                        url: "{{ url('teleport') }}",
                        data: {input: inputValue},
        success: function (response) { 
            $tablica.map(function () {
                
            })
        },
        error: function (response) {
            $('#errormessage').html(response.message);
        }
        });
        }
        else{

        }
        
        });
       
</script>

        </div>
      
            
        
    </body>
</html>
