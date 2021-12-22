@extends('frontend.master')
@section('title', 'Gallery')
@section('content')
    <!-- revolution banner begin -->
    @include('frontend.partials.banner')
    <!-- revolution banner close -->
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row p-single">
                        <div class="col-md-6">
                            <div class="p-carousel owl-carousel owl-theme">
                                @forelse($product_details->image as $product_image)
                                    <img src="{{ file_exists(public_path('images/products/'.$product_image->image)) ? asset('images/products/'.$product_image->image) : asset('images/project_image.jpg') }}" alt="Product Image" height="400px !important">
                                @empty
                                    <img src="{{ asset('images/project_image.jpg') }}" class="img-fluid" alt="">
                                @endforelse
                            </div>
                            <div class="p-carousel-thumb owl-carousel owl-theme mt20">
                                @forelse($product_details->image as $product_image)
                                    <img src="{{ file_exists(public_path('images/products/'.$product_image->image)) ? asset('images/products/'.$product_image->image) : asset('images/project_image.jpg') }}" class="img-fluid" alt="Product Image">
                                @empty
                                    <img src="{{ asset('images/project_image.jpg') }}" class="img-fluid" alt="">
                                @endforelse
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-desc">
                                <h3>{{ $product_details->name ?? '' }}</h3>
                                <p style="text-align: justify;">
                                    {{ \Illuminate\Support\Str::limit($product_details->description, 850, '...') ?? '' }}
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
                                        {{ $product_details->description ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sidebar" class="col-md-3">
                    <div class="widget widget_top_rated_product">
                        <h4>Related Product</h4>
                        <ul>
                            @forelse($category_products as $category_product)
                            <li>
                                <img src="{{ file_exists(public_path('images/products/'.$category_product->image->first()->image)) ? asset('images/products/'.$category_product->image->first()->image) : asset('images/project_image.jpg') }}" alt="">
                                <div class="text">
                                    {{ $category_product->name ?? '' }}
                                </div>
                            </li>
                            @empty
                            <li>
                                <img src="{{ asset('images/project_image.jpg') }}" alt="">
                                <div class="text">
                                    Single Seat Sofa
                                </div>
                            </li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="widget widget_category">
                        <h4>Product Category</h4>
                        <ul>
                            @forelse($categories as $category)
                            <li><a href="#">{{ $category->name ?? '' }}</a></li>
                            @empty
                                <li><a href="javascript:void(0)">Bed</a></li>
                            @endforelse
                        </ul>
                    </div>
                </div>

            </div>
        </div>



    </div>
@endsection
