<section class="ads container pt7">
    <div class="row">

        @foreach(App\Models\Banner::inRandomOrder()->take(2)->get() as $banner)
            
            @if($banner->type == 'image')
                <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000">
                    <img src="{{ $banner->image }}" alt="Tienda virtual alimentos secos">
                </div>
            @else
                <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000">
                    <video class="w-100" controls>
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
<section class="container" data-aos="fade-up"
     data-aos-duration="2000">
    <h2 class="mt-0 titles">Tu mascota, nuestra prioridad - no descansamos!</h2>

    <div class="map-content">
        <div class="adrres-one">
            <img class="icon-drees" src="assets/img/icons/google-maps.png" alt="">
            <p>Carrera 7 # 140 - 71
                C.C. Belmira Plaza</p>
        </div>
        <div class="adrres-two flex-one">
            <P>Servicio de Veterinaria Y Urgencias
                24/7 + Festivos!</P>
        </div>
        <div class="adrres-three">
            <p>Calle 103 # 14A - 10</p>
            <img class="icon-drees" src="assets/img/icons/waze.png" alt="">
            <img class="icon-drees" src="assets/img/icons/google-maps.png" alt="">

        </div>
    </div>
</section>
