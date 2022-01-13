@extends("layouts.main")
@section("content")
<div class="header-two">
    @include("partials.header")
</div>

<main>
    <div class="mt-9">
        @include("partials.categorias")
    </div>
    <!--------------------------------tienda---------------------------------------->
    <section class="container main-tienda">
        <h2 class="mt-0 titles mt-5 mb-5">R&M Tienda Virtual</h2>

        <div class="row">
            <div class="col-md-3">
                <!-- Isotope menu -->
                <div class=" container_menu_iso mb-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="row">
                        <!------------------------filtro-------------------------->
                        <div class="col-sm-12">
                            <div class="menu_iso" id="custom-filter">
                                <li>
                                    <a data-filter=".caninos"><img src="assets/img/icons/canino-icon.png" alt="">
                                        <span>Caninos</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-filter=".felinos"><img src="assets/img/icons/felino-icon.png" alt="">
                                        <span>Felinos</span>
                                    </a>
                                </li>

                            </div>
                        </div>

                        <!------------------------check-------------------------->
                        <div class="col-sm-12">
                            <div class="options">
                                <p>Categorias</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Alimentos Seco
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                    <label class="form-check-label" for="flexCheckDefault1">
                                        Alimentos Humedo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                    <label class="form-check-label" for="flexCheckDefault2">
                                        Alimentos Medicado
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                    <label class="form-check-label" for="flexCheckDefault3">
                                    Snacks
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                    <label class="form-check-label" for="flexCheckDefault3">
                                    Farmacia
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                    <label class="form-check-label" for="flexCheckDefault3">
                                    Antipulgas & Desparasitantes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                    <label class="form-check-label" for="flexCheckDefault3">
                                    Juguetes & Accesorios
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                    <label class="form-check-label" for="flexCheckDefault3">
                                    Ropa
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <!-- Isotope Gallery -->
                <div class="container container_gallery_iso" data-aos="fade-up" data-aos-duration="1100">
                    <div class="row iso-container">

                        <!-- ----1---- -->
                        <div class="col-xs-6 col-sm-4 cent isotope-item caninos">
                           <a href="product">
                                <div class="img_iso" style="  background-image: url(assets/img/stock/Tiendavirtualalimentossecos.jpg)">
                                    <div class="hover_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)"></div>
                                </div>
                                <div class="titulo-product">
                                    <h3>Nombre de producto</h3>
                                    <p>From: $ 100.000</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-xs-6 col-sm-4 cent isotope-item felinos">
                           <a href="product">
                                <div class="img_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)">

                                    <div class="hover_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)"></div>

                                </div>
                                <div class="titulo-product">
                                    <h3>Nombre de producto</h3>
                                    <p>From: $ 100.000</p>
                                </div>
                            </a>
                        </div>

                        <!-- -----2----- -->
                        <div class="col-xs-6 col-sm-4 cent isotope-item felinos">
                            <div class="img_iso" style="  background-image: url(assets/img/stock/tiendavirtual.jpg)">

                                <div class="hover_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)"></div>
                            </div>
                            <div class="titulo-product">
                                <h3>Nombre de producto</h3>
                                <p>From: $ 100.000</p>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 cent isotope-item caninos">
                            <div class="img_iso" style="  background-image: url(assets/img/stock/hojainicio.jpg)">

                                <div class="hover_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)"></div>
                            </div>
                            <div class="titulo-product">
                                <h3>Nombre de producto</h3>
                                <p>From: $ 100.000</p>
                            </div>
                        </div>

                        <!-- ----3--- -->

                        <div class="col-xs-6 col-sm-4 cent isotope-item caninos">
                            <div class="img_iso" style="  background-image: url(assets/img/stock/peluquería_SPAAromaterapiaymasajesderelajación.jpg)">

                                <div class="hover_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)"></div>
                            </div>
                            <div class="titulo-product">
                                <h3>Nombre de producto</h3>
                                <p>From: $ 100.000</p>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-4 cent isotope-item felinos">
                           <a href="product">
                                <div class="img_iso" style="  background-image: url(assets/img/stock/laboratorioClínico.jpg)">
                                    <div class="hover_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)"></div>
                                </div>
                                <div class="titulo-product">
                                    <h3>Nombre de producto</h3>
                                    <p>From: $ 100.000</p>
                                </div>

                            </a>


                        </div>

                        <!-- ----4------ -->

                        <div class="col-xs-6 col-sm-4 cent isotope-item felinos">
                            <div class="img_iso" style="  background-image: url(assets/img/stock/Endoscopio .jpg)">

                                <div class="hover_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)"></div>
                            </div>
                            <div class="titulo-product">
                                <h3>Nombre de producto</h3>
                                <p>From: $ 100.000</p>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-4 cent isotope-item caninos">
                            <div class="img_iso" style="  background-image: url(assets/img/stock/Hospitalizaciónycuidadosintensivos.jpg)">

                                <div class="hover_iso" style="  background-image: url(assets/img/stock/TiendavirtualPlacasidentificación.jpg)"></div>
                            </div>
                            <div class="titulo-product">
                                <h3>Nombre de producto</h3>
                                <p>From: $ 100.000</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </section>

</main>

@include("partials.footer")
@endsection
