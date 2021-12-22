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
                    <ul class="products row">
                    @forelse($products as $product)
                        <li class="col-xl-4 col-lg-4 col-md-6 product">
                        <div class="p-inner">
                            <div class="p-images">
                                <a href="{{ route('product_details', $product->uuid) }}">
                                    <img src="{{ file_exists(public_path('images/products/'.$product->image->first()->image)) ? asset('images/products/'.$product->image->first()->image) : asset('images/project_image.jpg') }}" class="pi-1" alt="" width="100% !important" height="150px !important">
                                    @if($product->image->count() > 1)
                                    <img src="{{ file_exists(public_path('images/products/'.$product->image->skip(1)->first()->image)) ? asset('images/products/'.$product->image->skip(1)->first()->image) : asset('images/project_image.jpg') }}" class="pi-2" alt="" width="100% !important" height="150px !important">
                                    @endif
                                </a>
                            </div>
                            <a href="{{ route('product_details', $product->uuid) }}">
                                <h4>{{ $product->name ?? '' }}</h4>
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-sm btn-outline-success w-100">Get Quotation</a>
                        </div>
                    </li>
                    @empty
                        <li class="col-xl-3 col-lg-4 col-md-6 product">
                            <div class="p-inner">
                                <div class="p-images">
                                    <a href="javascript:void(0)">
                                        <img src="images/shop/1a.jpg" class="pi-1 img-responsive" alt="">
                                        <img src="images/shop/1b.jpg" class="pi-2 img-responsive" alt="">
                                    </a>
                                </div>
                                <a href="javascript:void(0)">
                                    <h4>Triple Seat Sofa</h4>
                                </a>
                                <a href="{{ route('contact') }}" class="btn btn-sm btn-outline-success w-100">Get Quotation</a>
                            </div>
                        </li>
                    @endforelse
                    </ul>

                    <div class="d-felx justify-content-center">
                        {{ $products->links() }}
                    </div>

                </div>

                <div id="sidebar" class="col-md-3">
                    <div class="widget widget_top_rated_product">
                        <h4>Top Rated Product</h4>
                        <ul>
                            @forelse($random_products as $product)
                                <li>
                                    <img src="{{ file_exists(public_path('images/products/'.$product->image->first()->image)) ? asset('images/products/'.$product->image->first()->image) : asset('images/project_image.jpg') }}" alt="">
                                    <div class="text">
                                        {{ $product->name ?? '' }}
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
