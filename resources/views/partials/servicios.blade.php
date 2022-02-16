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
            <div class="servicios-content pt-0 p-3 ">
                <h3 data-aos="fade-up" data-aos-duration="1200">﻿Clínica 24 Horas</h3>
                <p class="sub" data-aos="fade-up" data-aos-duration="1300">¡Urgencia 24 horas! ¡Llámanos ya! </p>
                <p class="fw-300"><i class="fas fa-map-marker-alt pin"></i>Carrera 7 # 140 - 71 C.C. Belmira Plaza</p>

                <div class="slider-servicio container mb-4 " data-aos="fade-up-left" data-aos-duration="1300">
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/peluquería_SPAAromaterapiaymasajesderelajación.jpg') }}" alt="Imagen de mascota en consulta">
                        <p>Consultas</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/servicio/Hospitalizació.jpg') }}" alt="Imagen de laboratorio de hospitallizacion">
                        <p>Hospitalización</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/servicio/uci.jpg') }}" alt="imagen laboratorio de UCI">
                        <p>UCI</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/servicio/RayosXI.jpg') }}" alt="Imagen de Laboratorio de rayos x">
                        <p>Rayos X</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/servicio/CirugíaQuirofano.jpg') }}" alt="Imagen de  Cirugía Quirofano">
                        <p>Cirugías</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/servicio/LaboratorioClínico1.jpg') }}" alt="Imagen de laboratorio clinico">
                        <p>Laboratorio</p>
                    </div>
                </div>
                <div class="btns-conetnt">
                    <button class="btn-reds"><a href="https://api.whatsapp.com/send?phone=+573014739866&text=Hola!%20quiero%20informaci%C3%B3n%20acerca%20de%20la%20clinica%2024horas" target="_blank">﻿Generar cita/Llamar </a></button>
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
                            nuestras muestras y la de nuestros aliados</button>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="service1" role="tabpanel" aria-labelledby="home-tab">
                        <img src="assets/img/stock/Hospitalizaciónhospitalizaciónycuidadosintensivos.jpg" alt="Imagen de Hospitalización hospitalización y cuidadosintensivos">
                    </div>
                    <div class="tab-pane fade" id="service2" role="tabpanel" aria-labelledby="profile-tab">
                        <img src="assets/img/stock/Hospitalización y cuidados intensivos (1).jpg" alt="Imagen de Hospitalización y cuidados intensivos">
                    </div>
                    <div class="tab-pane fade" id="service3" role="tabpanel" aria-labelledby="contact-tab">
                        <img src="assets/img/stock/Digitalización (2) (1).jpg" alt="Immagen de digitalizacion">
                    </div>
                    <div class="tab-pane fade" id="service4" role="tabpanel" aria-labelledby="contact-tab">
                        <img src="assets/img/stock/Ecografía.jpg" alt="Imagen de ecografia">
                    </div>
                    <div class="tab-pane fade" id="service5" role="tabpanel" aria-labelledby="contact-tab">
                        <img src="assets/img/stock/Endoscopio .jpg" alt="Imagen de endoscopio">
                    </div>
                    <div class="tab-pane fade" id="service6" role="tabpanel" aria-labelledby="contact-tab">
                        <img src="assets/img/servicio/CirugíaQuirofano.jpg" alt="Imagen de quirofano">
                    </div>
                    <div class="tab-pane fade" id="service7" role="tabpanel" aria-labelledby="contact-tab">
                        <img src="assets/img/stock/Laboratorio Clínico (4).jpg" alt="Imagen de Laboratorio Clínico">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-------------------------servicio 2---------------------------------->
    <div id="peluqueria" class="row conetnt-serivicios">
        <div class="col-md-6 p-0">
            <div class="servicios-content p-5 pt-3 servicios-content-bg">
                <h3 data-aos="fade-up" data-aos-duration="1200">Peluquería & Spa</h3>
                <p class="sub" data-aos="fade-up" data-aos-duration="1300">Servicios de L a D: 9 AM - 5 PM <br>
                Abrimos Domingos & Festivos</p>
                <p class="fw-300"><i class="fas fa-map-marker-alt pin"></i>Carrera 7 # 140 - 71 C.C. Belmira Plaza</p>


                <div class="slider-servicio-img container mb-5 p-0" data-aos="fade-up" data-aos-duration="1300">
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/Peluquería _ SPA corte de uñas.jpg') }}" alt="Imagen de corte de uñas en mascotas">
                        <p>Corte y limado de uñas</p>
                    </div>
                    <div class="servicios-imgs">
                        <img class="opf" src="{{ url('assets/img/stock/Peluquería _ SPA Hidromaajeadora.jpg') }}" alt="Imagen de Hidromaajeadora">
                        <p>Baño especial</p>
                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/stock/peluquería_SPAAromaterapiaymasajesderelajación.jpg') }}" alt="">
                        <p>Aromaterapia</p>
                    </div>
                    <div class="servicios-imgs">
                        <img class="opf" src="{{ url('assets/img/stock/Pelquería _ Spa limpieza oídos.jpg') }}" alt="">
                        <p>Reiki</p>
                    </div>

                </div>
                <div class="btns-conetnt">

                    <button class="btn-reds">

                    <a href="https://api.whatsapp.com/send?phone=+573014739866&text=Hola!%20quiero%20informaci%C3%B3n%20acerca%20de%20Peluqueria%20y%20Spa" target="_blank">Reservar ya</a>
                    </button>
                    <!--- <button class="btn-white see-more-2">Ver más</button>--->
                </div>
            </div>
        </div>
        <div class="col-md-6 p-0 center-ser flex-column">
            @if(App\Models\ImageService::first()->type2 == "image")
            <img class="obj-cover h-63" src="{{ App\Models\ImageService::first()->image2 }}" alt="">
            @else
            <video class="w-100" controls>
                <source src="{{ App\Models\ImageService::first()->image2 }}" type="video/mp4">
                <source src="{{ App\Models\ImageService::first()->image2 }}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            @endif

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
        <div class="col-md-6 p-0  bg-grays">
            <div class="servicios-content p-5 pb-0 bg-grays">
                <h3>Colegio Y Hotel para Perros
                </h3>
                <p class="sub"><i class="fas fa-map-marker-alt pin"></i>Únicamente en la Sede de
                    la Calle 103 # 14A 10</p>

                <div class="slider-servicio container mb-2">
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/servicio/Colegio   hotel 2.jpg') }}" alt="Imagen de Colegio  para perros">

                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/servicio/Colegio   Hotel.jpg') }}" alt="Imagen de Colegio  para perros">

                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/servicio/Colegio (1).jpg') }}" alt="Imagen de Colegio  para perros">

                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/servicio/Colegio.jpg') }}" alt="Imagen de Colegio  para perros">

                    </div>

                </div>

            </div>

            <!--------------service ct----------->
            <div class="servicios-content p-5 pt-0 bg-grays">
                <h3>Hotel para Gatos

                </h3>

                <div class="slider-servicio container mb-4">

                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/servicio/hotel gatos 5.jpg') }}" alt="Imagen de hotel gatos">

                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/servicio/Hotel gatos 2.jpg') }}" alt="Imagen de hotel gatos">

                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/servicio/Hotel Gatos.jpg') }}" alt="Imagen de hotel gatos">

                    </div>
                    <div class="servicios-imgs">
                        <img src="{{ url('assets/img/servicio/Hotel gatos 3.jpg') }}" alt="Imagen de hotel gatos">

                    </div>

                </div>
                <div class="btns-conetnt">

                    <button class="btn-reds"> <a href="https://api.whatsapp.com/send?phone=+573134104553&text=Hola!%20quiero%20informaci%C3%B3n%20acerca%20de%20el%20hotel%20para%20mascotas" target="_blank">Reservar ya </a> </button>
                    <button class="btn-white see-more-3">Ver más</button>
                </div>
            </div>
        </div>
        <div class="bg-infos">
            <div class="more-info-service-3 col-md-12">

                <ul class="nav nav-tabs p-5 pt-2" id="myTab" role="tablist">
                    <h4>Colegio Y Hotel para Perros
                    </h4>
                    <li class="nav-item mt-4 mb-3" role="presentation">
                   • Monitoreo las 24 horas mediante cámaras para
                            que observes en tiempo real lo que tu mascota
                            está haciendo
                    </li>
                    <li class="nav-item mb-3" role="presentation">
                      • Caminatas en el parque
                    </li>
                    <li class="nav-item mb-3" role="presentation">
                      • Volvemos al origen de la manada, tu mascota
                            compartirá con otros perros para trabajar en
                            la socialización
                    </li>

                    <li class="nav-item mb-3" role="presentation">
                       • Supervisión médica las 24 horas
                    </li>
                    <li class="nav-item mb-3" role="presentation">
                     • Entrenamiento de comandos básicos y
                            obediencia
                    </li>
                    <li class="nav-item mb-3" role="presentation">
                   • Además, tendremos sesiones de reiki,
                            aromaterapia, musicoterapia y pilates
                    </li>


                    <!------------------------------------->
                    <h4 class="pb-2 pt-5 mt-5">Hotel para Gatos
                    </h4>
                    <li class="nav-item mb-3" role="presentation">
                     • Monitoreo las 24 horas mediante cámaras para
                            que observes en tiempo real lo que tu mascota
                            está haciendo
                    </li>
                    <li class="nav-item mb-3" role="presentation">
                      • Gateras individuales de piso a techo con más
                            de 12 juegos de interacción en cada unao
                    </li>
                    <li class="nav-item mb-3" role="presentation">
                   • Supervisión médica las 24 horas

                    </li>
                    <li class="nav-item mb-3" role="presentation">
                      • Utilización de aromaterapia y uso de
                            feromonas para que tus gatos estén lo más
                            tranquilos posibles


                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="service1" role="tabpanel" aria-labelledby="home-tab">
                        <img src="assets/img/servicio/Hotel.jpg" alt="">
                    </div>

                    <div class="tab-pane fade show active mt-4" id="" role="tabpanel" aria-labelledby="home-tab">
                        <img src="assets/img/servicio/Trotadora.jpg" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>




</section>
