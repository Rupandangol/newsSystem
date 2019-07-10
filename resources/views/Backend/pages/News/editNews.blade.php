@extends('Backend.master')
@section('title')
    Edit News
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
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Quick Add</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{url('/@admin@/manageNews/editNewsAction')}}"
              enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="title">News Title</label>
                    <input type="text" name="title" value="{{$news->title}}" class="form-control" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" value="{{$news->date}}" name="date" class="form-control" placeholder="Enter date">
                </div>

                {{--category--}}

                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control select2 select2-hidden-accessible" multiple
                            data-placeholder="Select Category" name="category[]" style="width: 100%;" tabindex="-1"
                            aria-hidden="true">
                        @foreach($category as$value)
                            <option value="{{$value->id}}">{{$value->category}}</option>
                        @endforeach
                    </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                   style="width: 100%;"><span class="selection"><span
                                    class="select2-selection select2-selection--multiple" role="combobox"
                                    aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul
                                        class="select2-selection__rendered"><li
                                            class="select2-search select2-search--inline"><input
                                                class="select2-search__field" type="search" tabindex="0"
                                                autocomplete="off" autocorrect="off" autocapitalize="none"
                                                spellcheck="false" role="textbox" aria-autocomplete="list"
                                                placeholder="Select a State"
                                                style="width: 400.5px;"></li></ul></span></span><span
                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>

                {{--end of category--}}
                {{--editor--}}
                <div class="form-group">
                    <label for="detail">Details</label><br>
                    <textarea style="width: 1380px;" name="details" placeholder="{{$news->details}}" id="" cols="30" rows="10"></textarea>
                </div>
                {{--end of editor--}}

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
@section('my-header')
    <link rel="stylesheet" href="{{URL::to('lib/select2/dist/css/select2.min.css')}}">
@endsection

@section('my-footer')
    <script src="{{URL::to('lib/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            $('.select2').select2();
        })
    </script>
@endsection