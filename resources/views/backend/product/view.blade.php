@extends('backend.master');
@section('title', 'Product View')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-1 text-primary">Product View</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('product_list') }}" type="button" class="btn btn-sm btn-primary w-xs">
                                Product List
                            </a>
                            <a href="{{ route('product_image_add', $data->uuid) }}" type="button" class="btn btn-sm btn-primary w-xs">
                                Add Image
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
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
                                    <a href="{{ route('product_feature_image_change', $item->uuid) }}" class="btn btn-sm btn-success w-100" onclick="confirm('Are you Sure ?')">
                                        {{ $item->feature_image == "1" ? 'Feature Image' : 'Set as Feature Image' }}
                                    </a>
                                    @if($data->image->count() > 1)
                                    <a href="{{ route('product_image_remove', $item->uuid) }}" class="btn btn-sm btn-danger w-100" onclick="confirm('Are you Sure ?')">
                                        Remove
                                    </a>
                                    @endif
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
