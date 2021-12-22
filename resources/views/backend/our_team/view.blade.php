@extends('backend.master');
@section('title', 'Our Team View')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-2 text-primary">Our Team View</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('our_team_list') }}" type="button" class="btn btn-primary w-xs">
                                Our Team List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row pt-2">
                        <div class="col-md-6">
                            <figure class="mx-2">
                                <blockquote class="blockquote">
                                    <p>
                                        {{ $data->name ?? '' }} [{{ $data->designation ?? '' }}]
                                    </p>
                                    <p class="font-14">
                                        {{ $data->fb ?? '' }}
                                    </p>
                                    <p class="font-14">
                                        {{ $data->tw ?? '' }}
                                    </p>
                                    <p class="font-14">
                                        {{ $data->sk ?? '' }}
                                    </p>
                                    <p class="font-14">
                                        {{ $data->ln ?? '' }}
                                    </p>
                                    <p class="font-14">
                                        {{ $data->in ?? '' }}
                                    </p>
                                </blockquote>
                            </figure>
                            <hr/>
                            <figure class="mx-2">
                                <blockquote class="blockquote">
                                    <p class="font-13">
                                        {{ $data->description ?? '' }}
                                    </p>
                                </blockquote>
                            </figure>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-6">
                                <img src="{{ file_exists(public_path('images/our_team/'.$data->image)) ? asset('images/our_team/'.$data->image) : asset('images/our_team_image.jpg') }}" class="card-img-top" alt="..." width="100px" height="auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
