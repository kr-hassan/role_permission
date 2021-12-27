@extends('backend.master');
@section('title', 'User Create')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-2 text-primary">Role Add</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('roles.index') }}" type="button" class="btn btn-primary">
                                <i class="fas fa-list"></i> Role List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @CSRF
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="name" class="form-label">Role Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder=" Name (ex: Admin )" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="slug" class="form-label">Role Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="permission" class="form-label">Permission</label>
                                    <input class="input-tags" type="text" data-role="tagsinput" >
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
@push('js')
    <script>
        $(document).ready(function () {
            let str = $(#name).onkeyup(function (e) {
                let str = $(#name).val();
                str = str.replace(/\W+(?!$)/g,'-').

            })

        })
    </script>
@endpush


