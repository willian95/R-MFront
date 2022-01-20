@extends("layouts.main")
@section("content")
<div class="header-two">
    @include("partials.header")
</div>

<main class="">
    <div class="mt-9">
        @include("partials.categorias")
    </div>
    <div class="container">
        <div class="breadcrumbs">
            <p><span><a href="/">Inicio </a>></span> Acerca</p>
        </div>


        <section>
            <div class="about">
                <img class="img-about" src="{{ url('assets/img/stock/hojainicio.jpg') }}" alt="Imagen de laboratorio de hospitallizacion">
                <p data-aos="fade-up" data-aos-duration="1000">Somos una empresa familiar enamorados de los animales y
                    trabajamos a diario para garantizar la salud y bienestar
                    de las mascotas a través de un equipo humano altamente
                    capacitado y con vocación de servicio y equipos de última
                    tecnología</p>

                <div class="row team" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-3">
                        <img class="img-about" src="{{ url('assets/img/stock/Pelquería _ Spa limpieza oídos.jpg') }}" alt="Imagen de laboratorio de hospitallizacion">

                    </div>
                    <div class="col-md-3">
                        <img class="img-about" src="{{ url('assets/img/stock/Pelquería _ Spa limpieza oídos.jpg') }}" alt="Imagen de laboratorio de hospitallizacion">

                    </div>
                    <div class="col-md-3">
                        <img class="img-about" src="{{ url('assets/img/stock/Pelquería _ Spa limpieza oídos.jpg') }}" alt="Imagen de laboratorio de hospitallizacion">

                    </div>
                    <div class="col-md-3">
                        <img class="img-about" src="{{ url('assets/img/stock/Pelquería _ Spa limpieza oídos.jpg') }}" alt="Imagen de laboratorio de hospitallizacion">

                    </div>
                </div>
            </div>
        </section>
    </div>



</main>
<style>
    .breadcrumbs {

    margin-left: 0rem;
}
</style>
@include("partials.footer")
@endsection
