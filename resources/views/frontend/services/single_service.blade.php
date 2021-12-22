@extends('frontend.master')
@section('title', 'Gallery')
@section('content')
    <!-- revolution banner begin -->
    @include('frontend.partials.banner')
    <!-- revolution banner close -->
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row p-single">
                        <div class="col-md-6">
                            <div class="p-carousel owl-carousel owl-theme">
                                <img src="{{ file_exists(public_path('images/service/'.$service_details->image)) ? asset('images/service/'.$service_details->image) : asset('images/service_image.jpg') }}" alt="Product Image" height="400px !important">
                            </div>
                            <div class="p-carousel-thumb owl-carousel owl-theme mt20">
                                <img src="{{ file_exists(public_path('images/service/'.$service_details->image)) ? asset('images/service/'.$service_details->image) : asset('images/service_image.jpg') }}" class="img-fluid" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-desc">
                                <h3>{{ $service_details->name ?? '' }}</h3>
                                <p style="text-align: justify;">
                                    {{ \Illuminate\Support\Str::limit($service_details->description, 850, '...') ?? '' }}
                                </p>
                                <div class="spacer-single"></div>
                                <a href="{{ route('contact') }}" class="btn btn-outline-info w-100">Get Quotation</a>
                            </div>
                        </div>

                        <div class="spacer-double"></div>

                        <div class="col-md-12">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <p style="text-align: justify;">
                                        {{ $service_details->description ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
