@extends('backend.master');
@section('title', 'Review Create')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-2 text-primary">Review Edit</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('review') }}" type="button" class="btn btn-primary">
                                <i class="fas fa-list"></i> Review List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('review_update', $data->uuid) }}" method="POST">
                        @CSRF
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 position-relative">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $data->name ?? '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 position-relative">
                                    <label for="comment" class="form-label">Comment</label>
                                    <textarea class="form-control" id="comment" name="comment" required>{{ $data->comment ?? '' }}</textarea>
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
