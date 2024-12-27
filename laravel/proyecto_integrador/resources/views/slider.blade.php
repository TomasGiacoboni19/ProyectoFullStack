<div class="container">
    <div class="row">
        <div class="col-4 titulo-productos-destacados">
            <h2>Productos Destacados</h2>
        </div>
        <div class="col-8" id="slider">
            <section id="image-carousel" class="splide" aria-label="Beautiful Images">
                <div class="splide__track">
                      <ul class="splide__list">
                            @foreach($productos as $producto)
                            <li class="splide__slide">
                                <a href="/productos/{{$producto->id_producto}}">
                                    @if(empty($producto->foto_producto))
                                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="Imagen no disponible">
                                    @else
                                        <img class="card-img-top" src="{{ asset('storage/' . $producto->foto_producto) }}" alt="Foto del producto">
                                    @endif
                                    <p>${{$producto->precio_producto}}</p>
                                </a>
                            </li>
                            @endforeach
                      </ul>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="js/splide-4.1.3/dist/js/splide.min.js"></script>
<script src="js/sliderHome.js"></script>