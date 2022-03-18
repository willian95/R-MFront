<footer id="contacto" class="footer" style="background-image: url(assets/img/servicio/Colegio2.jpg);">

    <div class="container contente-footer">
        <h2 class="mt-0 titles m-0 pb-3" data-aos="fade-up" data-aos-duration="1300">Contáctanos</h2>
        <p class="pb-4" data-aos="fade-up" data-aos-duration="1300">Tu opinión es muy importante para nosotros escríbenos y te responderemos cuanto antes.
        </p>

        <div data-aos="fade-up" data-aos-duration="2000">
            <form id="dev-contact">
                <div class="row">
                    <div class="col-md-6 text-start">
                        <label for="nombre" class="form-label">Nombre y apellido</label>
                        <input type="text" class="form-control" id="nombre" aria-describedby="" v-model="name">
                        <small v-if="errors.hasOwnProperty('name')">@{{ errors['name'][0] }}</small>
                    </div>
                    <div class="col-md-6 text-start">
                        <label for="Teléfono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="Teléfono" aria-describedby="" v-model="phone">
                        <small v-if="errors.hasOwnProperty('phone')">@{{ errors['phone'][0] }}</small>
                    </div>
                    <div class="col-md-12 text-start mt-4 mb-4">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="email">
                        <small v-if="errors.hasOwnProperty('email')">@{{ errors['email'][0] }}</small>
                    </div>
                    <div class="col-md-12 text-start">
                        <label for="exampleInputEmail1" class="form-label">Mensaje</label>
                        <textarea name="" id="" cols="56" rows="5" v-model="message"></textarea>
                        <small v-if="errors.hasOwnProperty('message')">@{{ errors['message'][0] }}</small>
                    </div>
                </div>
                <button type="button" @click="sendMessage()" class="btn btn-reds mt-4">Enviar</button>
            </form>
        </div>
    </div>

</footer>
<div class="copy">
    <p> R&M Clínica Veterinaria - Copyright © 2022 . Todos los derechos reservados</p>
</div>

<div class="fix-contect">
    <div class="ws"><img src="{{ url('assets/img/icons/contact.svg') }}" alt="">
    <div class="info-contact">

<div class="row">
    <div class="col-md-12 pb-2 line-c">
        <a href="https://api.whatsapp.com/send?phone=+573014739866&text=¡Hola!,%20quiero%20informaci%C3%B3n%20acerca%20d..." target="_blank" class="icon-info_contact"><img src="{{ url('assets/img/icons/whatsapp.png') }}" alt="">
            ¡Escribenos ya al whatsapp!
        </a>
    </div>
    <hr>
    <div class="col-md-12 pt-2">
        <a href="tel:+576016141331" class="icon-info_contact"><img src="{{ url('assets/img/icons/phone.svg') }}" alt="">
            Llámanos Ya 24/7 <br> ¡Urgencias!
        </a>
    </div>
</div>
</div>
</div>

</div>


<!-- Modal -->
<div class="modal fade pwa-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <h3 class="text-center mb-4">Hola! Sabes que es R&M Vet PWA?</h3>
                <p class="text-center mb-4">Sabias que puedes añadir un atajo de nuestra tienda a tu celular? Es fácil! Ingresa en tu navegador Safari en iPhone y Chrome en Android, haz tap en el icono de compartir y selecciona la opción de añadir a mi escritorio! Y listo</p>

                <div class="text-center">
                    <img class="img-pwa" src="http://imgfz.com/i/kgFbf9V.png" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Entendido
                </button>

            </div>
        </div>
    </div>
</div>


@push("scripts")

<script src="{{ asset('/js/app.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    const contact = new Vue({
        el: '#dev-contact',
        data() {
            return {
                name: "",
                email: "",
                phone: "",
                message: "",
                errors: []
            }
        },
        methods: {

            async sendMessage() {

                this.errors = []

                try {

                    let response = await axios.post("{{ url('/send-contact-message') }}", {
                        name: this.name,
                        email: this.email,
                        phone: this.phone,
                        text: this.message
                    })

                    if (response.data.success == true) {
                        swal({
                            title: "Excelente!",
                            text: response.data.msg,
                            icon: "success"
                        });
                        this.name = ""
                        this.email = ""
                        this.phone = ""
                        this.message = ""
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



        },
        created() {

        }
    });
</script>


@endpush
