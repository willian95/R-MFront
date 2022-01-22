@extends("layouts.main")
@section("content")
<div class="header-two">
    @include("partials.header")
</div>

<main class="">
    <div class="mt-9">
        @include("partials.categorias")
    </div>
 <div class="container">
 <div class="breadcrumbs">
        <p><span><a href="{{ url('/') }}">Inicio </a>><a href="tienda"> Tienda</a> ></span> Checkout</p>
    </div>

    <section>
        <h2 class="mt-0 titles mt-5 mb-5">R&M Tienda Virtual</h2>

        <div class="row" id="dev-product-info">
            <div class="col-md-7">
                <div class="border-content">
                    <div class="border-check">
                        <h3>Mi carrito</h3>
                    </div>
                    <div class="product-info" v-for="product in products">
                        <!---1---->
                        <div>
                            <img :src="product.product_format.product.image" alt="">
                        </div>
                        <!---2---->
                        <div>
                            <p class="txt-product-check">@{{ product.product_format.product.name }}</p>
                            <p><small>@{{ product.product_format.color.color }} - @{{ product.product_format.size.size }}</small></p>
                            <p>$ @{{ product.product_format.price }}</p>
                        </div>
                        <!---3---->
                        <div>
                            <div class="content-flex">
                                <div class="">
                                    <div class="qanty">
                                        <div class="value-button" id="decrease" @click="substractAmount(product)" value="Decrease Value">-</div>
                                        <input class="number" type="number" :id="'number'+product.id" :value="product.amount" />
                                        <div class="value-button" id="increase" @click="addAmount(product)" value="Increase Value">+</div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!---4---->
                        <div class="text-center">
                            <i class="far fa-trash-alt trash" @click="askForDelete(product)"></i>
                        </div>
                    </div>
                </div>
                <!--------------------->
                <div class="border-content mt-5">
                    <div class="border-check">
                        <h3>Dirección y pago
                        </h3>
                    </div>
                    <!------>
                    <div class="form-check pb-5">
                        <div class="row p-section">
                            <div class="col-md-6 text-start  mb-4">
                                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                <input type="text" placeholder="Maria" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="col-md-6 text-start  mb-4">
                                <label for="exampleInputEmail1" class="form-label">Teléfono</label>
                                <input type="text" placeholder="12345678" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="col-md-12 text-start  mb-4">
                                <label for="exampleInputEmail1" class="form-label">Dirección</label>
                                <input placeholder="" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>

                        <form action="https://checkout.wompi.co/p/" method="GET" id="checkoutForm">
                            <!-- OBLIGATORIOS -->
                            <input type="hidden" name="public-key" value="{{ env('WOMPI_PUBLIC_KEY') }}" />
                            <input type="hidden" name="currency" value="COP" />
                            <input type="hidden" name="amount-in-cents" :value="total * 100" />
                            <input type="hidden" name="reference" :value="reference" />
                            <input type="hidden" name="redirect-url" value="{{ url('/') }}" />
                            <!-- OPCIONALES -->
                            <input type="hidden" name="signature:integrity" :value="integritySignature"/>
                            <button type="button" class="btn btn-reds txt-w" @click="checkout()">Pagar</button>
                        </form>

                        <!--<button type="submit" class="btn btn-reds txt-w">Pagar</button>-->
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="resumen">
                    <h3>Resumen</h3>
                    <div class="resumen-item">
                        <span>Subtotal</span>
                        <p>$ @{{ total }}</p>
                    </div>
                    <div class="resumen-item">
                        <span>Envio</span>
                        <p>$ @{{ shippingPrice }}</p>
                    </div>

                </div>
                <div class="resumen-item bg-total ">
                    <span>Total</span>
                    <p>$ @{{ total }}</p>
                </div>

                <!------------codigo------------->
                @if(\Auth::check())
                <div action="">
                    <div class="col-md-6 text-start  mb-4 mt-5">
                        <label for="exampleInputEmail1" class="form-label">Código de descuento?</label>
                        <input type="text" placeholder="12345" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="coupon">
                        <button type="button" class="btn btn-info" @click="codeVerify()">Verificar código</button>
                    </div>

                </div>
                @endif

                <div class="d-flexinfor">
                    <img class="entrega" src="{{ url('assets/img/icons/entrega-rapida.png') }}" alt="">
                    <p>Envió rápido! 1
                        día o antes!</p>
                </div>

                <hr>

                <div class="d-flexinfor">
                    <img class="garantia" src="{{ url('assets/img/icons/certificado-de-garantia.png') }}" alt="">
                    <p>1 Año de
                        garantia</p>
                </div>


            </div>
        </div>
    </section>
 </div>
</main>

@include("partials.footer")
@endsection


