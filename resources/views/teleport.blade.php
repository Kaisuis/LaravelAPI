<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300" rel="stylesheet"> 
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                font-family: 'Montserrat', sans-serif;
                height: 100vh;
                margin: 0;
                width: 100%;
                color: black;
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
                color:#636b6f;
            }
            .alert alert-info{

                background-color: #fff;
            }
          
        </style>
    </head>
    <body>

            <div class="content">
                <div class="title m-b-md">
                    Teleport
                </div>
                
                <center><form method="post" action="/search">
                    {{ csrf_field() }}
                    <div class="input-group">
                      <input autocomplete="off" name="searchQuery" type="text" class="form-control" placeholder="Search" id="inp">
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" id="search">
                          <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                  </form> </center>
       
       @if(Session::has('message'))
       <p class="alert alert-info">{{ Session::get('message') }}</p>
       @endif
       
       <script>

       function wpisywanie(xdata){
                    inp = document.getElementById('inp');
                    inp.value = xdata.text;
                    $('#search').trigger("click").attr("disabled", true);
                    
                }
        $('#inp').keyup(function(){
        if($('#inp').val().length >= 3) {
            var inputValue = $('#inp').val();
            $.ajax({
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        cache: false,
                        encoding: "UTF-8",
                        url: "<?php echo e(url('teleport')); ?>",
                        beforeSend: function (before) {
                            var token = $('meta[name="csrf_token"]').attr('content');
                            if (token) {
                                return before.setRequestHeader('X-CSRF-TOKEN', token);
                            }
},
                        data: {input: inputValue},
        success: function (response) { 
            document.getElementById("lista").innerHTML = "";
            response.map(function (x) {
                var li = document.createElement("p");
                li.innerHTML = "<a href='#' onclick='wpisywanie(this);' >"+x+"</a>";                     
                document.getElementById("lista").appendChild(li);
            })
        },
        error: function (response) {
            $('#errormessage').html(response.message);
        }
        });
        }
        else{
            lista.innerHTML = "Brak wyników, wpisz więcej znaków";
        }
        });
       
</script>
</br>
    <div id="lista"></div>
        </div>
        <div id="hr">
        <hr/ style="width: 200px;">
        <center>Stanisław Musiał</center>
        <hr/ style="width: 300px;">
        </div>
            
    
    </body>
</html>
