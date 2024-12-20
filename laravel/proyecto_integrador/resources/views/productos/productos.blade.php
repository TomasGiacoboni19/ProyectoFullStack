@include('header')
<p>PRODUCTOS QUE TENEMOS </p>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($productos as $producto)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"> Nombre: {{$producto->nombre_producto}}</h5>
                                <p> Precio:{{$producto->precio_producto}}$ </p>
                                <p>Categoría: {{$producto->categoria->nombre_categoria}}</p>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/productos/{{ $producto->id_producto}}">Comprar</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
</section>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../../js/scripts.js"></script>

