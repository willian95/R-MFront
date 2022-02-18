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
            <p><span><a href="/">Inicio </a>></span> C﻿onoce nuestro equipo</p>
        </div>


        <section class="mt-3">
            <div class="about">
              <div class="row">
                  <div class="col-md-6 about-flex">
                  <p data-aos="fade-up" data-aos-duration="1000">Somos una empresa familiar enamorada de los animales que trabajamos a diario para garantizar la salud y bienestar de las mascotas a través de un grupo humano altamente calificado, con vocación de servicio y equipos de última tecnología. Conoce nuestra familia de trabajo.</p>
                  </div>
                  <div class="col-md-6">
                  <img class="img-about" src="{{ url('http://imgfz.com/i/6CuhFKz.png') }}" alt="Imagen de laboratorio de hospitallizacion">
                  </div>
              </div>


                <div class="row team" data-aos="fade-up" data-aos-duration="1000">
                    @foreach(\App\Models\Staff::all() as $staff)
                    <div class="col-md-3">
                        <img class="img-about" src="{{ $staff->image }}" alt="{{ $staff->name }}">
                        <p style="margin-top: 5px; margin-bottom: -40px; padding: inherit;" class="text-center">{{ $staff->job }}</p>
                        <p class="text-center">{{ $staff->name }}</p>

                    </div>
                    @endforeach
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
