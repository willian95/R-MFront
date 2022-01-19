<section class="servicios">
    <h2 class="mt-0 titles mt-5 mb-5">Nuestros Servicios</h2>
    <!-------------------------servicio 1---------------------------------->
    <div id="veterinaria" class="row">
        <div class="col-md-6 p-0">
            @if(App\Models\ImageService::first()->type1 == "image")
            <img class="obj-cover h-60" src="{{ App\Models\ImageService::first()->image1 }}" alt="">
            @else
            <video class="w-100 h-60" autoplay loop>
                <source src="{{ App\Models\ImageService::first()->image1 }}" type="video/mp4">
                <source src="{{ App\Models\ImageService::first()->image1 }}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            @endif
        </div>
        <div class="col-md-6">
            <div class="servicios-content pt-0 p-3 " >
                <h3 data-aos="fade-up" data-aos-duration="1200">﻿Clínica 24 Horas</h3>
                <p class="sub" data-aos="fade-up" data-aos-duration="1300">Urgencia? ﻿Llámanos
                    ya! contestamos en menos de 35 segundos!</p>
                <p class="fw-300"><i class="fas fa-map-marker-alt pin"></i>Carrera 7 # 140 - 71 C.C. Belmira Plaza</p>

                <div class="slider-servicio container mb-4 " data-aos="fade-up-left" data-aos-duration="1300">
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/Hospitalizaciónycuidadosintensivos.jpg') }}" alt="">
                        <p>Consultas</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/Hospitalización y cuidados intensivos (1).jpg') }}" alt="">
                        <p>Hospitalización</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/Hospitalizaciónycuidadosintensivos.jpg') }}" alt="">
                        <p>UCI</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/Rayos X.jpg') }}" alt="">
                        <p>Rayos X</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/Hospitalizaciónycuidadosintensivos.jpg') }}" alt="">
                        <p>Cirugías</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/Laboratorio Clínico (5).jpg') }}" alt="">
                        <p>Laboratorio</p>
                    </div>
                </div>
                <div class="btns-conetnt">

                    <button class="btn-reds">Generar cita</button>
                    <button class="btn-white see-more">Ver más</button>
                </div>
            </div>
        </div>
        <div class="bg-infos">
            <div class="more-info-service-1 col-md-12 ">
                <ul class="nav nav-tabs center-tbas" id="myTab" role="tablist">
                    <li class="nav-item mt-4" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#service1" type="button" role="tab" aria-controls="home" aria-selected="true">• Consultas y hospitalización 24 horas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#service2" type="button" role="tab" aria-controls="profile" aria-selected="false">• Unidad de cuidados intensivos e intermedios
                            con supervisión médica veterinaria 24 horas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service3" type="button" role="tab" aria-controls="contact" aria-selected="false">• Rayos X y digitalizador</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service4" type="button" role="tab" aria-controls="contact" aria-selected="false">• Ecografías</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service5" type="button" role="tab" aria-controls="contact" aria-selected="false">• Endoscopias y colonoscopia</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service6" type="button" role="tab" aria-controls="contact" aria-selected="false">• Cirugías</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service7" type="button" role="tab" aria-controls="contact" aria-selected="false">• Laboratorio clínico: Contamos con nuestro

