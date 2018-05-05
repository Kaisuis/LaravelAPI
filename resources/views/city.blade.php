<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://www.google.com/jsapi"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: white;
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
                 z-index: 1;
                
             }
                /* JEGO KOD */

             div.hidden {
                display: none !IMPORTANT;
            }
            .popup-photo {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                background: rgba(0,0,0,0.12);
                z-index: +1;
            }
            .popup-photo div img {
                max-width: 500px;
                max-height: 500px;
                width: auto;
                height: auto;
                z-index: +1;
            }
            .links > a, .photo-link > a, .close-link > a {
                color: #636b6f;
                padding: 5px 18px 3px;
                font-size: 14px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .photo-link {
                margin-bottom: 20px;
            }

            .popup-photo .popup-container img {
                max-width: 500px;
                max-height: 500px;
                width: auto;
                height: auto;
                border-radius: 2.5px;
                z-index: +1;
                
            }
        </style>
    </head>
    <body>
            <div class="content">
                <div class="title m-b-md">
                    Teleport
                </div>
                <button type="button" class="btn btn-default" onclick="window.location.href='http://127.0.0.1:8000'">Powrót</button>
            </br>
                <div id="container">
                    <br>
                    <div class="photo-link">
                        <a href="#photo" @click="displayPhoto($event)">Zobacz jak wygląda {{ Request::get('city-name') }}</a>
                    </div>
                    
                    <div :class="{ 'hidden': isHidden }" class="popup-photo">
                        <div class="popup-container">
                            <img v-click-outside="closePhoto" v-bind:src="imageUrl" id="photo">
                            <div class="popup-buttons">
                                <button>
                                    Zamknij obraz
                                </button>
                            </div>
                        </div>
                    </div>
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
{{--  jego kod  --}}
        <br>
    
        <h2><center>Mapa:</center></h2>
      <div id="map"><center></center></div>
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

<script>

var renderTable = new Vue ({
            el: '#container',
            data: {
                tablica: {!! json_encode($tablica) !!},
                googleKey: "AIzaSyBXQjso0IDONxkfNHtXWS_QhOcO2QQmtcw",
                googleCX: "000630032180390558171:hwrdfamj4ra",
                imageUrl: '',
                isHidden: true
            },
            methods: {
                getFirstImage() {
                    console.log(this.tablica)
                    const url = `https://www.googleapis.com/customsearch/v1?key=${this.googleKey}&cx=${this.googleCX}&q=${this.tablica.name}&searchType=image&alt=json`
                    console.log(url); axios.get(url)
                    .then(function (response) {                                               
                        renderTable.imageUrl = response.data.items[0].link;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                },
                displayPhoto(e) {
                    e.preventDefault();
                    this.isHidden = false;
                },
                closePhoto(event) {
                    if(event.target.id == "photo" || event.target.hash == "#photo") {
                        this.isHidden = false;
                    } else {
                        this.isHidden = true;
                    }
                }
            },
            directives: {
              'click-outside': {
                bind: function(el, binding, vNode) {
                  // Provided expression must evaluate to a function.
                  if (typeof binding.value !== 'function') {
                    const compName = vNode.context.name
                    let warn = `[Vue-click-outside  provided expression '${binding.expression}' is not a function, but has to be`
                    if (compName) { warn += `Found in component '${compName}'` }
        
                    console.warn(warn)
                  }
                  // Define Handler and cache it on the element
                  const bubble = binding.modifiers.bubble
                  const handler = (e) => {
                    if (bubble || (!el.contains(e.target) && el !== e.target)) {
                      binding.value(e)
                    }
                  }
                  el.__vueClickOutside__ = handler
        
                  // add Event Listeners
                  document.addEventListener('click', handler)
                },
        
                unbind: function(el, binding) {
                  // Remove Event Listeners
                  document.removeEventListener('click', el.__vueClickOutside__)
                  el.__vueClickOutside__ = null
        
                }
              }
            },
            
            beforeMount(){
                this.getFirstImage()
            }
        });
</script>

    </div>
        
            </body>
</html>
