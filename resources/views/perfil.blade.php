@extends("layouts.main")
@section("content")
<div class="header-two">
    @include("partials.header")
</div>

<main class="">

    <div class="container">
        <div class="breadcrumbs">
            <p><span><a href="/">Inicio </a>></span> Perfil</p>
        </div>


        <section class="main-perfil">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="perfil-tab" data-bs-toggle="tab" data-bs-target="#perfil" type="button" role="tab" aria-controls="perfil" aria-selected="true">
                        <img class="icon-perfil" src="{{ url('assets/img/icons/user.png') }}" alt="Imagen de usuario">

                        Perfil</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="comprass-tab" data-bs-toggle="tab" data-bs-target="#comprass" type="button" role="tab" aria-controls="comprass" aria-selected="false">
                        <img class="icon-perfil" src="{{ url('assets/img/icons/bag.png') }}" alt="Imagen de usuario">
                        Compras</button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="perfil-tab">
                    <div>
                        <h3>Datos de la cuenta </h3>
                        <form class="form-perfil">
                            <div class="row">
                                <div class="col-md-6 text-start">
                                    <label for="nombre" class="form-label">Nombre y apellido</label>
                                    <input type="text" class="form-control" id="nombre" aria-describedby="">
                                    <small v-if="errors.hasOwnProperty('name')"></small>
                                </div>
                                <div class="col-md-6 text-start  mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" placeholder="familia@gmail.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="email">
                                    <small v-if="errors.hasOwnProperty('email')"></small>
                                </div>
                                <div class="col-md-6 text-start  mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Teléfono</label>
                                    <input type="email" placeholder="55567345" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="phone">
                                    <small v-if="errors.hasOwnProperty('phone')"></small>
                                </div>


                                <div class="col-md-6 text-start  mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                                    <input placeholder="" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small></small>
                                </div>
                                <div class="col-md-6 text-start  mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Confirmar Contraseña</label>
                                    <input placeholder="" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" ">
                                    </div>


                                </div>

                        </form>


                        <h3>Datos de envío </h3>
                        <form class=" form-perfil">
                                    <div class="row">

                                        <div class="col-md-6 text-start  mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Dirección</label>
                                            <input type="email" placeholder="alguna dirección" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            <small></small>
                                        </div>
                                        <div class="col-md-6 text-start  mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Ciudad</label>
                                            <input type="email" placeholder="alguna dirección" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            <small></small>
                                        </div>


                                    </div>

                        </form>
                        <div class="text-center">
                            <button type=" button" class="btn btn-reds txt-w" >Actualizar</button>
                        </div>
                    </div>


                </div>


                <div class="tab-pane fade" id="comprass" role="tabpanel" aria-labelledby="compras-tab">..compras.</div>

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
