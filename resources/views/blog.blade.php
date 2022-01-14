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
        <p><span><a href="/">Inicio </a>></span> Blog</p>
    </div>

    <section>
        <h2 class="mt-0 titles  mb-5 text-start" data-aos="fade-up" data-aos-duration="1300">
            Más recientes</h2>

        <div class="parent-blog">
            <div class=" blog-item" data-bs-toggle="modal" data-bs-target=".modal-blog">
                <img src="{{ url('assets/img/stock/Tienda Virtual Boutique.jpg') }}" alt="">
                <div class="mt-3">
                    <h2>Titulo del articulo
                    </h2>
                    <div class="fecha-blog">
                        <span><i class="far fa-calendar-alt"></i>04/01/2022</span>
                    </div>
                </div>
            </div>
            <div class="blog-item" data-bs-toggle="modal" data-bs-target=".modal-blog">
                <img src="{{ url('assets/img/stock/Tienda Virtual Boutique.jpg') }}" alt="">
                <div class="mt-3">
                    <h2>Titulo del articulo
                    </h2>
                    <div class="fecha-blog">
                        <span><i class="far fa-calendar-alt"></i>04/01/2022</span>
                    </div>
                </div>
            </div>
            <div class=" blog-item" data-bs-toggle="modal" data-bs-target=".modal-blog">
                <img src="{{ url('assets/img/stock/Tienda Virtual Boutique.jpg') }}" alt="">
                <div class="pt-3 pb-3">
                    <h2>Titulo del articulo
                    </h2>
                    <div class="fecha-blog">
                        <span><i class="far fa-calendar-alt"></i>04/01/2022</span>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

            </div>
        </div>

    </section>

    <hr>

    <section class="post">
        <div class="row">
            <div class="col-md-4">
                <div class=" blog-item" data-bs-toggle="modal" data-bs-target=".modal-blog">
                    <img src="{{ url('assets/img/stock/Tienda Virtual Boutique.jpg') }}" alt="">
                    <div class="pt-3 pb-3">
                        <h2 class="titulos">Titulo del articulo
                        </h2>
                        <div class="fecha-blog">
                            <span><i class="far fa-calendar-alt"></i>04/01/2022</span>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

                </div>
            </div>
            <div class="col-md-4">
                <div class=" blog-item" data-bs-toggle="modal" data-bs-target=".modal-blog">
                    <img src="{{ url('assets/img/stock/Tienda Virtual Boutique.jpg') }}" alt="">
                    <div class="pt-3 pb-3">
                        <h2 class="titulos">Titulo del articulo
                        </h2>
                        <div class="fecha-blog">
                            <span><i class="far fa-calendar-alt"></i>04/01/2022</span>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

                </div>
            </div>
            <div class="col-md-4">
                <div class=" blog-item" data-bs-toggle="modal" data-bs-target=".modal-blog">
                    <img src="{{ url('assets/img/stock/Tienda Virtual Boutique.jpg') }}" alt="">
                    <div class="pt-3 pb-3">
                        <h2 class="titulos">Titulo del articulo
                        </h2>
                        <div class="fecha-blog">
                            <span><i class="far fa-calendar-alt"></i>04/01/2022</span>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

                </div>
            </div>
        </div>
    </section>
</main>







<!-- Modal -->
<div class="modal fade modal-blog" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class=" blog-item" >
                <img src="{{ url('assets/img/stock/Tienda Virtual Boutique.jpg') }}" alt="">
                <div class="mt-3">
                    <h2>Titulo del articulo
                    </h2>
                    <div class="fecha-blog">
                        <span><i class="far fa-calendar-alt"></i>04/01/2022</span>
                    </div>
                </div>
            </div>

            </div>

        </div>
    </div>
</div>
@include("partials.footer")
@endsection
