@include("partials.loader")
<header>
    <div class="main-header">
        <div class="header-item">
            <div class="menu-trigger">
                <div class="bars"><span></span><span></span><span></span></div>
                <p>MENU</p>
                <div class="menu">
                    <ul>
                        <li>
                            <p>Lorem ipsum</p>
                        </li>
                        <li>
                            <p>Lorem ipsum</p>
                        </li>
                        <li>
                            <p>Lorem ipsum</p>
                        </li>
                        <li>
                            <p>Lorem ipsum</p>
                        </li>
                        <li>
                            <p>Lorem ipsum</p>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="" class="phone ml10 none-xs" data-aos="fade-up" data-aos-duration="1500"> <img src="{{ url('assets/img/icons/smartphone.png') }}" alt=""></a>
        </div>
        <div class="header-item mt-0">
            <a href="/"> <img class="logo" src="{{ url('assets/img/icons/logo.png') }}" alt="" />
            </a>
        </div>
        <div class="header-item flex-m">
            <a data-bs-toggle="modal" data-bs-target=".login" class="m-3" data-aos="fade-up" data-aos-duration="1200"><img class="user1" src="{{ url('assets/img/icons/user1.png') }}" alt=""></a>
            <a href="" class="m-3" data-aos="fade-up" data-aos-duration="1500"><img class="bag" src="{{ url('assets/img/icons/bag.png') }}" alt=""></a>
        </div>
    </div>
</header>

<!-- Modal -->
<div class="modal fade login style-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="{{ route('social.auth.facebook') }}" class="rrs-face"> <img src="{{ url('assets/img/icons/facebook.png') }}" alt=""> Facebook</button></a>
                                <a href="{{ route('social.auth.google') }}" class="rrs-google"> <img src="{{ url('assets/img/icons/google.png') }}" alt=""> Google</button></a>
                            </div>
                            <p class="line">Continuar con mi email</p>
                            <form class="form-login">
                                <div class="row">

                                    <div class="col-md-12 text-start  mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" placeholder="familia@gmail.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-md-12 text-start  mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                                        <input placeholder="" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-reds txt-w">Iniciar sesion</button>
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
<div class="modal fade registro  style-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <button class="rrs-face"> <img src="{{ url('assets/img/icons/facebook.png') }}" alt=""> Facebook</button>
                                <button class="rrs-google"> <img src="{{ url('assets/img/icons/google.png') }}" alt=""> Google</button>
                            </div>
                            <p class="line">Continuar con mi email</p>
                            <form class="form-login">
                                <div class="row">
                                    <div class="col-md-6 text-start">
                                        <label for="nombre" class="form-label">Nombre y apellido</label>
                                        <input type="text" class="form-control" id="nombre" aria-describedby="">
                                    </div>
                                    <div class="col-md-6 text-start  mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" placeholder="familia@gmail.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-md-6 text-start  mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                                        <input placeholder="" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-md-6 text-start  mb-4">
                                        <label for="exampleInputEmail1" class="form-label">Confirmar Contraseña</label>
                                        <input placeholder="" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-reds txt-w">Registrarme</button>
                            </form>
                            <div class="account-txt mt-4">
                                <a href="" class="">¿Ya tienes cuenta? <br>
                                    Iniciar sesion</a>
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
