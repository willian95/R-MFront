@extends("layouts.main")
@section("content")
<div class="header-two">
    @include("partials.header")
</div>

<main>
    <div class="breadcrumbs">
        <p><span><a href="{{ url('/') }}">Inicio </a>><a href="tienda"> Tienda</a> ></span> Producto</p>
    </div>

    <div class="row container-fluid">
        <div class="col-md-8">
            <div id="gallery-product" class="demo-gallery" data-pswp-uid="1">
                <div class="container gallery-product">

                    <a class="img-product" href="{{ $product->image }}" data-size="1600x1067" data-med="{{ $product->image }}" data-med-size="1024x683" data-author="RYM">
                        <img src="{{ $product->image }}" alt="">
                        <div class="gallery-zoom">
                            <p>+</p>
                        </div>
                    </a>
                    @foreach($product->productSecondaryImages as $secondaryImage)
                    @if($secondaryImage->type == 'image')
                    <a class="img-product" href="{{ $secondaryImage->image }}" data-size="1600x1067" data-med="{{ $secondaryImage->image }}" data-med-size="1024x683" data-author="RYM">
                        <img src="{{ $secondaryImage->image }}" alt="">
                        <div class="gallery-zoom">
                            <p>+</p>
                        </div>
                    </a>
                    @else
                    <video class="w-100" controls>
                        <source src="{{ $secondaryImage->image }}" type="video/mp4">
                        <source src="{{ $secondaryImage->image }}" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                    @endif
                    @endforeach


                </div>
            </div>

        </div>

        <div class="col-md-4 card-product">
            <div id="dev-product-detail">
                <div class="">
                    <h2 class="title-product">{{ $product->name }}
                    </h2>
                    <div class="stock">
                        <p>Stock: @{{ stock }}</p>
                    </div>
                    
                    <div class="price">
                        <p v-if="discountPrice <= 0"> $ @{{ number_format(price * amount, 0, ",", ".")  }}</p>

                        <p v-if="discountPrice > 0"> $ @{{ number_format(discountPrice * amount, 0, ",", ".")  }}</p>
                        <p v-if="discountPrice > 0"> <strike>$ @{{ number_format(price * amount, 0, ",", ".")  }}</strike></p>
                        <!---  <p>$ @{{ price }}</p>--->
                    </div>
                </div>

                <div class="">
                    <div class="cantidad ">
                        <p>Cantidad:</p>
                        <form class="qanty">
                            <div class="value-button" id="decrease" @click="substractAmount()" value="Decrease Value">-</div>
                            <input type="number" id="number" :value="amount" />
                            <div class="value-button" id="increase" @click="addAmount()" value="Increase Value">+</div>
                        </form>
                        <small v-if="errors.hasOwnProperty('amount')">@{{ errors['amount'][0] }}</small>
                    </div>
                    <!--- <div class="w-150 text-end w-100">

                        Total: $ @{{ price * amount  }}

                    </div>---->

                </div>
                <div class="opciones-products">
                    <p>Color y talla:</p>
                    <select class="form-control" @change="setSelectedProductFormat()" v-model="selectedProductFormat">

                        <option :value="productFormat.id" v-for="productFormat in productFormats">@{{ productFormat.color.color }} - @{{ productFormat.size.size }}</option>
                    </select>
                </div>


                <div class="">

                    <div class="flex-btns">
                        <button class="btn-red"><a class="txt-w" href="#!" @click="addToCart('checkout')">Comprar ahora</a></button>
                        <button class="btn-red btn-red-2"><a class="" href="#!" @click="addToCart()">Agregar al carrito</a></button>
                    </div>

                </div>

            </div>
            <hr>
            <div class="overview">
                <h4>Descripción</h4>
                {!! $product->description !!}
            </div>

        </div>
    </div>

    <!----------------------------------relacionados----------------------------------->
    <section>
        <h2 class="mt-0 titles mt-5 mb-5">Más productos que pueden servirle a tu mascota</h2>

        <div class="slider-relacionados container">

            @foreach(App\Models\Product::inRandomOrder()->whereHas('category', function($q) use($product){
            if($product->category->dog_category == 1){
            $q->where("dog_category", 1);
            }

            if($product->category->cat_category == 1){
            $q->orWhere("cat_category", 1);
            }

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


        </div>

    </section>


    <!-- Photoswipe 4.0 html code for javascript interface -->



    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe.
     It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides.
        PhotoSwipe keeps only 3 of them in the DOM to save memory.
        Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>
</main>

@include("partials.footer")
@endsection

@push("scripts")
<script src="{{ asset('/js/app.js') }}"></script>
<script>
    const app = new Vue({
        el: '#dev-product-detail',
        data() {
            return {
                productId: "{{ $product->id }}",
                amount: 0,
                productFormats: [],
                selectedProductFormat: "",
                discountPrice:0,
                price: "",
                stock: 0,
                errors: []

            }
        },
        methods: {

            async getProductFormats() {

                const response = await axios.get("{{ url('/product/product-formats/'.$product->id) }}")
                this.productFormats = response.data
                this.selectedProductFormat = this.productFormats[0].id

                this.setSelectedProductFormat()


            },
            setSelectedProductFormat() {

                var _this = this
                const filtered = this.productFormats.filter(function(el) {
                    return el.id === _this.selectedProductFormat;
                });

                this.price = filtered[0].price
                this.discountPrice = filtered[0].discount_price
                this.stock = filtered[0].stock
                this.amount = this.stock > 0 ? 1 : 0

            },

            addAmount() {

                if (this.amount + 1 <= this.stock) {

                    this.amount++

                }

            },

            substractAmount() {

                if (this.amount > 1) {
                    this.amount--
                }

            },

            async cartAmount(){

                const order = window.localStorage.getItem("order")
                const response = await axios.get("{{ url('/cart') }}", {
                    params: {
                        "order_id": order
                    }
                })
                let sum = 0
                response.data.map((data) => {
                    sum += data.amount
                })
                $("#cart-counter").html(sum)
            },

            async addToCart(checkout) {
                this.errors = []
                try {

                    const order = window.localStorage.getItem("order")
                    const response = await axios.post("{{ url('/cart') }}", {
                        "product_format_id": this.selectedProductFormat,
                        "amount": this.amount,
                        "order": order
                    })

                    if (response.data.success == true) {

                        window.localStorage.setItem("order", response.data.order)
                        await swal({
                            text: response.data.msg,
                            icon: "success"
                        })

                        if(checkout == "checkout"){

                            window.location.replace("{{ url('checkout') }}")

                        }

                        this.amount = 1
                        this.cartAmount()

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
            number_format(number, decimals, dec_point, thousands_point) {
                if (number == null || !isFinite(number)) {
                    throw new TypeError("number is not valid");
                }
                if (!decimals) {
                    var len = number.toString().split('.').length;
                    decimals = len > 1 ? len : 0;
                }
                if (!dec_point) {
                    dec_point = '.';
                }
                if (!thousands_point) {
                    thousands_point = ',';
                }
                if(this.selectedCurrency == "COP"){
                decimals = 0
                }
                number = parseFloat(number).toFixed(decimals);
                number = number.replace(".", dec_point);
                var splitNum = number.split(dec_point);
                splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
                number = splitNum.join(dec_point);
                return number;
            }



        },
        mounted() {

            this.getProductFormats()
            this.cartAmount()

        }
    });
</script>

@endpush
