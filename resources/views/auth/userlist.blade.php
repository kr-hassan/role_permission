@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <div class="card-header bg-cyan">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title text-bold mt-2">User List</h3>
                        </div>
                        {{--                        <div class="col-md-6 text-right">--}}
                        {{--                            <a href="{{route('createMenuPage' )}}" class="btn btn-primary"> Create New </a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email  }}</td>
                                        <td>{{$user->status===0 ? 'Inactive' : 'Active' }}</td>
                                        <td>
                                            <a href="" class="pr-1 pl-1 rounded badge-info"
                                               data-toggle="tooltip"
                                               data-placement="top" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            @if ($user->status == 1)
                                                <a href="{{route('inactiveUser',$user->id)}}"
                                                   class="pr-1 pl-1 rounded badge-danger" data-toggle="tooltip"
                                                   data-placement="top" title="Inactive"><i class="fas fa-times"></i></a>
                                            @else
                                                <a href="{{route('activeUser',$user->id)}}"
                                                   class="pr-1 pl-1 rounded badge-success" data-toggle="tooltip"
                                                   data-placement="top" title="Active"><i class="fas fa-check"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
