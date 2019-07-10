@extends('Frontend.master')
@section('content')
    {{--all news--}}
    @foreach($news as $item)
        <div>

            <h1 style="text-align: center;">{{$item->title}}</h1>
            <p>{{\Carbon\Carbon::parse($item->date)->format('Y-M-D')}}</p>
            @if($item->image)
                <img style="align-content: center" src="{{URL::to('Uploads/News/'.$item->image)}}" alt="">
            @endif

            <p>{{$item->details}}</p>
            <a style="text-decoration: none; " href=""> <p style="margin-left: 900px">--{{ucfirst($item->reporter)}}</p></a>
        </div>
    @endforeach

@endsection
