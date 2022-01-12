@extends("layouts.main")
@section("content")
<div class="header-two">
    @include("partials.header")
</div>

<main>
    <div class="breadcrumbs">
        <p><span><a href="/">Inicio </a>></span> Blog</p>
    </div>

    @include("partials.categorias")






</main>

@include("partials.footer")
@endsection
