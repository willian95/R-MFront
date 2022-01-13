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
