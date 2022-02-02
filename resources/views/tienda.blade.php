@extends("layouts.main")
@section("content")
<div class="header-two">
    @include("partials.header")
</div>

<main>
    <div class="mt-9 top-fix">
        @include("partials.categorias")
    </div>
    <!--------------------------------tienda---------------------------------------->
    <section class="container main-tienda" id="dev-tienda">
        <h2 class="mt-0 titles mt-5 mb-5">R&M Tienda Virtual</h2>

        <div class="row">
            <div class="col-md-3">
                <!-- Isotope menu -->
                <div class=" container_menu_iso mb-4" data-aos="fade-up" data-aos-duration="1000" >
                    <div class="row">
                        <!------------------------filtro-------------------------->
                        <div class="col-sm-12">
                            <div class="menu_iso" id="custom-filter">
                                <li>
                                    <a data-filter=".caninos" @click="toggleAnimalType('dog')"><img src="{{ url('assets/img/icons/canino-icon.png') }}" alt="">
                                        <span>Caninos</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-filter=".felinos" @click="toggleAnimalType('cat')"><img src="{{ url('assets/img/icons/felino-icon.png') }}" alt="">
                                        <span>Felinos</span>
                                    </a>
                                </li>

                            </div>
                        </div>

                        <!------------------------check-------------------------->
                        <div class="col-sm-12">
                            <div class="options">
                                <p>Categorías
</p>
                                <div class="form-check" v-for="category in categories">
                                    <input class="form-check-input category-checkbox" type="checkbox" value="" :id="'category'+category.id" @change="toggleCategory(category.id)">
                                    <label class="form-check-label" :for="'category'+category.id">
                                        @{{ category.name }}
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <!-- Isotope Gallery -->
                <div class="container container_gallery_iso" data-aos="fade-up" data-aos-duration="1100">
                    <div class="row iso-container">



                        <p v-if="products.length == 0 && loadingProducts == false">Nada para mostrar</p>

                        <!-- ----1---- -->
                        <div class="col-xs-6 col-sm-4 cent isotope-item" v-for="product in products">
                           <a :href="'{{ url('/producto') }}'+'/'+product.slug">
                                <div class="img_iso" :style='{ backgroundImage: `url(${product.image})` }'>
                                    <div class="hover_iso" :style='{ backgroundImage: `url(${product.image_hover})` }'></div>
                                </div>
                                <div class="titulo-product">
                                    <h3>@{{ product.name }}</h3>
                                    <p>Desde: $ 
                                        <span v-if="product.product_formats[0].discount_price > 0">@{{ currencyFormatDE(product.product_formats[0].discount_price) }}</span> 
                                        <span v-if="product.product_formats[0].discount_price > 0"> <strike> $ @{{ currencyFormatDE(product.product_formats[0].price) }}</strike> </span>

                                        <span v-if="product.product_formats[0].discount_price <= 0">$ @{{ currencyFormatDE(product.product_formats[0].price) }}</span> 

                                        </p>
                                </div>
                            </a>
                        </div>



                    </div>
                    {{--<div class="row w-100">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="kt_datatable_info" role="status" aria-live="polite">Mostrando página @{{ currentPage }} de @{{ totalPages }}</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_full_numbers" id="kt_datatable_paginate">
                                <ul class="pagination">

                                    <li class="paginate_button page-item active" v-for="(link, index) in links">
                                        <a style="cursor: pointer" aria-controls="kt_datatable" tabindex="0" :class="link.active == false ? linkClass : activeLinkClass":key="index" @click="getProducts(link.url)" v-html="link.label.replace('Previous', 'Anterior').replace('Next', 'Siguiente')"></a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>--}}



                </div>
            </div>
        </div>


    </section>

</main>

@include("partials.footer")
@endsection

@push("scripts")
    <script src="{{ asset('/js/app.js') }}"></script>
    <script>

        const app = new Vue({
            el: '#dev-tienda',
            data() {
                return {
                    animalType:"dog",
                    products:[],
                    brands:[],
                    categories:[],
                    choosenCategories:[],
                    loadingCategories:false,
                    loadingProducts:false,
                    selectedBrand:"all",

                    links:[],
                    currentPage:"",
                    totalPages:"",
                    linkClass:"page-link",
                    activeLinkClass:"page-link active-link bg-main",
                }
            },
            methods: {

                toggleAnimalType(animal){

                    this.animalType = animal
                    this.clearChoosenCategories()
                    this.getCategories()

                },
                async getCategories(){
                    this.loadingCategories = true
                    let response = await axios.get("{{ url('categories/fetch-all') }}"+"/"+this.animalType)
                    this.categories = response.data
                    this.loadingCategories = false

                    this.getProducts()

                },
                toggleCategory(category){

                    if(this.choosenCategories.indexOf(category) < 0){
                        this.choosenCategories.push(category)
                    }else{

                        this.choosenCategories.splice(this.choosenCategories.indexOf(category), 1)

                    }

                    this.getProducts()

                },
                async getProducts(link = "{{ url('/products') }}"){
                    this.loadingProducts = true
                    let response = await axios.get(link, {
                        params:{
                            categories: this.choosenCategories,
                            brands: this.selectedBrand,
                            animal: this.animalType
                        }
                    })
                    this.loadingProducts = false

                    this.products = response.data.data
                    this.links = response.data.links
                    this.currentPage = response.data.current_page
                    this.totalPages = response.data.last_page


                },
                clearChoosenCategories(){
                    this.choosenCategories = []

                    var inputs = document.querySelectorAll('.category-checkbox');
                    for (var i = 0; i < inputs.length; i++) {
                        inputs[i].checked = false;
                    }


                },
                currencyFormatDE(num) {
                    return (
                        num
                        .toFixed(0) // always two decimal digits
                        .replace('.', ',') // replace decimal point character with ,
                        .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
                    ) // use . as a separator
                },
                async fetchGetBrands(){

                    const response = await axios.get("{{ url('/brands/fetch') }}")
                    this.brands = response.data
                }


            },
            created() {

                this.getCategories()

            }
        });
    </script>

@endpush
