@extends('backend.master');
@section('title', 'Slider')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-12">
                            <h5 class="mb-0 pt-2 text-primary">Gallery Image</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('gallery_store') }}" method="POST" enctype="multipart/form-data">
                                    @CSRF
                                    <div class="col-md-12 mx-auto">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" id="title" name="title" class="form-control" />
                                    </div>
                                    <div class="col-md-12 mx-auto">
                                        <div class="input_images" id="images" style="padding-top: .5rem;"></div>
                                    </div>
                                    <div class="col-md-12 mx-auto">
                                        <button type="submit" class="btn btn-sm btn-success w-100">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row append_data">
                        @forelse($data as $key=>$item)
                            <div class="col-md-3">
                                <div class="card mb-3">
                                    <img src="{{ file_exists(public_path('images/gallery/' . $item->image)) ? asset('images/gallery/' . $item->image) : asset('images/gallery_image.jpg') }}"
                                        class="card-img-top" alt="..." width="100px" height="150px">
                                    <div class="card-body">
                                        <p class="card-title" style="font-weight: bold;">{{ $item->title ?? '' }}</p>
                                    </div>
                                    <a href="{{ route('gallery_image_remove', $item->uuid) }}"
                                        class="btn btn-sm btn-danger w-100"
                                        onclick=" return confirm('Are You sure')">Delete</a>
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
        $(document).ready(function() {
            $('.input_images').imageUploader();
        });
    </script>
@endpush
