<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

            #map {
                 height: 400px;
                 width: 100%;
             }

        </style>
    </head>
    <body>

            <div class="content">
                <div class="title m-b-md">
                    Teleport
                </div>
            
      <?php
          $nazwa = $tablica['_embedded']['city:search-results'][0]['matching_alternate_names'][0]['name'];
          $latitude = $tablica['location']['latlon']['latitude'];
          $longitude = $tablica['location']['latlon']['longitude'];
        echo '<h2>Wyniki wyszukiwania dla:'.$nazwa.'</h2>';
          $pnazwa = $tablica['_embedded']['city:search-results'][0]['matching_full_name'];
          $populacja = $tablica['population'];
          
            
        
        echo '<center><table class="table table-dark">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col"> Lp.  </th>';
        echo '<th scope="col" width="100px;">  Nazwa  </th>';
        echo '<th scope="col" width="300px;"> Pełna nazwa </th>';
        echo '<th scope="col" width="200px;"> Populacja </th>';
        echo '<th scope="col" width="150px;"> Szerokość geograficzna </th>';
        echo '<th scope="col" width="100px;"> Długość geograficzna </th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<th scope="row">1</th>';
        echo '<th scope="row">'.$nazwa.'</th>';
        echo '<th scope="row">'.$pnazwa.'</th>';
        echo '<th scope="row">'.$populacja.'</th>';
        echo '<th scope="row">'.$latitude.'</th>';
        echo '<th scope="row">'.$longitude.'</th>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table></center>';


      ?>   
      <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsmCmiYejoZdTbUHOb_OJVvHbVl1a_N8Q&callback=initMap">
    </script>




    </div>
        
            </body>
</html>
