@extends('frontend.master')
@section('title', 'Home')
@section('content')

    <!-- revolution slider begin -->
    @include('frontend.partials.slider')
    <!-- revolution slider close -->

    <!-- section begin -->
    <section id="section-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                    <h1>What We Do</h1>
                    <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                    <div class="spacer-single"></div>
                </div>
                @forelse($services as $key=>$service)
                    @php
                        if ($key == 0){
                            $wow_class = "fadeInLeft";
                            $delay = '';
                        } elseif ($key == 2){
                            $wow_class = "fadeInRight";
                            $delay = '';
                        } else{
                            $wow_class = "fadeInUp";
                            $delay = 'data-wow-delay=".2s"';
                        }
                    @endphp
                <div class="col-md-4 wow {{ $wow_class }} {{ $delay }}">
                    <h3><span class="id-color">{{ $service->title_first ?? '' }}</span> {{ $service->title_last ?? '' }}</h3>
                    {{ $service->description ?? '' }}
                    <div class="spacer-single"></div>
                    <a href="{{ route('service_details', $service->uuid) }}">
                        <img src="{{ file_exists(public_path('images/service/'.$service->image)) ? asset('images/service/'.$service->image) : asset('images/service_image.jpg') }}" class="img-responsive" alt="">
                    </a>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <!-- section close -->
    <!-- section begin -->
    <section id="section-portfolio" class="no-top no-bottom" aria-label="section-portfolio">
        <div class="container">

            <div class="spacer-single"></div>

            <!-- portfolio filter begin -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                        <li><a href="#" data-filter="*" class="selected">All Projects</a></li>
                        <li><a href="#" data-filter=".Ongoing">Ongoing</a></li>
                        <li><a href="#" data-filter=".Completed">Completed</a></li>
                    </ul>

                </div>
            </div>
            <!-- portfolio filter close -->

        </div>

        <div id="gallery" class="gallery full-gallery de-gallery pf_full_width wow fadeInUp" data-wow-delay=".3s">

            <!-- gallery item -->
            @forelse($projects as $project)
            <div class="item {{ $project->type ?? 'Ongoing' }}">
                <div class="picframe">
                    <a class="simple-ajax-popup-align-top" href="javascript:void(0)">
                        <span class="overlay">
                            <span class="pf_text">
                                <span class="project-name">{{ $project->title ?? 'New Project' }}</span>
                            </span>
                        </span>
                    </a>
                    <img src="{{ file_exists(public_path('images/projects/'.$project->project_details->first()->image)) ? asset('images/projects/'.$project->project_details->first()->image) : asset('images/project_image.jpg') }}" alt="Project Image" />
                </div>
            </div>
            @empty
            @endforelse
        </div>

        <div id="loader-area">
            <div class="project-load"></div>
        </div>
    </section>
    <!-- section close -->


    <!-- section begin -->
    <section id="view-all-projects" class="call-to-action bg-color text-center" data-speed="5" data-type="background" aria-label="view-all-projects">
        <a href="{{ route('project') }}" class="btn btn-line black btn-big">View All Projects</a>
    </section>
    <!-- logo carousel section close -->
    <!-- Our Team section Start -->
    <section id="section-team">
        <div class="container">

            <div class="row">
                <div class="col-md-12 container-4">
                    <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                        <h1>Our Team</h1>
                        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                        <div class="spacer-single"></div>
                    </div>
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
    <!-- Our Team section End -->
    <!-- section begin -->
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
    <!-- section close -->
@endsection
