<footer class="footer" style="background-image: url(assets/img/stock/peluquería_SPAAromaterapiaymasajesderelajación.jpg);">

    <div class="container contente-footer">
        <h2 class="mt-0 titles m-0 pb-3" data-aos="fade-up"
     data-aos-duration="1300">Contáctanos</h2>
        <p class="pb-4" data-aos="fade-up"
     data-aos-duration="1300">En el transcurso de una hora o
            antes estaremos en comunicación
            para resolver tu solicitud.
        </p>

        <div data-aos="fade-up"
     data-aos-duration="2000">
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
        <p>Copyright © 2022 . All rights reserved</p>
    </div>


    <a href=""  class="ws"><img src="{{ url('assets/img/icons/whatsapp.png') }}" alt=""></a>


@push("scripts")

    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        const contact = new Vue({
            el: '#dev-contact',
            data() {
                return {
                    name:"",
                    email:"",
                    phone:"",
                    message:"",
                    errors:[]
                }
            },
            methods: {
                
                async sendMessage(){
                    
                    this.errors = []

                    try{

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
                        
                    }catch(err) {

                        this.errors = err.response.data.errors

                    }
                },

                

            },
            created() {

            }
        });
    </script>


@endpush