@push("scripts")

    <style>
        .number{
            text-align: center;
            border: 1px solid #ddd;
            margin: 0px;
            width: 40px;
            height: 40px;
            border-radius: 9px;
        }
    </style>

    <script src="{{ asset('/js/app.js') }}"></script>
    <script>

        const app = new Vue({
            el: '#dev-product-info',
            data() {
                return {
                    couponInfo:"",
                    products:[],
                    coupon:"",
                    usedCoupons:[],
                    shippingPrice:5000,
                    integritySignature:"",
                    reference:""
                }
            },
            computed: {
                total: function(){

                    let innerTotal = 0;
                    this.products.forEach(item => {
                        innerTotal = innerTotal + (item.amount * item.product_format.price)
                    })

                    return innerTotal + this.shippingPrice

                }
            },
            methods: {

                async getCartProducts(){

                    const order = window.localStorage.getItem("order")
                    const response = await axios.get("{{ url('/cart') }}", {
                        params:{
                            "order_id": order
                        }
                    })

                    this.products = response.data

                },
                addAmount(product){

                    if(product.amount + 1 <= product.product_format.stock){

                        product.amount++
                        this.updateCartItem(product)
                    }

                },

                substractAmount(product){

                    if(product.amount > 1){
                        product.amount--
                        this.updateCartItem(product)
                    }

                },
                async updateCartItem(product){

                    const response = await axios.put("{{ url('/cart') }}"+"/"+product.id, {
                        "amount": product.amount
                    })

                },
                askForDelete(product){

                    swal({
                        title: "¿Estás seguro de eliminar?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,

                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            this.deleteCartItem(product)
                        }
                    });

                },

                isUsedCoupons(code){

                    if(this.usedCoupons.indexOf(code) > -1){
                        return true
                    }

                    return false
                },
                async codeVerify(){

                    if(this.isUsedCoupons(this.coupon)){

                        swal({
                            text:"Este cupón ya fue utilizado",
                            icon: "warning"
                        })

                        return
                    }

                    const order = window.localStorage.getItem("order")
                    const response = await axios.post("{{ url('/cart/code-verify') }}",{
                        coupon: this.coupon
                    })

                    this.couponInfo = response.data.coupon
                    const couponProductFormats = response.data.couponProductFormats

                    var _this = this

                    if(this.couponInfo.total_discount == "producto"){

                        if(this.couponInfo.all_products == 1){

                            this.products.forEach(item => {

                                if(_this.couponInfo.discount_type == "neto"){

                                    item.product_format.price = item.product_format.price - _this.couponInfo.discount_amount
                                    this.usedCoupons.push(_this.couponInfo.coupon_code)

                                }else{

                                    const discount  = item.product_format.price * (this.couponInfo.discount_amount / 100)
                                    item.product_format.price = item.product_format.price - discount
                                    this.usedCoupons.push(_this.couponInfo.coupon_code)

                                }

                            })

                            return

                            }else{

                            this.products.forEach(item => {

                                couponProductFormats.forEach(couponProduct =>{

                                    if(item.product_format.id == couponProduct.product_format_id){

                                        if(_this.couponInfo.discount_type == "neto"){

                                            item.product_format.price = item.product_format.price - _this.couponInfo.discount_amount
                                            this.usedCoupons.push(_this.couponInfo.coupon_code)

                                        }else{

                                            const discount  = item.product_format.price * (this.couponInfo.discount_amount / 100)
                                            item.product_format.price = item.product_format.price - discount
                                            this.usedCoupons.push(_this.couponInfo.coupon_code)

                                        }

                                    }

                                })

                            })

                            return

                        }


                    }else{

                        this.products.forEach(item => {

                            if(_this.couponInfo.discount_type == "neto"){

                                item.product_format.price = item.product_format.price - _this.couponInfo.discount_amount
                                this.usedCoupons.push(_this.couponInfo.coupon_code)

                            }else{

                                const discount  = item.product_format.price * (this.couponInfo.discount_amount / 100)
                                item.product_format.price = item.product_format.price - discount
                                this.usedCoupons.push(_this.couponInfo.coupon_code)

                            }

                        })

                        return

                    }

                },
                async deleteCartItem(product){

                    const response = await axios.delete("{{ url('/cart') }}"+"/"+product.id)
                    if(response.data.success == true){

                        swal({
                            text:response.data.msg,
                            icon:"success"
                        })

                        this.getCartProducts()

                    }else{

                        swal({
                            text:response.data.msg,
                            icon:"error"
                        })

                    }
                },
                async checkout(){

                    await this.integritySigning()
                    const form = document.getElementById('checkoutForm')
                    form.submit()

                },
                async integritySigning(){

                    const response = await axios.post("{{ url('/checkout/signing') }}", {
                        "total": this.total,
                        "currency": "COP"
                    })

                    this.reference = response.data.reference
                    this.integritySignature = response.data.signature

                },
                async addPayment(){

                    const response = await axios.post("{{ url('/checkout/store') }}", {
                        "order_id": window.localStorage.getItem("order"),
                        "wompi_reference": this.reference,
                        "name": this.name,
                        "phone": this.phone,
                        "address":this.address,
                    })


                }

            },
            created() {

                this.getCartProducts()

            }
        });
    </script>

@endpush
