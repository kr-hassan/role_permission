@extends('backend.master');
@section('title', 'User Create')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-2 text-primary">User Edit</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('user') }}" type="button" class="btn btn-primary">
                                <i class="fas fa-list"></i> User List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @CSRF
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $role->name ?? '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $role->slug ?? '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="email" class="form-label">Add Permission</label>
                                    <input type="text" class="form-control" data-role="tagsinput" id="roles_permission" name="roles_permission"
                                           value="{{
                                    $role->permission ?? '' }}"
                                           required>
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
