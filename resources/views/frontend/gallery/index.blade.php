@extends('frontend.master')
@section('title', 'Gallery')
@section('content')
    <!-- revolution banner begin -->
    @include('frontend.partials.banner')
    <!-- revolution banner close -->
    <div id="content">
        <div class="container">

            <div class="spacer-single"></div>

            <div id="gallery" class="row gallery full-gallery de-gallery pf_4_cols wow fadeInUp" data-wow-delay=".3s">

                <!-- gallery item -->
                @forelse($gallerys as $gallery)
                <div class="col-md-4 col-sm-6 col-xs-12 item mb30">
                    <div class="picframe">
                        <a class="simple-ajax-popup-align-top" href="javascript:void(0)">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">{{ $gallery->title ?? 'New Project' }}</span>
                                    </span>
                                </span>
                        </a>
                        <img src="{{ file_exists(public_path('images/gallery/'.$gallery->image)) ? asset('images/gallery/'.$gallery->image) : asset('images/project_image.jpg') }}" alt="" />
                    </div>
                </div>
                @empty
                @endforelse
                <!-- close gallery item -->

            </div>
        </div>
    </div>
@endsection
