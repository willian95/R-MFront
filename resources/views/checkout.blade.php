@extends("layouts.main")
@section("content")
<div class="header-two">
    @include("partials.header")
</div>

<main class="container">
    <div class="mt-9">
        @include("partials.categorias")
    </div>
    <div class="breadcrumbs">
        <p><span><a href="/">Inicio </a>><a href="tienda"> Tienda</a> ></span> Checkout</p>
    </div>

    <section>
        <h2 class="mt-0 titles mt-5 mb-5">R&M Tienda Virtual</h2>

        <div class="row">
            <div class="col-md-7">
                <div class="border-content">
                    <div class="border-check">
                        <h3>Mi carrito</h3>
                    </div>
                    <div class="product-info">
                        <!---1---->
                        <div>
                            <img src="assets/img/stock/TiendavirtualPlacasidentificación.jpg" alt="">
                        </div>
                        <!---2---->
                        <div>
                            <p class="txt-product-check">Awesome product</p>
                            <p>$ 100.000</p>
                        </div>
                        <!---3---->
                        <div>
                            <div class="content-flex">
                                <div class="">
                                    <form class="qanty">
                                        <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                        <input type="number" id="number" value="0" />
                                        <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                                    </form>
                                </div>


                            </div>
                        </div>
                        <!---4---->
                        <div class="text-center">
                            <i class="far fa-trash-alt trash"></i>
                        </div>
                    </div>
                </div>
                <!--------------------->
                <div class="border-content mt-5">
                    <div class="border-check">
                        <h3>Dirección y pago
                        </h3>
                    </div>
                    <!------>
                    <form class="form-check pb-5">
                        <div class="row p-section">
                            <div class="col-md-6 text-start  mb-4">
                                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                <input type="text" placeholder="Maria" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="col-md-6 text-start  mb-4">
                                <label for="exampleInputEmail1" class="form-label">Telefono</label>
                                <input type="text" placeholder="12345678" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="col-md-12 text-start  mb-4">
                                <label for="exampleInputEmail1" class="form-label">Dirección</label>
                                <input placeholder="" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-reds txt-w">Pagar</button>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="resumen">
                    <h3>Resumen</h3>
                    <div class="resumen-item">
                        <span>Subtotal</span>
                        <p>$ 1,998.000</p>
                    </div>
                    <div class="resumen-item">
                        <span>Envio</span>
                        <p>$ 5.000</p>
                    </div>

                </div>
                <div class="resumen-item bg-total ">
                    <span>Total</span>
                    <p>$ 2,003.000</p>
                </div>

                <!------------codigo------------->
                <form action="">
                    <div class="col-md-6 text-start  mb-4 mt-5">
                        <label for="exampleInputEmail1" class="form-label">Código de descuento?</label>
                        <input type="text" placeholder="12345" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                </form>

                <div class="d-flexinfor">
                    <img class="entrega" src="assets/img/icons/entrega-rapida.png" alt="">
                    <p>Envió rápido! 1
                        día o antes!</p>
                </div>

                <hr>

                <div class="d-flexinfor">
                    <img class="garantia" src="assets/img/icons/certificado-de-garantia.png" alt="">
                    <p>1 Año de
                        garantia</p>
                </div>


            </div>
        </div>
    </section>







</main>

@include("partials.footer")
@endsection
