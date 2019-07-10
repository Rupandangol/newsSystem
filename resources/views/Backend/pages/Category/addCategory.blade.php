@extends('Backend.master')

@section('title')
    Add Category
@endsection

@section('content')

    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @elseif(session('fail'))
        <div class="alert alert-danger">{{session('fail')}}</div>
    @endif

    <div style="margin-top: 90px;" class="container">
        <form autocomplete="off" action="{{url('/@admin@/addCategory/actionCategory')}}" method="post">
            {{csrf_field()}}
            <div class="input-group input-group-sm">

                <input type="text" placeholder="Enter Category" name="category" class="form-control">
                <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat">Go!</button>
                    </span>
                <input type="text" name="status" hidden value="0">
            </div>
        </form>
        <div>
            @foreach($errors->all() as $error)
                <code>{{$error}}</code>
            @endforeach
        </div>
    </div><br><br>

    {{--manage Category--}}
    <table style="margin-top: 50px" class="table table-striped">
        <tr>
            <th>*</th>
            <th>Category</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @foreach($category as $key=>$value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$value->category}}</td>
                <td>{{$value->status}}</td>
                <td>{{$value->created_at->diffForHumans()}}</td>
                <td><a class="btn btn-primary" href="{{url('/@admin@/manageCategory/updateCategory/'.$value->id)}}"><i
                                class="fa fa-pencil"></i></a></td>
                <td><a class="btn btn-danger" href="{{url('/@admin@/manageCategory/deleteCategory/'.$value->id)}}"><i
                                class="fa fa-trash"></i></a></td>
            </tr>
        @endforeach

    </table>

   <div> {{$category->links()}}</div>
    {{--end of manage Category--}}


@endsection