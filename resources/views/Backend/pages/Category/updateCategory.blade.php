@extends('Backend.master')

@section('title')
    Update Category
@endsection

@section('content')


    <div style="margin-top: 90px;" class="container">
        <form action="{{url('/@admin@/manageCategory/updateCategory/updateCategoryAction')}}" method="post">
            {{csrf_field()}}
            <div class="input-group input-group-sm">

                <input style="height: 60px" type="text" name="category" value="{{$category->category}}" class="form-control">
                <span class="input-group-btn">
                      <button style="height: 60px" type="submit" class="btn btn-info btn-flat">Go!</button>
                    </span>
                <input type="text" name="status" hidden value="0">
                <input type="text" name="id" hidden value="{{$category->id}}">
            </div>
        </form>
        <div>
            @if($errors->has('category'))
                <code>{{$errors->first('category')}}</code>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>

            @elseif(session('fail'))
                <div class="alert alert-danger">
                    {{session('fail')}}
                </div>
            @endif

        </div>
    </div>

@endsection