@extends("layouts.main") @section("content")
<div class="header-two">@include("partials.header")</div>
<main class="">
    <section class="container p-50" id="dev-area">
        <div class="car" v-cloak>
            <div class="card-body">
                <div class="title__general title__general2 fadeInUp wow animated title__general_flex">
                    <p class="m-0">Perfil</p>


                </div>
                <div class="main-perfil">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="perfil-tab" data-bs-toggle="tab" data-bs-target="#perfil" type="button" role="tab" aria-controls="perfil" aria-selected="true">
                                <img class="icon-perfil" src="{{ url('assets/img/icons/user.png') }}" alt="Imagen de usuario" />

                                Perfil
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="comprass-tab" data-bs-toggle="tab" data-bs-target="#comprass" type="button" role="tab" aria-controls="comprass" aria-selected="false">
                                <img class="icon-perfil" src="{{ url('assets/img/icons/bag.png') }}" alt="Imagen de usuario" />
                                Compras
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="perfil-tab">
                            <div>
                                <h5 class="mb-4 weight">Datos de la cuenta</h5>
                                <div class="form-perfil">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="email">Nombre</label>
                                                <input placeholder="pedro perez" type="text" v-model="name" autocomplete="off" class="form-control" id="email" aria-describedby="emailHelp" />
                                                <i class="fa fa-user icon_form"></i>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="identification">Identificación</label>

                                                <input placeholder="Dirección" type="text" class="form-control" id="identification" v-model="identification" @keypress="isNumber($event)" />
                                                <i class="fa fa-globe icon_form"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group mb-4">
                                                <label for="email">Email</label>
                                                <input placeholder="pedroperez@gmail.com" type="email" autocomplete="off" class="form-control" id="text" aria-describedby="emailHelp" v-model="email" :readonly="true" />
                                                <i class="fa fa-envelope icon_form"></i>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="telephone">Teléfono</label>

                                                <input placeholder="+1234567" type="text" class="form-control  " id="telephone" v-model="telephone" @keypress="isNumber($event)">
                                                <i class="fa fa-phone icon_form"></i>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <h5 class="mb-4 weight">Datos de envío</h5>
                                <div class="form-perfil">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Dirección</label>

                                                <input placeholder="Dirección" type="text" class="form-control" id="address" v-model="address" />
                                                <i class="fa fa-globe icon_form"></i>
                                            </div>
                                        </div>


                                        <div class="col-md-6 text-start mb-4">
                                            <label for="exampleInputEmail1" class="form-label">Ciudad</label>
                                            <input type="email" placeholder="alguna dirección" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                                            <small></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type=" button" class="btn btn-reds txt-w" @click="update()">
                                        Actualizar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="comprass" role="tabpanel" aria-labelledby="compras-tab">

                            <table class="table table-borderless mt-5">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">
                                            <i class="far fa-calendar-alt ml-3"></i>Fecha
                                        </th>
                                        <th scope="col">
                                            <i class="fas fa-shopping-bag ml-3"></i>Producto
                                        </th>
                                        <th scope="col">$ Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Orden 1</th>
                                        <td>04/12/2021</td>
                                        <td>Producto</td>
                                        <td>$10.000</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Orden 2</th>
                                        <td>04/12/2021</td>
                                        <td>Producto</td>
                                        <td>$10.000</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Orden 3</th>
                                        <td>04/12/2021</td>
                                        <td>Producto</td>
                                        <td>$10.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
    </section>



    </div>
    </div>
    </section>
</main>
<style>
    .breadcrumbs {
        margin-left: 0rem;
    }
</style>
@include("partials.footer") @endsection @push("scripts")

<script>
    const devArea = new Vue({
        el: "#dev-area",
        data() {
            return {
                name: "{{ Auth::user()->name }}",
                email: "{{ Auth::user()->email }}",
                address: "{{ Auth::user()->address }}",
                telephone: "{{ Auth::user()->phone }}",
                identification: "{{ Auth::user()->identification }}",

                shoppings: [],
                shopping: "",

            };
        },
        methods: {
            update() {
                axios
                    .post("{{ url('/perfil/update') }}", {
                        name: this.name,
                        address: this.address,
                        phone: this.telephone,
                        identification: this.identification,
                    })
                    .then((res) => {
                        if (res.data.success == true) {
                            alertify.success(res.data.msg);
                        } else {
                            alertify.error(res.data.msg);
                        }
                    })
                    .catch((err) => {
                        $.each(err.response.data.errors, function(key, value) {
                            alertify.error(value[0]);
                            //alertify.error(value);
                            //alertify.alert('Basic: true').set('basic', true);
                        });
                    });
            },
            isNumber: function(evt) {
                evt = evt ? evt : window.event;
                var charCode = evt.which ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    evt.preventDefault();
                } else {
                    return true;
                }
            },



        },
        mounted() {},
    });
</script>

@endpush
