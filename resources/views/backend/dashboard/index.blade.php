@extends('backend.master')
@section('title', 'Dashboard')
@section('content')
    <div class="row pt-4">
        <div class="col-lg-4">
            <div class="card bg-primary text-white-50">
                <div class="card-body">
                    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-bullseye-arrow me-3"></i> Primary Card</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-success text-white-50">
                <div class="card-body">
                    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-check-all me-3"></i> Success Card</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-info text-white-50">
                <div class="card-body">
                    <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-alert-circle-outline me-3"></i>Info Card</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