propio laboratorio liderado por un
especialista en el área en donde procesamos
nuestras muestras y la de nuestros aliados!</button>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="service1" role="tabpanel" aria-labelledby="home-tab">
                        <img src="assets/img/stock/Hospitalización y cuidados intensivos (1).jpg" alt="">
                    </div>
                    <div class="tab-pane fade" id="service2" role="tabpanel" aria-labelledby="profile-tab">
                        <img src="assets/img/stock/Hospitalizaciónycuidadosintensivos.jpg" alt="">
                    </div>
                    <div class="tab-pane fade" id="service3" role="tabpanel" aria-labelledby="contact-tab">
                        <img src="assets/img/stock/Rayos X.jpg" alt="">
                    </div>
                    <div class="tab-pane fade" id="service4" role="tabpanel" aria-labelledby="contact-tab">
                        <img src="assets/img/stock/Ecografía.jpg" alt="">
                    </div>
                    <div class="tab-pane fade" id="service5" role="tabpanel" aria-labelledby="contact-tab">
                        <img src="assets/img/stock/Endoscopio .jpg" alt="">
                    </div>
                    <div class="tab-pane fade" id="service6" role="tabpanel" aria-labelledby="contact-tab">
                        <img src="assets/img/stock/Endoscopio .jpg" alt="">
                    </div>
                    <div class="tab-pane fade" id="service7" role="tabpanel" aria-labelledby="contact-tab">
                        <img src="assets/img/stock/Endoscopio .jpg" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-------------------------servicio 2---------------------------------->
    <div id="peluqueria" class="row conetnt-serivicios">
        <div class="col-md-6 p-0">
            <div class="servicios-content p-5 servicios-content-bg">
                <h3 data-aos="fade-up" data-aos-duration="1200">Peluquería & Spa</h3>
                <p class="sub" data-aos="fade-up" data-aos-duration="1300">Servicio de L a D: 9
                    AM - 5 PM <br>
                    Festivos: 9 AM - 2 PM!</p>
                <p class="fw-300"><i class="fas fa-map-marker-alt pin"></i>Carrera 7 # 140 - 71 C.C. Belmira Plaza</p>


                <div class="slider-servicio-img container mb-2 p-0" data-aos="fade-up" data-aos-duration="1300">
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/Peluquería _ SPA corte de uñas.jpg') }}" alt="">
                        <p>Corte</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/Peluquería _ SPA baño .jpg') }}" alt="">
                        <p>Aromaterapia</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/peluquería_SPAAromaterapiaymasajesderelajación.jpg') }}" alt="">
                        <p>Masajes</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/Pelquería _ Spa limpieza oídos.jpg') }}" alt="">
                        <p>Reiki</p>
                    </div>

                </div>
                <div class="btns-conetnt">

                    <button class="btn-reds">Reservar ya</button>
                   <!--- <button class="btn-white see-more-2">Ver más</button>--->
                </div>
            </div>
        </div>
        <div class="col-md-6 p-0 h-55 ">
        @if(App\Models\ImageService::first()->type2 == "image")
            <img class="obj-cover" src="{{ App\Models\ImageService::first()->image2 }}" alt="">
            @else
            <video class="w-100" controls>
                <source src="{{ App\Models\ImageService::first()->image2 }}" type="video/mp4">
                <source src="{{ App\Models\ImageService::first()->image2 }}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            @endif    <div class="bg-infos p-0">
                <div class="more-info-service-2 col-md-12 p-0">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="service1" role="tabpanel" aria-labelledby="home-tab">
                            <img class="img-service2" src="assets/img/stock/Peluquería _ SPA corte de uñas.jpg" alt="">
                        </div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item mt-4" role="presentation">

                            <p class="p-l2"> • Corte y limado de uñas <br>
                                • Enjuague bucal<br>
                                • Limpieza de oídos<br>
                                • Toallas desechables por mascota<br>
                                • Agua con control de temperatura<br>
                                • Shampoo especialmente elaborado para
                                mascotas<br>
                                • Corte característico por raza<br>
                                • Aromaterapia<br>
                                • Musicoterapia<br>
                                • Masajes de relajación<br>
                                • Reiki<br>
                                • Hidratación pulpejos</p><br>
                        </li>
                        <li class="nav-item" role="presentation">

                        </li>
                        <!---  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service3" type="button" role="tab" aria-controls="contact" aria-selected="false">• Rayos X y digitalizador</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service4" type="button" role="tab" aria-controls="contact" aria-selected="false">• Ecografías</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service5" type="button" role="tab" aria-controls="contact" aria-selected="false">• Endoscopias y colonoscopia</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service6" type="button" role="tab" aria-controls="contact" aria-selected="false">• Cirugías</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service7" type="button" role="tab" aria-controls="contact" aria-selected="false">• Cirugías</button>
                </li>--->
                    </ul>

                </div>
            </div>
            <div class="info-serv row center-ser p-4">
                <div class="col-md-6">
                    <ul>
                        <li>Corte y limado de uñas</li>
                        <li>Enjuague bucal</li>
                        <li>Limpieza de oídos</li>
                        <li>Toallas desechables por mascota</li>
                        <li>Agua con control de temperatura</li>
                        <li>Shampoo especialmente elaborado para mascotas</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li>Corte característico por raza</li>
                        <li>Aromaterapia</li>
                        <li>Musicoterapia</li>
                        <li>Masajes de relajación</li>
                        <li>Reiki</li>
                        <li>Hidratación pulpejos</li>
                    </ul>
                </div>
            </div>


        </div>

    </div>
    <!-------------------------servicio 3---------------------------------->
    <div id="colegio" class="row conetnt-serivicios ">
        <div class="col-md-6 p-0 ">
            @if(App\Models\ImageService::first()->type3 == "image")
            <img class="obj-cover" src="{{ App\Models\ImageService::first()->image3 }}" alt="peluquería _ SPA Aromaterapia y masajes de relajación">
            @else
            <video class="w-100" controls>
                <source src="{{ App\Models\ImageService::first()->image3 }}" type="video/mp4">
                <source src="{{ App\Models\ImageService::first()->image3 }}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            @endif
        </div>
        <div class="col-md-6 p-0  ">
            <div class="servicios-content p-5 pb-0 bg-grays">
                <h3>Colegio Y Hotel para Perros
                </h3>
                <p class="sub"><i class="fas fa-map-marker-alt pin"></i>Únicamente en la Sede de
                    la Calle 103 # 14A 10</p>

                <div class="slider-servicio container mb-2">
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/Tienda Virtual Boutique.jpg') }}" alt="">
                        <p>Monitoreo 24/7</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/Hospitalización y cuidados intensivos (1).jpg') }}" alt="">
                        <p>Caminatas</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/tiendavirtual.jpg') }}" alt="">
                        <p>Pilates</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/TiendavirtualPlacasidentificación.jpg') }}" alt="">
                        <p>Caminatas</p>
                    </div>

                </div>

            </div>

            <!--------------service ct----------->
            <div class="servicios-content p-5 pt-0 ">
                <h3>Hotel para Gatos

                </h3>

                <div class="slider-servicio container mb-2">

                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/Hospitalización y cuidados intensivos (1).jpg') }}" alt="">
                        <p>Monitoreo 24/7</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/tiendavirtual.jpg') }}" alt="">
                        <p>Aromaterapi</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/TiendavirtualPlacasidentificación.jpg') }}" alt="">
                        <p>Gateras Independiente</p>
                    </div>

                </div>
                <div class="btns-conetnt">

                    <button class="btn-reds">Generar cita</button>
                    <button class="btn-white see-more-3">Ver más</button>
                </div>
            </div>
        </div>
        <div class="bg-infos">
            <div class="more-info-service-3 col-md-12">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <h4>Colegio Y Hotel para Perros
                    </h4>
                    <li class="nav-item mt-4" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#service1" type="button" role="tab" aria-controls="home" aria-selected="true">• Monitoreo las 24 horas mediante cámaras para
                            que observes en tiempo real lo que tu mascota
                            está haciendo</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#service2" type="button" role="tab" aria-controls="profile" aria-selected="false">• Caminatas en el parque</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service3" type="button" role="tab" aria-controls="contact" aria-selected="false">• Volvemos al origen de la manada, tu mascota
                            compartirá con otros perros para trabajar en
                            la socialización</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service4" type="button" role="tab" aria-controls="contact" aria-selected="false">• Supervisión médica las 24 horas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service5" type="button" role="tab" aria-controls="contact" aria-selected="false">• Entrenamiento de comandos básicos y
                            obediencia</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service6" type="button" role="tab" aria-controls="contact" aria-selected="false">• Además, tendremos sesiones de reiki,
                            aromaterapia, musicoterapia y pilates!</button>
                    </li>


                    <!------------------------------------->
                    <h4 class="pb-2 pt-5">Hotel para Gatos
                    </h4>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service7" type="button" role="tab" aria-controls="contact" aria-selected="false">• Monitoreo las 24 horas mediante cámaras para
                            que observes en tiempo real lo que tu mascota
                            está haciendo</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service8" type="button" role="tab" aria-controls="contact" aria-selected="false">• Gateras individuales de piso a techo con más
                            de 12 juegos de interacción en cada unao</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service9" type="button" role="tab" aria-controls="contact" aria-selected="false">• Supervisión médica las 24 horas
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#service01" type="button" role="tab" aria-controls="contact" aria-selected="false">• Utilización de aromaterapia y uso de
                            feromonas para que tus gatos estén lo más
                            tranquilos posibles!

                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="service1" role="tabpanel" aria-labelledby="home-tab">
                        <img src="assets/img/stock/Hospitalización y cuidados intensivos (1).jpg" alt="">
                    </div>
                    <div class="tab-pane fade" id="service2" role="tabpanel" aria-labelledby="profile-tab">
                        <img src="assets/img/stock/Hospitalizaciónycuidadosintensivos.jpg" alt="">
                    </div>
                    <div class="tab-pane fade" id="service3" role="tabpanel" aria-labelledby="contact-tab">
                        <img style="" src="assets/img/stock/Rayos X.jpg" alt="">
                    </div>
                    <div class="tab-pane fade" id="service4" role="tabpanel" aria-labelledby="contact-tab">
                        <img src="assets/img/stock/Ecografía.jpg" alt="">
                    </div>
                    <div class="tab-pane fade" id="service5" role="tabpanel" aria-labelledby="contact-tab">
                        <img src="assets/img/stock/Endoscopio .jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>




</section>
