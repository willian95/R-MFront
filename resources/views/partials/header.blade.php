@include("partials.loader")
<header>
    <div class="main-header">
        <div class="header-item justify-content-between">
            <div class="menuz">Menu</div>
            <div class="menu-trigger">
                <div class="bars"><span></span><span></span><span></span></div>
                <p>MENU</p>
                <div class="menu">
                    <ul>
                        <li>
                            <a href="acerca">
                                <p>Acerca</p>
                            </a>
                        </li>
                        <li>
                            <a href="#veterinaria">
                                <p>Veterinaria</p>
                            </a>
                        </li>
                        <li>
                            <a href="#peluqueria">
                                <p>Peluqueria & Spa</p>
                            </a>
                        </li>
                        <li>
                            <a href="#colegio">
                                <p>Colegio</p>
                            </a>
                        </li>
                        <li>
                            <a href="tienda">
                                <p>Tienda Virtual</p>
                            </a>
                        </li>
                        <li>
                            <a href="blog">
                                <p>Blog</p>
                            </a>
                        </li>

                        <li class="mt-3 mb-4 redes-nav">
                            <a href="https://www.facebook.com/RyMveterinaria/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/rymveterinaria/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-whatsapp"></i></a>
                        </li>
                        <li>
                            <p class="copy-nav">Copyright © 2022 . All rights reserved

                            </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="center-rrss nav-xs">
                <a href="" data-bs-toggle="modal" data-bs-target=".pwa-modal" class="phone none-xs" data-aos="fade-up" data-aos-duration="1500"> <img class="parpadea" src="{{ url('assets/img/icons/mobile-phone.png') }}" alt="Icono de telefono">Instala la App </a>
                <div class="redes-nav-logo">
                    <a href="https://www.facebook.com/RyMveterinaria/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/rymveterinaria/" target="_blank"><i class="fab fa-instagram"></i></a>

                </div>
            </div>
        </div>
        <div class="header-item mt-0">
            <a href="/"> <img class="logo" src="{{ url('assets/img/icons/logo.png') }}" alt="Logo de R&M" />
            </a>
        </div>
        <div class="header-item flex-m">
            <a href="#contacto" class="name-nav nav-xs job-txt">Trabaja con nosotros</a>
            @if(\Auth::check())
            <div class="dropdown">
                <a class="btn dropdown-toggle m-3 name-nav p-0 m-0" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  <!--  <span class="nav-xs">{{ \Auth::user()->name }}</span>--->
<!----<img class="user2" src="{{ url('assets/img/icons/account.png') }}" alt="icono de usuario">-->
                    <img class="user1" src="{{ url('assets/img/icons/account.png') }}" alt="icono de usuario">
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="perfil">Perfil</a></li>

                    <li><a class="dropdown-item" href="/logout">Cerrar sesión</a></li>

                </ul>
            </div>


            @else
            <a data-bs-toggle="modal" data-bs-target=".login" class="m-3" data-aos="fade-up" data-aos-duration="1200"><img class="user1" src="{{ url('assets/img/icons/account.png') }}" alt="icono de usuario"></a>
            @endif
            <a href="{{ url('/checkout') }}" class="m-3" data-aos="fade-up" data-aos-duration="1500"><img class="bag" src="{{ url('assets/img/icons/bag-menu.png') }}" alt="icono de carrito"></a>
        </div>
    </div>
</header>

<!-- Modal -->
<div class="modal fade login style-modal" id="dev-login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


                <div class="row">
                    <div class="col-md-6 pb-4 pt-4">
                        <div class="login-content">
                            <h2>Iniciar sesión con:

                            </h2>
                            <div class="rss-login">
                                <a href="{{ route('social.auth.facebook') }}" class="rrs-face"> <img src="{{ url('assets/img/icons/facebook.png') }}" alt="icono de facebook"> Facebook</button></a>
                                <a href="{{ route('social.auth.google') }}" class="rrs-google"> <img src="{{ url('assets/img/icons/google.png') }}" alt="icono de google"> Google</button></a>
                            </div>
                            <p class="line">Continuar con mi email</p>
                            <form class="form-login">
                                <div class="row">

                                    <div class="col-md-12 text-start  mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" placeholder="familia@gmail.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="email">
                                    </div>
                                    <div class="col-md-12 text-start  mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                                        <input placeholder="" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="password">
                                    </div>


                                </div>
                                <button type="button" class="btn btn-reds txt-w" @click="login()">Iniciar sesión</button>
                            </form>
                            <div class="account-txt mt-4">
                                <a data-bs-toggle="modal" data-bs-target=".registro" href="" class="">¿Aún no tienes cuenta? <br>
                                    ¡Registrate!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 bg-modal" style="background-image: url(assets/img/stock/hojainicio.jpg);"></div>

                </div>
            </div>

        </div>
    </div>
