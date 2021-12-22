@extends('backend.master');
@section('title', 'User')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card border_dark">
            <div class="card-header border_bottom bg_soft_dark">
                <div class="row card-title">
                    <div class="col-md-6">
                        <h5 class="mb-0 pt-2 text-primary">Trash User List</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('user') }}" type="button" class="btn btn-primary w-xs">
                            <i class="fas fa-plus-square"></i> Active User
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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $key=>$item)
                        <tr class="border_bottom">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name ?? '' }}</td>
                            <td>{{ $item->phone ?? '' }}</td>
                            <td>{{ $item->email ?? '' }}</td>
                            <td>{{ $item->status==0 ? 'Inactive' : 'Active' }}</td>
                            <td>
                                <a href="{{ route('user_retrieve', $item->uuid) }}" class="btn btn-sm btn-success p-1" title="Remove"><span><i class="fas fa-check"></i></span></a>
                            </td>
                        </tr>
                        @empty
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
