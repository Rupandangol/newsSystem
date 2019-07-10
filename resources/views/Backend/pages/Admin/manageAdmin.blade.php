@extends('Backend.master')
@section('title')
    Manage Admin
@endsection
@section('content')
@if(session('deleted'))
    <div class="alert alert-danger">{{session('deleted')}}</div>
    @endif
    <table class="table table-striped">

        <tr>
            <th>*</th>
            <th>Username</th>
            <th>Type</th>
            <th>Address</th>
            <th>Created At</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @forelse($admin as $key=>$value)
        <tr>
            <td>{{++$key}}</td>
            <td>{{ucfirst($value->username)}}</td>
            <td>
                @if($value->type==='Super Admin')
                    <i class="fa fa-user-secret" ></i>
                    @else
                    <i class="fa fa-user"></i>
                @endif
            </td>
            <td>{{$value->address}}</td>
            <td>{{$value->created_at->diffForHumans()}}</td>
            <td><a class="btn btn-primary" href="{{url('/@admin@/manageAdmin/updateAdmin/'.$value->id)}}"><i class="fa fa-pencil"></i></a></td>
            <td><a class="btn btn-danger" href="{{url('/@admin@/manageAdmin/deleteAdmin/'.$value->id)}}"><i class="fa fa-trash"></i></a></td>
        </tr>
            @empty
            <tr>
                <td>#</td>
                <td colspan="6">
                    Add Admin  <a href="{{url('/@admin@/addAdmin')}}"><i class="fa fa-user-plus "></i></a>
                </td>
            </tr>
            @endforelse


    </table>

@endsection