</div>




<!-- registro -->
<div class="modal fade registro  style-modal" id="dev-register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="row">
                    <div class="col-md-6 pb-4 pt-4">
                        <div class="login-content">
                            <h2>Registrate
                            </h2>
                            <div class="rss-login">
                                <button class="rrs-face"> <img src="{{ url('assets/img/icons/facebook.png') }}" alt="icono facebook"> Facebook</button>
                                <button class="rrs-google"> <img src="{{ url('assets/img/icons/google.png') }}" alt="icono google"> Google</button>
                            </div>
                            <p class="line">Continuar con mi email</p>
                            <form class="form-login">
                                <div class="row">
                                    <div class="col-md-6 text-start">
                                        <label for="nombre" class="form-label">Nombre y apellido</label>
                                        <input type="text" class="form-control" id="nombre" aria-describedby="" v-model="name">
                                        <small v-if="errors.hasOwnProperty('name')">@{{ errors['name'][0] }}</small>
                                    </div>
                                    <div class="col-md-6 text-start  mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" placeholder="familia@gmail.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="email">
                                        <small v-if="errors.hasOwnProperty('email')">@{{ errors['email'][0] }}</small>
                                    </div>
                                    <div class="col-md-6 text-start  mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Teléfono</label>
                                        <input type="email" placeholder="55567345" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="phone">
                                        <small v-if="errors.hasOwnProperty('phone')">@{{ errors['phone'][0] }}</small>
                                    </div>
                                    <div class="col-md-6 text-start  mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Identificación</label>
                                        <input type="email" placeholder="123456" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="identification">
                                        <small v-if="errors.hasOwnProperty('identification')">@{{ errors['identification'][0] }}</small>
                                    </div>
                                    <div class="col-md-6 text-start  mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Dirección</label>
                                        <input type="email" placeholder="alguna dirección" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="address">
                                        <small v-if="errors.hasOwnProperty('address')">@{{ errors['address'][0] }}</small>
                                    </div>
                                    <div class="col-md-6 text-start  mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                                        <input placeholder="" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="password">
                                        <small v-if="errors.hasOwnProperty('password')">@{{ errors['password'][0] }}</small>
                                    </div>
                                    <div class="col-md-6 text-start  mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Confirmar Contraseña</label>
                                        <input placeholder="" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="password_confirmation">
                                    </div>


                                </div>
                                <button type="button" class="btn btn-reds txt-w" @click="signup()">Registrarme</button>
                            </form>
                            <div class="account-txt mt-4">
                                <a href="" class="">¿Ya tienes cuenta? <br>
                                    Iniciar sesión</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 bg-modal" style="background-image: url(assets/img/stock/tiendavirtual.jpg);">
                        <div class="overlay-modal">
                            <h3>
                                Haz parte de la familia <br>
                                R&M
                            </h3>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


@push("scripts")
<script src="{{ asset('/js/app.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    const register = new Vue({
        el: '#dev-register',
        data() {
            return {
                name: "",
                email: "",
                phone: "",
                identification: "",
                address: "",
                password: "",
                password_confirmation: "",
                errors: []
            }
        },
        methods: {

            async signup() {

                this.errors = []

                try {

                    let response = await axios.post("{{ url('/register') }}", {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation,
                        phone: this.phone,
                        identification: this.identification,
                        address: this.address
                    })

                    if (response.data.success == true) {
                        swal({
                            title: "Excelente!",
                            text: response.data.msg,
                            icon: "success"
                        });
                        this.name = ""
                        this.email = ""
                        this.password = ""
                        this.password_confirmation = ""
                        this.phone = ""
                        this.identification = ""
                        this.address = ""
                    } else {
                        swal({
                            text: response.data.msg,
                            icon: "error"
                        })
                    }

                } catch (err) {

                    this.errors = err.response.data.errors

                }
            },



        },
        created() {

        }
    });
</script>

<script>
    const login = new Vue({
        el: '#dev-login',
        data() {
            return {
                email: "",
                password: "",
                errors: []
            }
        },
        methods: {

            async login() {

                this.errors = []

                try {

                    let response = await axios.post("{{ url('/login') }}", {
                        email: this.email,
                        password: this.password,
                    })

                    if (response.data.success == true) {
                        window.location.reload()
                    } else {
                        swal({
                            text: response.data.msg,
                            icon: "error"
                        })
                    }

                } catch (err) {

                    this.errors = err.response.data.errors

                }
            },



        },
        created() {

        }
    });
</script>

@endpush
