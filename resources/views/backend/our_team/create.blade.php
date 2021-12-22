@extends('backend.master');
@section('title', 'Our Team Create')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-2 text-primary">Our Team Add</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('our_team_list') }}" type="button" class="btn btn-primary">
                                <i class="fas fa-list"></i> Our Team List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('our_team_store') }}" method="POST" enctype="multipart/form-data">
                        @CSRF
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name (ex: Roktim Ariyan )" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation (ex: Developer )" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="fb" class="form-label">Facebook Link</label>
                                    <input type="text" class="form-control" id="fb" name="fb" placeholder="Facebook Link (ex: facebook.com/roktim )">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="tw" class="form-label">Twitter Link</label>
                                    <input type="text" class="form-control" id="tw" name="tw" placeholder="Twitter Link (ex: twitter.com/roktim )">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="sk" class="form-label">Skype Link</label>
                                    <input type="text" class="form-control" id="sk" name="sk" placeholder="Skype Link (ex: skype.com/roktim )">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="ln" class="form-label">Linkedin Link</label>
                                    <input type="text" class="form-control" id="ln" name="ln" placeholder="Linkedin Link (ex: linkedin.com/roktim )">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="in" class="form-label">Instagram Link</label>
                                    <input type="text" class="form-control" id="in" name="in" placeholder="Instagram Link (ex: instagram.com/roktim )">
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
