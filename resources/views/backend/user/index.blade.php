@extends('backend.master');
@section('title', 'User')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-6">
                            <h5 class="mb-0 pt-2 text-primary">User List</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('user_create') }}" type="button" class="btn btn-primary w-xs">
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
                                    @if($item->id != 1)
                                        <td>
                                            <a href="{{ route('user_edit', $item->uuid) }}" class="btn btn-sm btn-info p-1" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('user_edit', $item->uuid) }}" class="fa fa-eye" title="view"><i class="fas
                                            fa-edit"></i></a>
                                            @if($item->status==0)
                                                <a href="{{ route('user_status_change', $item->uuid) }}" class="btn btn-sm btn-success p-1" title="Active"><span><i class="fas fa-check"></i></span></a>
                                            @else
                                                <a href="{{ route('user_status_change', $item->uuid) }}" class="btn btn-sm btn-danger p-1" title="Inactive"><span><i class="fas fa-minus"></i></span></a>
                                            @endif
                                            <a href="{{ route('user_remove', $item->uuid) }}" class="btn btn-sm btn-danger p-1" title="Remove"><span><i class="fas fa-trash"></i></span></a>
                                            <a href="{{ route('password_reset', $item->uuid) }}" class="btn btn-sm btn-success p-1" title="Password Reset"><span><i class="fas fa-lock-open"></i></span></a>
                                        </td>
                                    @endif
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
