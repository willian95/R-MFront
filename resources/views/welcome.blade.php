@extends("layouts.main")
@section("content")
@include("partials.header")

<main>
@include("partials.banner")
@include("partials.categorias")
@include("partials.ads")
@include("partials.servicios")
@include("partials.tienda")

</main>

@include("partials.footer")
@endsection

@push("scripts")

    <script>
        let sum = 0
        const order = window.localStorage.getItem("order")
        $.get("{{ url('/cart') }}?order_id="+order, function(data, status){
            
            data.map((data) => {
                sum += data.amount
            })
            $("#cart-counter").html(sum)
        });
        
    </script>


@endpush
