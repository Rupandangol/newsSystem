@extends('Backend.master')
@section('title')
    Manage User
@endsection
@section('content')
    @if(session('deleted'))
        <div class="alert alert-danger">{{session('deleted')}}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    <table class="table table-striped">

        <tr>
            <th>*</th>
            <th>Username</th>
            <th>Email</th>
            <th>Address</th>
            <th>Created At</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @forelse($subscriber as $key=>$value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{ucfirst($value->username)}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->address}}</td>
                <td>{{$value->created_at->diffForHumans()}}</td>
                <td><a class="btn btn-primary" href="{{url('/@admin@/manageUser/updateUser/'.$value->id)}}"><i
                                class="fa fa-pencil"></i></a></td>
                <td><a class="btn btn-danger" href="{{url('/@admin@/manageUser/deleteUser/'.$value->id)}}"><i
                                class="fa fa-trash"></i></a></td>
            </tr>
        @empty
            <tr>
                <td>#</td>
                <td colspan="6">
                    <a href="{{url('/@admin@/addUser')}}"> Add User   <i class="fa fa-user-plus "></i></a>
                </td>
            </tr>
        @endforelse


    </table>

@endsection