<section class="ads container pt7">
    <div class="slider-adss">

        @foreach(App\Models\Banner::inRandomOrder()->get() as $banner)

        @if($banner->type == 'image')
        <div class="" data-aos="fade-up" data-aos-duration="1000">
            <img src="{{ $banner->image }}" alt="Tienda virtual alimentos secos">
        </div>
        @else
        <div class="" data-aos="fade-up" data-aos-duration="1000">
            <video class="w-100" autoplay loop muted>
                <source src="{{ $banner->image }}" type="video/mp4">
                <source src="{{ $banner->image }}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        </div>
        @endif

        @endforeach


    </div>
</section>


<!-------------------------------------------------------->
<section class="container" data-aos="fade-up" data-aos-duration="2000">
    <h2 class="mt-0 titles">Nuestra prioridad es la salud y bienestar de las mascotas. <br> ¡Somos clínica 24 horas!</h2>
    <div class="map-content">
        <div class="adrres-one">
            <div>
                <img class="icon-drees" src="assets/img/icons/google-maps.png" alt="">
                <img class="icon-drees" src="assets/img/icons/waze.png" alt="">
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
                <img class="icon-drees" src="assets/img/icons/waze.png" alt="">

            </div> <img class="icon-drees" src="assets/img/icons/google-maps.png" alt="">
            <p>Calle 103 # 14A - 10</p>
        </div>
    </div>
</section>
