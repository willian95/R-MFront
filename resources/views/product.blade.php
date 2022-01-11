@extends("layouts.main")
@section("content")
<div class="header-two">
    @include("partials.header")
</div>

<main>
    <div class="breadcrumbs">
        <p><span><a href="/">Inicio </a>><a href="tienda"> Tienda</a> ></span> Producto</p>
    </div>

    <div class="row container-fluid">
        <div class="col-md-7">
            <div id="gallery-product" class="demo-gallery" data-pswp-uid="1">
                <div class="container gallery-product">
                    <a class="img-product" href="assets/img/stock/Tiendavirtualalimentossecos.jpg" data-size="1600x1068" data-med="assets/img/stock/Tiendavirtualalimentossecos.jpg" data-med-size="1024x683" data-author="RYM">
                        <img src="assets/img/stock/Tiendavirtualalimentossecos.jpg" alt="">
                        <!---- <figure>This is dummy caption. It has been placed here solely to demonstrate the look and feel of finished, typeset text.</figure>--->
                        <div class="gallery-zoom">
                            <p>+</p>
                        </div>
                    </a>


                    <a class="img-product" href="assets/img/stock/TiendavirtualPlacasidentificación.jpg" data-size="1600x1067" data-med="assets/img/stock/TiendavirtualPlacasidentificación.jpg" data-med-size="1024x683" data-author="RYM">
                        <img src="assets/img/stock/TiendavirtualPlacasidentificación.jpg" alt="">
                        <div class="gallery-zoom">
                            <p>+</p>
                        </div>
                    </a>

                    <a class="img-product" href="assets/img/stock/hojainicio.jpg" data-size="1600x1067" data-med="assets/img/stock/hojainicio.jpg" data-med-size="1024x683" data-author="RYM">
                        <img src="assets/img/stock/hojainicio.jpg" alt="">
                        <div class="gallery-zoom">
                            <p>+</p>
                        </div>
                    </a>

                    <a class="img-product" href="assets/img/stock/peluquería_SPAAromaterapiaymasajesderelajación.jpg" data-size="1600x1600" data-med="assets/img/stock/peluquería_SPAAromaterapiaymasajesderelajación.jpg" data-med-size="1024x1024" data-author="RYM" class="demo-gallery__img--main">
                        <img src="assets/img/stock/peluquería_SPAAromaterapiaymasajesderelajación.jpg" alt="">
                        <div class="gallery-zoom">
                            <p>+</p>
                        </div>
                    </a>


                    <a class="img-product" href="assets/img/stock/laboratorioClínico.jpg" data-size="1600x1067" data-med="assets/img/stock/laboratorioClínico.jpg" data-med-size="1024x683" data-author="RYM">
                        <img src="assets/img/stock/laboratorioClínico.jpg" alt="">
                        <div class="gallery-zoom">
                            <p>+</p>
                        </div>
                    </a>


                </div>
            </div>

        </div>

        <div class="col-md-5">
            <div class="content-flex">
                <h2>Awesome Pet Product
                </h2>

                <div class="price">
                    <p>$10.000</p>
                </div>
            </div>

            <div class="content-flex">
                <div class="">
                    <form class="qanty">
                        <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                        <input type="number" id="number" value="0" />
                        <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                    </form>
                </div>
                <div class="w-150 text-end w-100">
                    <button class="btn-red">Agrgar al carrito</button>
                </div>

            </div>
            <hr>
            <div class="overview">
                <h4>Overview</h4>
                <p>• Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit <br>
                    • Sed do eiusmod tempor incididunt <br>
                    • Sed do eiusmod tempor incididunt</p>
            </div>

        </div>
    </div>

    <!----------------------------------relacionados----------------------------------->
    <section>
        <h2 class="mt-0 titles mt-5 mb-5">Más productos que pueden servirle a tu mascota</h2>

        <div class="slider-relacionados container">
            <div class="">
                <div class="img_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)">

                    <div class="hover_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)"></div>
                </div>
                <div class="titulo-product">
                    <h3>Nombre de producto</h3>
                    <p>From: $ 100.000</p>
                </div>
            </div>
            <div class="">
                <div class="img_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)">

                    <div class="hover_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)"></div>
                </div>
                <div class="titulo-product">
                    <h3>Nombre de producto</h3>
                    <p>From: $ 100.000</p>
                </div>
            </div>
            <div class="">
                <div class="img_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)">

                    <div class="hover_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)"></div>
                </div>
                <div class="titulo-product">
                    <h3>Nombre de producto</h3>
                    <p>From: $ 100.000</p>
                </div>
            </div>
            <div class="">
                <div class="img_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)">

                    <div class="hover_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)"></div>
                </div>
                <div class="titulo-product">
                    <h3>Nombre de producto</h3>
                    <p>From: $ 100.000</p>
                </div>
            </div>
            <div class="">
                <div class="img_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)">

                    <div class="hover_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)"></div>
                </div>
                <div class="titulo-product">
                    <h3>Nombre de producto</h3>
                    <p>From: $ 100.000</p>
                </div>
            </div>
        </div>

    </section>

















    <!-- Photoswipe 4.0 html code for javascript interface -->



    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe.
     It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides.
        PhotoSwipe keeps only 3 of them in the DOM to save memory.
        Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>
</main>

@include("partials.footer")
@endsection
