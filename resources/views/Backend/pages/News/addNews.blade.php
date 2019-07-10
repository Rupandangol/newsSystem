@extends('Backend.master')
@section('title')
    Add News
@endsection
@section('my-header')
    <link rel="stylesheet" href="{{URL::to('lib/select2.1/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/custom.min.css')}}">
@endsection

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
    <div class="box box-primary" style="height: 2000px; background-color: white;width: 1800px">
        <div class="box-header with-border">
            <h3 class="box-title">Quick Add</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{url('/@admin@/addNews/addNewsAction')}}"
              enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
            <div class="box-body">
                <div class="form-group">
                    <label for="title">News Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input style="width: 1420px;" type="date" name="date" class="form-control" placeholder="Enter date">
                </div>

                {{--category--}}
                <div class="form-group">
                    <label for="category">Category</label><br>
                    <select class="col-md-12"  multiple name="category[]" id="category">
                        @foreach($category as $value)
                            <option value="{{$value->id}}">{{$value->category}}</option>
                            @endforeach
                    </select>

                </div>


                {{--end of category--}}
                {{--editor--}}
                <div class="form-group">
                    <label for="detail">Details</label><br>
                    <textarea style="width: 1380px;" name="details" id="" cols="10" rows="10"></textarea>
                </div>
                {{--end of editor--}}
                <div>
                    <label for="metaKeywords">MetaKeywords</label><br>
                    <input class="tags" name="metaKeywords" id="tags_1" type="text" placeholder="MetaKeywords">
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
        </form>
    </div>
@endsection
@section('my-header')
    <link rel="stylesheet" href="{{URL::to('lib/select2/dist/css/select2.min.css')}}">
@endsection

@section('my-footer')
    <script src="{{URL::to('lib/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
    <script src="{{URL::to('lib/select2.1/dist/js/select2.full.min.js')}}"></script>
    {{--custom js--}}
    <script src="{{URL::to('js/custom.min.js')}}"></script>

    <script>
        $(function () {
            $('.select2').select2();
        })
        $(function () {
            $('#category').select2();
        })
    </script>
@endsection