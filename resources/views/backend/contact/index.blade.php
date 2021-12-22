@extends('backend.master');
@section('title', 'Contact List')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border_dark">
                <div class="card-header border_bottom bg_soft_dark">
                    <div class="row card-title">
                        <div class="col-md-12">
                            <h5 class="mb-0 pt-2 text-primary">Contact List</h5>
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
                                    <td>
                                        @if($item->status == 'Processing')
                                            Processing
                                        @elseif($item->status == 'OnGoing')
                                            OnGoing
                                        @else
                                            Complete
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status == 'Processing')
                                            <a href="{{ route('contact_status_change', $item->uuid) }}" class="btn btn-sm btn-success p-1" title="Processing"><span><i
                                                        class="fas fa-edit"></i></span></a>
                                        @elseif($item->status == 'OnGoing')
                                            <a href="{{ route('contact_status_change', $item->uuid) }}" class="btn btn-sm btn-success p-1"
                                               title="OnGoing"><span><i
                                                        class="fas fa-spinner fa-plus"></i></span></a>
                                        @else
                                            <a href="{{ route('contact_status_change', $item->uuid) }}" class="btn btn-sm btn-danger p-1"
                                               title="Complete"><span><i
                                                        class="fas fa-check"></i></span></a>
                                        @endif
                                        @if($item->attached)
                                            <a href="{{ route('fileDownload', $item->uuid) }}" class="btn btn-sm btn-primary p-1"
                                               title="Download"><span><i
                                                        class="fas fa-download"></i></span></a>
                                        @endif
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
