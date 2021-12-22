@extends('backend.master');
@section('title', 'About Us Edit')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-2 text-primary">About Us Edit</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('about_us_list') }}" type="button" class="btn btn-primary">
                                <i class="fas fa-list"></i> About Us List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('about_us_update', $data->uuid) }}" method="POST" enctype="multipart/form-data">
                        @CSRF
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="image" class="form-label">New Image</label>
                                    <input type="file" class="form-control" id="image" name="image" />
                                    <input type="hidden" id="old_image" name="old_image" value="{{ $data->image }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3 position-relative">
                                    <label for="image" class="form-label">Old Image</label>
                                    <img src="{{ file_exists(public_path('images/about_us/'.$data->image)) ? asset('images/about_us/' . $data->image) : '' }}" alt="Slider Image"
                                         height="100px" width="200px">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 position-relative">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="10" cols="10" required>{{ $data->description ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary w-100" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
