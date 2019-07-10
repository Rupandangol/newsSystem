@extends('Backend.master')
@section('title')
    Manage News
@endsection
@section('content')

    @if(session('success'))
        <div class="alert alert-danger">
            {{session('success')}}
        </div>
    @endif


    <table class="table table-striped">
        <tr>
            <th>*</th>
            <th>Title</th>
            <th>Image</th>
            <th>Date</th>
            <th>Details</th>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @forelse($news as $key=>$value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$value->title}}</td>
                <td>image</td>
                <td>{{$value->date}}</td>
                <td>
                    <p title="{{$value->details}}">{{Str::limit($value->details,50)}}</p>
                </td>
                <td>
                    @foreach($value->getCategories as $item)
                        <span class="label label-default"> {{$item->category}}</span>
                @endforeach

                <td><a class="btn btn-success" href="{{url('/@admin@/manageNews/editNews/'.$value->id)}}"><i
                                class="fa fa-pencil"></i></a></td>
                <td><a class="btn btn-danger" href="{{url('/@admin@/manageNews/deleteNews/'.$value->id)}}"><i
                                class="fa fa-trash"></i></a></td>


            </tr>
        @empty
            <tr>
                <td style="text-align: center; font-family: 'Comic Sans MS';" colspan="7"><a
                            href="{{url('/@admin@/addNews')}}">Add News</a></td>
            </tr>
        @endforelse
    </table>
@endsection
