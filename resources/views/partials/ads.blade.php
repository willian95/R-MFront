<section class="ads container pt7">
    <div class="slider-adss">

        @foreach(App\Models\Banner::inRandomOrder()->get() as $banner)

        @if($banner->type == 'image')
        <a href="{{ $banner->link }}" target="_blank">
            <div class="" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ $banner->image }}" alt="Tienda virtual alimentos secos">
            </div>
        </a>
        @else
        <a href="{{ $banner->link }}" target="_blank">
            <div class="" data-aos="fade-up" data-aos-duration="1000">
                <video class="w-100" autoplay loop muted>
                    <source src="{{ $banner->image }}" type="video/mp4">
                    <source src="{{ $banner->image }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
        </a>
        @endif

        @endforeach


    </div>
</section>


<!-------------------------------------------------------->
<section class="container" data-aos="fade-up" data-aos-duration="2000">
    <h2 class="mt-0 titles titles-map">Nuestra prioridad es la salud y bienestar de las mascotas. <br> ¡Somos clínica 24 horas!</h2>
    <div class="map-content">
        <div class="adrres-one">
            <div>
                <a href="https://www.google.com/maps/place/Ak.+7+%23140-71,+Bogot%C3%A1/@4.7167186,-74.0312172,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f8ff7e958dc61:0xdd82769f04b4bd6d!8m2!3d4.7167186!4d-74.0290285?shorturl=1" target="_blank"> <img class="icon-drees" src="assets/img/icons/google-maps.png" alt="">
                </a>

                <a href="https://www.waze.com/es/live-map/directions?to=ll.4.716933%2C-74.028904" target="_blank"> <img class="icon-drees" src="assets/img/icons/waze.png" alt="">
                </a>
            </div>
            <p>Carrera 7 # 140 - 71
                C.C. Belmira Plaza</p>
        </div>
        <div class="adrres-two flex-one">
            <P>Servicio de Veterinaria Y Urgencias
                24/7 + Festivos!</P>
        </div>
        <div class=" adrres-three ">

            <div>
                <a href="https://www.google.com/maps/place/Cl.+103+%2314a-10,+Bogot%C3%A1/@4.6877525,-74.0486416,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9abdc4d32555:0x9df76691c1874428!8m2!3d4.6877525!4d-74.0464529?shorturl=1" target="_blank">
                    <img class="icon-drees" src="assets/img/icons/google-maps.png" alt="">

                </a>
                <a href="https://www.waze.com/es/live-map/directions?to=ll.4.686892%2C-74.043581" target="_blank">
                    <img class="icon-drees" src="assets/img/icons/waze.png" alt="">

                </a>
            </div>
            <p>Calle 103 # 14A - 10</p>
        </div>
    </div>
</section>
