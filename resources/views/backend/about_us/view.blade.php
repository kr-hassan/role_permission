@extends('backend.master');
@section('title', 'About US View')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-2 text-primary">About Us View</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('about_us_list') }}" type="button" class="btn btn-primary w-xs">
                                About US List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row pt-2">
                        <div class="col-md-6">
                            <figure class="text-center">
                                <blockquote class="blockquote">
                                    <p>
                                        {{ $data->title ?? '' }}
                                    </p>
                                </blockquote>
                            </figure>
                            <hr/>
                            <figure class="text-center">
                                <blockquote class="blockquote">
                                    <p class="font-13">
                                        {{ $data->description ?? '' }}
                                    </p>
                                </blockquote>
                            </figure>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-6">
                                <img src="{{ file_exists(public_path('images/about_us/'.$data->image)) ? asset('images/about_us/'.$data->image) : asset('images/about_us_image.jpg') }}" class="card-img-top" alt="..." width="100px" height="auto">
                                <button class="btn btn-sm btn-danger w-100" onclick="return image_delete({{$data->uuid}})">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
