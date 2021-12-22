@extends('backend.master');
@section('title', 'About Us')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-2 text-primary">About Us List</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('about_us_create') }}" type="button" class="btn btn-sm btn-primary w-xs">
                                <i class="fas fa-plus-square"></i> Add New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0 font-13">
                            <thead class="table-secondary">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($data as $key=>$item)
                                <tr class="border_bottom">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title ?? '' }}</td>
                                    <td>{{ $item->description ?? '' }}</td>
                                    <td>
                                        <img src="{{ file_exists(public_path('images/about_us/'.$item->image)) ? asset('images/about_us/' . $item->image) : asset('images/about_us_image.jpg') }}" class="img-responsive img-circle" style="width: 50px; margin: auto; " alt="about_us_image">
                                    </td>
                                    <td>
                                        <a href="{{ route('about_us_edit', $item->uuid) }}" class="btn btn-sm btn-info p-1" title="Edit"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <p class="text-center">
                                        No Data Found!!!
                                    </p>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                        <span class="float-end p-0">{{ $data->links() }}</span>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
