@extends('backend.master');
@section('title', 'Slider Create')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-2 text-primary">Slider Add</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('slider') }}" type="button" class="btn btn-primary">
                                <i class="fas fa-list"></i> Slider List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('slider_store') }}" method="POST" enctype="multipart/form-data">
                        @CSRF
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="caption" class="form-label">Caption</label>
                                    <input type="text" class="form-control" id="caption" name="caption" placeholder="Caption (ex: FEATURED PROJECT )" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title (ex: GREEN INTERIOR )" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3 position-relative">
                                    <label for="button_text" class="form-label">Button Text</label>
                                    <input type="text" class="form-control" id="button_text" name="button_text" placeholder="Button Text (ex: Our Portfolio )" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3 position-relative">
                                    <label for="priority" class="form-label">Priority</label>
                                    <input type="text" class="form-control" id="priority" name="priority" placeholder="Priority (ex: 1 )">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3 position-relative">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
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
