@extends('frontend.master')
@section('title', 'Contact Us')
@section('content')
    <!-- revolution banner begin -->
    @include('frontend.partials.banner')
    <!-- revolution banner close -->
    <div id="content" class="no-top no-bottom">
        <section id="section-about-us-2" class="side-bg no-padding">
            <div class="image-container col-md-5 pull-left" style="background: url('images/about_us/{{ $about_us->image ?? '' }}')" data-delay="0"></div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-6 " data-animation="fadeInRight" data-delay="200">
                        <div class="inner-padding">
                            <h2>{{ $about_us->title ?? '' }}</h2>

                            <p class="intro">
                                {{ $about_us->description ?? '' }}
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <section id="section-team">
            <div class="container">

                <div class="row">
                    <div class="col-md-12 container-4">
                        <!-- team member -->
                        @forelse($our_team as $item)
                        <div class="de-team-list">
                            <div class="team-pic">
                                <img src="{{ file_exists(public_path('images/our_team/'.$item->image)) ? asset('images/our_team/'.$item->image) : asset('images/our_team_image.jpg') }}" class="img-responsive" alt="" />
                            </div>
                            <div class="team-desc col-md-12">
                                <h3>{{ $item->name ?? '' }}</h3>
                                <p class="lead">{{ $item->designation ?? '' }}</p>
                                <div class="small-border"></div>
                                <p>{{ $item->description ?? '' }}</p>

                                <div class="social">
                                    <a href="{{ $item->fb ?? '#' }}"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="{{ $item->tw ?? '#' }}"><i class="fab fa-twitter fa-lg"></i></a>
                                    <a href="{{ $item->sk ?? '#' }}"><i class="fab fa-skype fa-lg"></i></a>
                                    <a href="{{ $item->ln ?? '#' }}"><i class="fab fa-linkedin fa-lg"></i></a>
                                    <a href="{{ $item->in ?? '#' }}"><i class="fab fa-instagram fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                        <!-- team close -->
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
        </section>

        <section id="section-testimonial" class="text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                        <h1>Customer Says</h1>
                        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                        <div class="spacer-single"></div>
                    </div>
                </div>
                <div id="testimonial-carousel" class="owl-carousel owl-theme de_carousel wow fadeInUp" data-wow-delay=".3s">
                    @forelse($reviews as $review)
                    <div class="item">
                        <div class="de_testi">
                            <blockquote>
                                <p>{{ $review->comment ?? '' }}</p>
                                <div class="de_testi_by">
                                    {{ $review->name ?? '' }}, Customer
                                </div>
                            </blockquote>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>

        <!-- section begin -->
        <section id="view-all-projects" class="call-to-action bg-color dark text-center" data-speed="5" data-type="background" aria-label="view-all-projects">
            <a href="{{ route('contact') }}" class="btn btn-line black btn-big">Talk With Us</a>
        </section>
        <!-- logo carousel section close -->



    </div>
@endsection
