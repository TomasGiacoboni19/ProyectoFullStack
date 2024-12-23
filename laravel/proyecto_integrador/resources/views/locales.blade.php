<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Interactivo</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" crossorigin=""/>
    <link rel="stylesheet" href="css/map.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link  rel ="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>
<body>
@include('header')
<div class="container-fluid mt-5">
    <div class="row mt-5">
        <div class="col ps-5 " id="Locales">
            <h1>Conoce nuestros <br>locales</h1>
            <div class="row mt-5">
                <div class="col d-flex justify-content-center ">
                    <i class="bi bi-shop"></i> <p>Av. Belgrano 271</p>
                </div>
            </div>
            <div class="row ">
                <div class="col d-flex justify-content-center ">
                    <i class="bi bi-shop"></i> <p>Av. Sta. Fe 2301</p>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <i class="bi bi-shop"></i> <p>Av. Córdoba 3638</p>
                </div>
            </div>
        </div>
        <div class="col" >
            <div id="map"> </div>
        </div>
    </div>
</div>


<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" crossorigin=""></script>
<script src="{{ asset('js/map.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js "
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
@include('footer')
</body>
</html>
