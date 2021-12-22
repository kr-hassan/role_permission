@extends('backend.master');
@section('title', 'Service Create')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-2 text-primary">Service Add</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('service_list') }}" type="button" class="btn btn-primary">
                                <i class="fas fa-list"></i> Service List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('service_store') }}" method="POST" enctype="multipart/form-data">
                        @CSRF
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="title_first" class="form-label">First Title</label>
                                    <input type="text" class="form-control" id="title_first" name="title_first" placeholder="First Title (ex: FEATURED )" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="title_last" class="form-label">Last Title</label>
                                    <input type="text" class="form-control" id="title_last" name="title_last" placeholder="Last Title (ex: PROJECT )" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="priority" class="form-label">Priority</label>
                                    <input type="text" class="form-control" id="priority" name="priority" placeholder="Priority (ex: 1 )">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 position-relative">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" required></textarea>
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
