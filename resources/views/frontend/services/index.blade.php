@extends('frontend.master')
@section('title', 'Home')
@section('content')
    <!-- revolution banner begin -->
    @include('frontend.partials.banner')
    <!-- revolution banner close -->
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                    <h1>What We Do</h1>
                    <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                    <div class="spacer-single"></div>
                </div>
                @forelse($services as $key=>$service)
                    @php
                        if ($key % 2 == 0){
                            $wow_class = "fadeInDown";
                            $delay = '';
                        }else{
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
                        <a href="{{ route('service_details', $service->uuid) }}" class="btn btn-sm btn-outline-info w-100 mt-2">
                            Details
                        </a>
                    </div>
                @empty
                @endforelse
                <div class="d-felx justify-content-center">
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
