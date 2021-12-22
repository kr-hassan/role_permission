@extends('backend.master');
@section('title', 'Our Team Edit')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-2 text-primary">Our Team Edit</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('our_team_list') }}" type="button" class="btn btn-primary">
                                <i class="fas fa-list"></i> Our Team List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('our_team_update', $data->uuid) }}" method="POST" enctype="multipart/form-data">
                        @CSRF
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $data->name ?? '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" value="{{ $data->designation ?? '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="fb" class="form-label">Facebook Link</label>
                                    <input type="text" class="form-control" id="fb" name="fb" value="{{ $data->fb ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="tw" class="form-label">Twitter Link</label>
                                    <input type="text" class="form-control" id="tw" name="tw" value="{{ $data->tw ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="sk" class="form-label">Skype Link</label>
                                    <input type="text" class="form-control" id="sk" name="sk" value="{{ $data->sk ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="ln" class="form-label">Linkedin Link</label>
                                    <input type="text" class="form-control" id="ln" name="ln" value="{{ $data->ln ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="in" class="form-label">Instagram Link</label>
                                    <input type="text" class="form-control" id="in" name="in" value="{{ $data->in ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <input type="hidden" id="old_image" name="old_image" value="{{ $data->image }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3 position-relative">
                                    <label for="image" class="form-label">Old Image</label>
                                    <img src="{{ file_exists(public_path('images/our_team/'.$data->image)) ? asset('images/our_team/' . $data->image) : '' }}" alt="Slider Image"
                                         height="100px" width="200px">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 position-relative">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" required>
                                        {{ $data->description ?? '' }}
                                    </textarea>
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
