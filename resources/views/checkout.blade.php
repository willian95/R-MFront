@extends("layouts.main")
@section("content")
<div class="header-two">
    @include("partials.header")
</div>

<main class="">

    <div class="container">
        <div class="breadcrumbs">
            <p><span><a href="{{ url('/') }}">Inicio </a>><a href="tienda"> Tienda</a> ></span> Checkout</p>
        </div>

        <section>
            <h2 class="mt-0 titles mt-5 mb-5">R&M Tienda Virtual   <div class="huella">
                <img class="" src="{{ url('assets/img/icons/huella.png') }}" alt="">
            </div></h2>

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

                                <p v-if="product.product_format.discount_price <= 0">$ @{{ currencyFormatDE(product.product_format.price) }}</p>

                                <p v-if="product.product_format.discount_price > 0">$ @{{ currencyFormatDE(product.product_format.discount_price) }}</p>
                                <p v-if="product.product_format.discount_price > 0"><strike>$ @{{ currencyFormatDE(product.product_format.price) }}</strike></p>
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
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" placeholder="Maria" class="form-control" id="name" aria-describedby="emailHelp" v-model="name">
                                    <small class="text-danger" v-if="errors.hasOwnProperty('name')">@{{ errors['name'][0] }}</small>
                                </div>
                                <div class="col-md-6 text-start  mb-4">
                                    <label for="phone" class="form-label">Teléfono</label>
                                    <input type="text" placeholder="12345678" class="form-control" id="phone" aria-describedby="emailHelp" v-model="phone">
                                    <small class="text-danger" v-if="errors.hasOwnProperty('phone')">@{{ errors['phone'][0] }}</small>
                                </div>
                                <div class="col-md-12 text-start  mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input placeholder="" type="email" class="form-control" id="email" aria-describedby="emailHelp" v-model="email">
                                    <small class="text-danger" v-if="errors.hasOwnProperty('email')">@{{ errors['email'][0] }}</small>
                                </div>
                                <div class="col-md-12 text-start  mb-4">
                                    <label for="city" class="form-label">Dpto/Ciudad</label>
                                    <input placeholder="" type="email" class="form-control" id="city" aria-describedby="emailHelp" v-model="city">
                                    <small class="text-danger" v-if="errors.hasOwnProperty('city')">@{{ errors['city'][0] }}</small>
                                </div>
                                <div class="col-md-12 text-start  mb-4">
                                    <label for="address" class="form-label">Dirección</label>
                                    <input placeholder="" type="email" class="form-control" id="address" aria-describedby="emailHelp" v-model="address">
                                    <small class="text-danger" v-if="errors.hasOwnProperty('address')">@{{ errors['address'][0] }}</small>
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
                                <input type="hidden" name="signature:integrity" :value="integritySignature" />
                                <button type="button" class="btn btn-reds txt-w" @click="checkout()" v-if="products.length > 0">Pagar</button>
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
                            <p>$ @{{ currencyFormatDE(total - shippingPrice) }}</p>
                        </div>
                        <div class="resumen-item">
                            <span>Envío </span>
                            <p>$ @{{ currencyFormatDE(shippingPrice) }}</p>
                        </div>

                    </div>
                    <div class="resumen-item bg-total ">
                        <span>Total</span>
                        <p>$ @{{ currencyFormatDE(total) }}</p>



                    </div>

                    <!------------codigo------------->
                    @if(\Auth::check())
                    <div action="">
                        <div class="col-md-6 text-start  mb-4 mt-5">
                            <label for="exampleInputEmail1" class="form-label">Código de descuento?</label>
                            <input type="text" placeholder="12345" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="coupon">
                            <button type="button" class="btn btn-red-2 mt-3 mb-4" @click="codeVerify()">Verificar código</button>
                        </div>

                    </div>
                    @endif

                    <div class="d-flexinfor mt-5">
                        <img class="entrega" src="{{ url('assets/img/icons/entrega-rapida.png') }}" alt="">
                        <p>¡Envío rápido! 1 día o antes! Si es Bogotá (aplica rango de cobertura).
                            <br>
                            Fuera de Bogotá, tendrá un recargo de envío*
                            <br>
                            <!---Cobertura:-->
                        </p>
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
    .number {
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
                couponInfo: "",
                products: [],
                coupon: "",
                usedCoupons: [],
                shippingPrice: 5000,
                integritySignature: "",
                reference: "",
                name: "{{ Auth::check() ? Auth::user()->name : '' }}",
                address: "{{ Auth::check() ? Auth::user()->address : '' }}",
                email: "{{ Auth::check() ? Auth::user()->email : '' }}",
                phone: "{{ Auth::check() ? Auth::user()->phone : '' }}",
                city: "{{ Auth::check() ? Auth::user()->city : '' }}",
                errors: []
            }
        },
        computed: {
            total: function() {

                let innerTotal = 0;
                this.products.forEach(item => {
                    if(item.product_format.discount_price <= 0){
                        innerTotal = innerTotal + (item.amount * item.product_format.price)
                    }else{

                        innerTotal = innerTotal + (item.amount * item.product_format.discount_price)

                    }

                })

                return innerTotal + this.shippingPrice

            }
        },
        methods: {

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

            async getCartProducts() {

                const order = window.localStorage.getItem("order")
                const response = await axios.get("{{ url('/cart') }}", {
                    params: {
                        "order_id": order
                    }
                })

                this.products = response.data

                this.cartAmount()

            },
            addAmount(product) {

                if (product.amount + 1 <= product.product_format.stock) {

                    product.amount++
                    this.updateCartItem(product)
                }

            },

            substractAmount(product) {

                if (product.amount > 1) {
                    product.amount--
                    this.updateCartItem(product)
                }

            },
            async updateCartItem(product) {

                const response = await axios.put("{{ url('/cart') }}" + "/" + product.id, {
                    "amount": product.amount
                })

                this.cartAmount()

            },
            askForDelete(product) {

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

            isUsedCoupons(code) {

                if (this.usedCoupons.indexOf(code) > -1) {
                    return true
                }

                return false
            },
            async codeVerify() {

                if (this.isUsedCoupons(this.coupon)) {

                    swal({
                        text: "Este cupón ya fue utilizado",
                        icon: "warning"
                    })

                    return
                }

                const order = window.localStorage.getItem("order")
                const response = await axios.post("{{ url('/cart/code-verify') }}", {
                    coupon: this.coupon
                })

                if (response.data.success == false) {
                    swal({
                        text: response.data.msg,
                        icon: "warning"
                    })

                    return
                }

                this.couponInfo = response.data.coupon
                const couponProductFormats = response.data.couponProductFormats

                var _this = this

                if (this.couponInfo.total_discount == "producto") {

                    if (this.couponInfo.all_products == 1) {

                        this.products.forEach(item => {

                            if (_this.couponInfo.discount_type == "neto") {

                                if(item.product_format.price - _this.couponInfo.discount_amount <= 0){
                                    item.product_format.price = 1
                                }else{
                                    item.product_format.price = item.product_format.price - _this.couponInfo.discount_amount
                                }

                                if(item.product_format.discount_price > 0){
                                    if(item.product_format.discount_price - _this.couponInfo.discount_amount <= 0){
                                        item.product_format.discount_price = 1
                                    }else{
                                        item.product_format.discount_price = item.product_format.discount_price - _this.couponInfo.discount_amount
                                    }
                                }
                                
                                
                                this.usedCoupons.push(_this.couponInfo.coupon_code)

                            } else {

                                const discount = item.product_format.price * (this.couponInfo.discount_amount / 100)
                                if(item.product_format.price - _discount <= 0){
                                    item.product_format.price = 1
                                }else{
                                    item.product_format.price = item.product_format.price - discount
                                }

                                if(item.product_format.discount_price > 0){
                                    if(item.product_format.discount_price - discount <= 0){
                                        item.product_format.discount_price = 1
                                    }else{
                                        item.product_format.discount_price = item.product_format.discount_price - discount
                                    }
                                }

                                this.usedCoupons.push(_this.couponInfo.coupon_code)

                            }

                        })

                        return

                    } else {

                        this.products.forEach(item => {

                            couponProductFormats.forEach(couponProduct => {

                                if (item.product_format.id == couponProduct.product_format_id) {

                                    if (_this.couponInfo.discount_type == "neto") {

                                        if(item.product_format.price - _this.couponInfo.discount_amount <= 0){
                                            item.product_format.price = 1
                                        }else{
                                            item.product_format.price = item.product_format.price - _this.couponInfo.discount_amount
                                        }
                                        
                                        
                                        if(item.product_format.discount_price > 0){
                                            if(item.product_format.discount_price - discount <= 0){
                                                item.product_format.discount_price = 1
                                            }else{
                                                item.product_format.discount_price = item.product_format.discount_price - _this.couponInfo.discount_amount
                                            }

                                        }
                                        
                                        this.usedCoupons.push(_this.couponInfo.coupon_code)

                                    } else {

                                        const discount = item.product_format.price * (this.couponInfo.discount_amount / 100)
                                        item.product_format.price = item.product_format.price - discount
                                        
                                        if(item.product_format.discount_price > 0){

                                            if(item.product_format.discount_price - discount <= 0){
                                                item.product_format.discount_price = 1
                                            }else{
                                                item.product_format.discount_price = item.product_format.discount_price - discount
                                            }

                                        }

                                        this.usedCoupons.push(_this.couponInfo.coupon_code)

                                    }

                                }

                            })

                        })

                        return

                    }


                } else {

                    this.products.forEach(item => {

                        if (_this.couponInfo.discount_type == "neto") {

                            item.product_format.price = item.product_format.price - _this.couponInfo.discount_amount
                            this.usedCoupons.push(_this.couponInfo.coupon_code)

                        } else {

                            const discount = item.product_format.price * (this.couponInfo.discount_amount / 100)
                            item.product_format.price = item.product_format.price - discount
                            this.usedCoupons.push(_this.couponInfo.coupon_code)

                        }

                    })

                    return

                }

            },
            async deleteCartItem(product) {

                const response = await axios.delete("{{ url('/cart') }}" + "/" + product.id)
                if (response.data.success == true) {

                    swal({
                        text: response.data.msg,
                        icon: "success"
                    })

                    this.getCartProducts()

                } else {

                    swal({
                        text: response.data.msg,
                        icon: "error"
                    })

                }
            },
            async checkout() {

                await this.integritySigning()

                if (await this.addPayment()) {
                    const form = document.getElementById('checkoutForm')
                    form.submit()
                }


            },
            async integritySigning() {

                const response = await axios.post("{{ url('/checkout/signing') }}", {
                    "total": this.total,
                    "currency": "COP"
                })

                this.reference = response.data.reference
                this.integritySignature = response.data.signature

            },
            async addPayment() {

                try {

                    const response = await axios.post("{{ url('/checkout/store') }}", {
                        "order_id": window.localStorage.getItem("order"),
                        "wompi_reference": this.reference,
                        "name": this.name,
                        "phone": this.phone,
                        "address": this.address,
                        "city": this.city,
                        "email": this.email,
                        "products": this.products,
                        "usedCoupons": this.usedCoupons
                    })

                    return true

                } catch (err) {

                    this.errors = err.response.data.errors
                    return false
                }

            },
            currencyFormatDE(num) {
                return (
                    num
                    .toFixed(0) // always two decimal digits
                    .replace('.', ',') // replace decimal point character with ,
                    .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
                ) // use . as a separator
            }

        },
        created() {

            this.getCartProducts()
            this.cartAmount()

        }
    });
</script>

@endpush
