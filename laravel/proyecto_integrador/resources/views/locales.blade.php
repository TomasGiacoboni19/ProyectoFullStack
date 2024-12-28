<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href={{asset('css/map.css')}}>

    <title>Locales</title>
</head>
<body>
<div class="section-title">
    <span>CONOCE NUESTROS LOCALES</span>
</div>
<div class="Principal">
    <div class="row containerCartas ps-5">
        <div class="container-carta col">
            <div class="card">
                <p class="title">SAN TELMO <i class="bi bi-geo-alt"></i></p>
                <div class="card-hidden">
                    <p class="title-in">Av. Belgrano 271</p>
                    <p>Su fachada amarilla y ropa colorida en un local de diseño moderno con toques cálidos y plantas colgantes.</p>
                    <a class="button">Button</a>
                </div>
            </div>
        </div>
        <div class="container-carta col">
            <div class="card">
                <p class="title">RECOLETA<i class="bi bi-geo-alt"></i></p>
                <div class="card-hidden">
                    <p class="title-in">Av. Sta. Fe 2301</p>
                    <p>Combina elegancia y modernidad, con ropa exclusiva en un local minimalista decorado con tonos neutros y detalles de arte local.</p>
                    <a class="button">Button</a>
                </div>
            </div>

        </div>
        <div class="container-carta col">
            <div class="card">
                <p class="title">ALMAGRO<i class="bi bi-geo-alt"></i></p>
                <div class="card-hidden">
                    <p class="title-in">Av. Córdoba 3638</p>
                    <p>Estilo urbano, con grafitis en las paredes, ropa vibrante y un ambiente relajado lleno de música y arte callejero.</p>
                    <a class="button">Button</a>
                </div>
            </div>

        </div>
    </div>
    <div id="Mapa" class="mt-5">
        <div id="map"> </div>
    </div>
</div>
</div>


<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" crossorigin=""></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js "
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsYtV3Byz08iUJiunQOAf9U3f8WG-W5TM&callback=initMap"></script>
<script src={{asset('js/map.js')}}></script>
</body>
</html>
