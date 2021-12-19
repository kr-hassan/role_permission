@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <form action="{{ route('user.create' ) }}" name="userCreateForm" method="post">
                    @csrf
                    <div class="card-header bg-cyan">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title text-bold mt-2">User Create</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('user.list' )}}" class="btn btn-primary"> User List </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <span class="text-danger">*</span>
                                    <input type="text" name="name" id="name" class="form-control"  placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter ..." required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit"  class="btn btn-sm btn-success w-100">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
