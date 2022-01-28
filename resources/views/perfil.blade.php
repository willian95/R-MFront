@extends("layouts.main") @section("content")
<div class="header-two">@include("partials.header")</div>
<main class="">
    <section class="container p-50" id="dev-area">
        <div class="car" v-cloak>
            <div class="card-body">

                <div class="main-perfil">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="perfil-tab" data-bs-toggle="tab" data-bs-target="#perfil" type="button" role="tab" aria-controls="perfil" aria-selected="true">
                                <img class="icon-perfil" src="{{ url('assets/img/icons/user.png') }}" alt="Imagen de usuario" />

                                Perfil
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="comprass-tab" data-bs-toggle="tab" data-bs-target="#comprass" type="button" role="tab" aria-controls="comprass" aria-selected="false">
                                <img class="icon-perfil" src="{{ url('assets/img/icons/bag.png') }}" alt="Imagen de usuario" />
                                Compras
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="perfil-tab">
                            <div>
                                <h5 class="mb-4 weight">Datos de la cuenta</h5>
                                <div class="form-perfil">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label for="email">Nombre</label>
                                                <input placeholder="pedro perez" type="text" v-model="name" autocomplete="off" class="form-control" id="email" aria-describedby="emailHelp" />
                                                <i class="fa fa-user icon_form"></i>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="identification">Identificación</label>

                                                <input placeholder="Dirección" type="text" class="form-control" id="identification" v-model="identification" @keypress="isNumber($event)" />
                                                <i class="fa fa-globe icon_form"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group mb-4">
                                                <label for="email">Email</label>
                                                <input placeholder="pedroperez@gmail.com" type="email" autocomplete="off" class="form-control" id="text" aria-describedby="emailHelp" v-model="email" :readonly="true" />
                                                <i class="fa fa-envelope icon_form"></i>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="telephone">Teléfono</label>

                                                <input placeholder="+1234567" type="text" class="form-control  " id="telephone" v-model="telephone" @keypress="isNumber($event)">
                                                <i class="fa fa-phone icon_form"></i>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <h5 class="mb-4 weight">Datos de envío</h5>
                                <div class="form-perfil">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Dirección</label>

                                                <input placeholder="Dirección" type="text" class="form-control" id="address" v-model="address" />
                                                <i class="fa fa-globe icon_form"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Dpto / Ciudad </label>

                                                <input placeholder="Dirección" type="text" class="form-control" id="city" v-model="city" />
                                                <i class="fa fa-globe icon_form"></i>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="text-center mt-5">
                                    <button type=" button" class="btn btn-reds txt-w" @click="update()">
                                        Actualizar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="comprass" role="tabpanel" aria-labelledby="compras-tab">

                            <div class="card-body">
                                <!--begin: Datatable-->
                                <table class="table-checkable table table-borderless mt-5">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><i class="far fa-question-circle  ml-3"></i> Status</th>
                                            <th>$ Total</th>
                                            <th><i class="far fa-calendar-alt ml-3"></i>Fecha</th>
                                            <th><i class="far fa-eye ml-3"></i>Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(shopping, index) in shoppings">
                                            <th>@{{ shopping.wompi_reference }}</th>
                                            <td>@{{ shopping.name }}</td>
                                            <td style="text-transform: capitalize;">@{{ shopping.status }}</td>
                                            <td>$ @{{ parseInt(shopping.total_products + shopping.shipping_price).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</td>
                                            <td>@{{ shopping.created_at.toString().substring(0, 10) }}</td>
                                            <td>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#shoppingModal" @click="show(shopping)"><i class="far fa-eye"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row w-100 mt-9">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="kt_datatable_info" role="status" aria-live="polite">Mostrando página @{{ currentPage }} de @{{ totalPages }}</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_full_numbers" id="kt_datatable_paginate">
                                            <ul class="pagination">

                                                <li class="paginate_button page-item active" v-for="(link, index) in links">
                                                    <a style="cursor: pointer" aria-controls="kt_datatable" tabindex="0" :class="link.active == false ? linkClass : activeLinkClass":key="index" @click="fetch(link.url)" v-html="link.label.replace('Previous', 'Anterior').replace('Next', 'Siguiente')"></a>
                                                </li>


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Datatable-->
                            </div>
                        </div>


                        <div class="modal fade" id="shoppingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Información</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body" v-if="shopping != ''">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><strong>Cliente</strong></label>
                                                <p>@{{ shopping.name }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label><strong>Email</strong></label>
                                                <p>@{{ shopping.email }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label><strong>Dirección</strong></label>
                                                <p>@{{ shopping.address }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label><strong>Teléfono</strong></label>
                                                <p>@{{ shopping.phone }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label><strong>Costo productos</strong></label>
                                                <p>$ @{{ parseInt(shopping.total_products).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label><strong>Costo envío</strong></label>
                                                <p>$ @{{ parseInt(shopping.shipping_price).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label><strong>Total</strong></label>
                                                <p>$ @{{ parseInt(shopping.total_products + shopping.shipping_price).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</p>
                                            </div>

                                            <div class="col-md-12">
                                                <h3 class="text-center">Productos</h3>
                                            </div>
                                            <div class="col-md-12">
                                                <table class="table table-bordered table-checkable">
                                                    <thead>
                                                        <tr>
                                                            <th>Producto</th>
                                                            <th>Precio</th>
                                                            <th>Color</th>
                                                            <th>Tamaño</th>
                                                            <th>Cantidad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(shoppingPurchase, index) in shopping.product_purchases">
                                                            <td>@{{ shoppingPurchase.product_format.product.name }}</td>
                                                            <td>$ @{{ parseInt(shoppingPurchase.product_format.price).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</td>
                                                            <td>@{{ shoppingPurchase.product_format.color.color }}</td>
                                                            <td>@{{ shoppingPurchase.product_format.size.size }}</td>
                                                            <td>@{{ shoppingPurchase.amount }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
    </section>



    </div>
    </div>
    </section>
</main>
<style>
    .breadcrumbs {
        margin-left: 0rem;
    }
</style>
@include("partials.footer") @endsection @push("scripts")

<script>
    const devArea = new Vue({
        el: "#dev-area",
        data() {
            return {
                name: "{{ Auth::user()->name }}",
                email: "{{ Auth::user()->email }}",
                address: "{{ Auth::user()->address }}",
                telephone: "{{ Auth::user()->phone }}",
                identification: "{{ Auth::user()->identification }}",
                city:"{{ Auth::user()->city }}",

                shopping:"",
                shoppings:[],
                links:[],
                currentPage:"",
                totalPages:"",
                linkClass:"page-link",
                activeLinkClass:"page-link active-link bg-main",


                links:[],
                currentPage:"",
                totalPages:"",

            };
        },
        methods: {
            update() {
                axios
                    .post("{{ url('/perfil/update') }}", {
                        name: this.name,
                        email: this.email,
                        address: this.address,
                        phone: this.telephone,
                        identification: this.identification,
                        city:this.city
                    })
                    .then((res) => {
                        if (res.data.success == true) {
                            swal({
                                "text":res.data.message,
                                "icon":"success"
                            })
                        } else {
                            swal({
                                "text":res.data.message,
                                "icon":"error"
                            })
                        }
                    })
                    .catch((err) => {
                        swal({
                                "text":"Hubo un problema",
                                "icon":"error"
                            })
                    });
            },
            isNumber: function(evt) {
                evt = evt ? evt : window.event;
                var charCode = evt.which ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    evt.preventDefault();
                } else {
                    return true;
                }
            },
            fetch(page = 1){


                axios.get("{{ url('purchases') }}", {
                    params:{
                        "page":page
                    }
                })
                .then(res => {

                    this.shoppings = res.data.data
                    this.links = res.data.links
                    this.currentPage = res.data.current_page
                    this.totalPages = res.data.last_page

                })
                .catch(err => {
                    $.each(err.response.data.errors, function(key, value){
                        alert(value)
                    });
                })

            },
            show(shopping){

                this.shopping = shopping
                console.log(this.shopping)

            },



        },
        mounted() {
            this.fetch()
        },
    });
</script>

@endpush
