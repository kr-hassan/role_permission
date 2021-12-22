@extends('frontend.master')
@section('title', 'Projects')
@section('content')
    <!-- revolution banner begin -->
    @include('frontend.partials.banner')
    <!-- revolution banner close -->
    <div id="content">
        <div class="container">

            <div class="spacer-single"></div>

            <!-- portfolio filter begin -->
            <div class="row">
                <div class="col-md-12">
                    <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                        <li><a href="#" data-filter=".Ongoing">Ongoing</a></li>
                        <li><a href="#" data-filter=".Completed">Completed</a></li>
                        <li class="pull-right"><a href="#" data-filter="*" class="selected">All Projects</a></li>
                    </ul>

                </div>
            </div>
            <!-- portfolio filter close -->

            <div id="gallery" class="row gallery full-gallery de-gallery pf_4_cols wow fadeInUp" data-wow-delay=".3s">

                <!-- gallery item -->
                @forelse($projects as $project)
                <div class="col-md-4 col-sm-6 col-xs-12 item mb30 {{ $project->type ?? 'Ongoing' }}">
                    <div class="picframe">
                        <a class="simple-ajax-popup-align-top" href="javascript:void(0)">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">{{ $project->title ?? 'New Project' }}</span>
                                    </span>
                                </span>
                        </a>
                        <img src="{{ file_exists(public_path('images/projects/'.$project->project_details->first()->image)) ? asset('images/projects/'.$project->project_details->first()->image) : asset('images/project_image.jpg') }}" alt="" />
                    </div>
                </div>
                @empty
                @endforelse
                <!-- close gallery item -->

            </div>
        </div>
    </div>
@endsection
