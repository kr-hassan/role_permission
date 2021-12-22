@extends('backend.master');
@section('title', 'Product Add Image')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-1 text-primary">Product Add Image</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('product_list') }}" type="button" class="btn btn-sm btn-primary w-xs">
                                Product List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <form action="{{ route('product_image_store', $data->uuid) }}" method="POST" enctype="multipart/form-data">
                        @CSRF
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12 mx-auto">
                                    <div class="input_images" id="images" style="padding-top: .5rem;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary w-100" type="submit">Add Image</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12">
                            <figure class="text-center">
                                <blockquote class="blockquote">
                                    <p>
                                        {{ $data->name ?? '' }}
                                    </p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    <cite title="Source Title">
                                        {{ $data->category->name ?? '' }}
                                    </cite>
                                </figcaption>
                            </figure>
                            <hr/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <figure class="text-center">
                                <blockquote class="blockquote">
                                    <p class="font-13">
                                        {{ $data->description ?? '' }}
                                    </p>
                                </blockquote>
                            </figure>
                            <hr/>
                        </div>
                    </div>
                    <div class="row append_data">
                        @forelse($data->image as $key=>$item)
                            <div class="col-md-3">
                                <div class="card mb-3">
                                    <img src="{{ file_exists(public_path('images/products/'.$item->image)) ? asset('images/products/'.$item->image) : asset('images/product_image.jpg') }}" class="card-img-top" alt="..." width="100px" height="150px">
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('.input_images').imageUploader();
        });
    </script>
@endpush
