<section class="tienda-home mt-5 pt-4">
    <div class="text-center">
        <span class="gray" data-aos="fade-up" data-aos-duration="1200"> Productos listos para comprar</span>
        <h2 class="mt-0 titles  mb-5" data-aos="fade-up" data-aos-duration="1300">
            Conoce nuestra nuevo E Pets Boutique
            Nuestros Servicios</h2>
    </div>
    <!-- Isotope menu -->
    <div class=" container_menu_iso mb-4" data-aos="fade-up" data-aos-duration="1000">
        <div class="row">
            <div class="col-sm-12">
                <div class="menu_iso" id="custom-filter">
                    <!--- <li>
                        <a data-filter="*">All Projects</a>
                    </li>--->
                    <li>
                        <a data-filter=".caninos"><img src="assets/img/icons/canino-icon.png" alt="">
                            <span>Caninos</span>
                        </a>
                    </li>
                    <li>
                        <a data-filter=".felinos"><img src="assets/img/icons/felino-icon.png" alt="">
                            <span>Felinos</span>
                        </a>
                    </li>

                </div>
            </div>
        </div>
    </div>

    <!-- Isotope Gallery -->
    <div class="container container_gallery_iso" data-aos="fade-up" data-aos-duration="1100">
        <div class="row iso-container">

            <!-- ----1---- -->
            @foreach(App\Models\Product::inRandomOrder()->whereHas('category', function($q){
                $q->where("dog_category", 1);
            })->take(10)->get() as $dogProduct)
                <div class="col-xs-6 col-sm-3 cent isotope-item caninos">
                    <a href="{{ url('/producto/'.$dogProduct->slug) }}">
                        <div class="img_iso" style="  background-image: url({{ $dogProduct->image }})">
                            <div class="hover_iso" style="  background-image: url({{ $dogProduct->image_hover }})"></div>
                        </div>
                        <div class="titulo-product">
                            <h3>{{ $dogProduct->name }}</h3>
                            <p>Desde: $ {{ number_format(App\Models\ProductFormat::where("product_id", $dogProduct->id)->orderBy("price", "desc")->first()->price, 0, ",", ".") }}</p>
                        </div>
                    </a>
                </div>

            @endforeach

            @foreach(App\Models\Product::inRandomOrder()->whereHas('category', function($q){
                $q->where("cat_category", 1);
            })->take(10)->get() as $catProduct)
                <div class="col-xs-6 col-sm-3 cent isotope-item felinos">
                    <a href="{{ url('/producto/'.$catProduct->slug) }}">
                        <div class="img_iso" style="  background-image: url({{ $catProduct->image }})">
                            <div class="hover_iso" style="  background-image: url({{ $catProduct->image_hover }})"></div>
                        </div>
                        <div class="titulo-product">
                            <h3>{{ $catProduct->name }}</h3>
                            <p>Desde: $ {{ number_format(App\Models\ProductFormat::where("product_id", $catProduct->id)->orderBy("price", "desc")->first()->price, 0, ",", ".") }}</p>
                        </div>
                    </a>
                </div>

            @endforeach

        </div>
    </div>

</section>

@push("scripts")



@endpush
