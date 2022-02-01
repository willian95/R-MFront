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
        <p><span><a href="/">Inicio </a>></span> Blog</p>
    </div>

    <section>
        <h2 class="mt-0 titles  mb-5 text-start" data-aos="fade-up" data-aos-duration="1300">
            Más recientes</h2>

        <div class="parent-blog">

            @if(App\Models\Blog::orderBy("id", "desc")->first())
                @php
                    $blog = App\Models\Blog::orderBy("id", "desc")->skip(2)->first();
                @endphp
                <div class=" blog-item" data-bs-toggle="modal" data-bs-target=".modal-blog">
                    <img src="{{ $blog->image }}" alt="">
                    <div class="mt-3">
                        <h2>{{ $blog->title }}
                        </h2>
                        <div class="fecha-blog">
                            <span><i class="far fa-calendar-alt"></i>{{ $blog->created_at->format('d-m-Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="modal fade modal-blog" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">

                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                <div class=" blog-item" >
                                <img src="{{ $blog->image }}" alt="">
                                <div class="mt-3">
                                    <h2>{{ $blog->title }}
                                    </h2>
                                    <div class="fecha-blog">
                                        <span><i class="far fa-calendar-alt"></i>{{ $blog->created_at->format('d-m-Y') }}</span>
                                    </div>
                                </div>

                                {!! $blog->description !!}

                            </div>

                            </div>

                        </div>
                    </div>
                </div>

            @endif

            @if(App\Models\Blog::orderBy("id", "desc")->skip(1)->first())
                @php
                    $blog = App\Models\Blog::orderBy("id", "desc")->skip(1)->first();
                @endphp
                <div class="blog-item" data-bs-toggle="modal" data-bs-target=".modal-blog">
                    <img src="{{ $blog->image }}" alt="">
                    <div class="mt-3">
                        <h2>{{ $blog->title }}
                        </h2>
                        <div class="fecha-blog">
                            <span><i class="far fa-calendar-alt"></i>{{ $blog->created_at->format('d-m-Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="modal fade modal-blog" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">

                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                <div class=" blog-item" >
                                <img src="{{ $blog->image }}" alt="">
                                <div class="mt-3">
                                    <h2>{{ $blog->title }}
                                    </h2>
                                    <div class="fecha-blog">
                                        <span><i class="far fa-calendar-alt"></i>{{ $blog->created_at->format('d-m-Y') }}</span>
                                    </div>
                                </div>

                                {!! $blog->description !!}

                            </div>

                            </div>

                        </div>
                    </div>
                </div>
            @endif

            @if(App\Models\Blog::orderBy("id", "desc")->skip(2)->first())
                @php
                    $blog = App\Models\Blog::orderBy("id", "desc")->first();
                @endphp
                <div class=" blog-item" data-bs-toggle="modal" data-bs-target=".modal-blog">
                    <img src="{{ $blog->image }}" alt="">
                    <div class="pt-3 pb-3">
                        <h2>{{ $blog->title }}
                        </h2>
                        <div class="fecha-blog">
                            <span><i class="far fa-calendar-alt"></i>{{ $blog->created_at->format('d-m-Y') }}</span>
                        </div>
                    </div>

                </div>

                <div class="modal fade modal-blog" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">

                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                <div class=" blog-item" >
                                <img src="{{ $blog->image }}" alt="">
                                <div class="mt-3">
                                    <h2>{{ $blog->title }}
                                    </h2>
                                    <div class="fecha-blog">
                                        <span><i class="far fa-calendar-alt"></i>{{ $blog->created_at->format('d-m-Y') }}</span>
                                    </div>
                                </div>

                                {!! $blog->description !!}

                            </div>

                            </div>

                        </div>
                    </div>
                </div>
            @endif

        </div>

    </section>

    <hr>

    <section class="post">
        <div class="row">
            @php
                $count = App\Models\Blog::count();
                $skip = 3;
                $limit = $count - $skip;
            @endphp
            @foreach(App\Models\Blog::orderBy('id', 'desc')->skip($skip)->take($limit)->get() as $blog)
                <div class="col-md-4">
                    <div class=" blog-item" data-bs-toggle="modal" data-bs-target=".modal-blog">
                        <img src="{{ $blog->title }}" alt="">
                        <div class="pt-3 pb-3">
                            <h2 class="titulos">{{ $blog->title }}
                            </h2>
                            <div class="fecha-blog">
                                <span><i class="far fa-calendar-alt"></i>{{ $blog->created_at->format('d-m-Y') }}</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal fade modal-blog" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">

                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                <div class=" blog-item" >
                                <img src="{{ $blog->image }}" alt="">
                                <div class="mt-3">
                                    <h2>{{ $blog->title }}
                                    </h2>
                                    <div class="fecha-blog">
                                        <span><i class="far fa-calendar-alt"></i>{{ $blog->created_at->format('d-m-Y') }}</span>
                                    </div>
                                </div>

                                {!! $blog->description !!}

                            </div>

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
</div>
</main>

@include("partials.footer")
@endsection
