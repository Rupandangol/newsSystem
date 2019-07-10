@extends("Frontend.pages.User.dashboard")

@section('title')
    {{$categoryTitle}}

@endsection

@section('content')
    <br><br>
    @forelse($item as $value)
        <a style="color: black; text-decoration: none" href="{{url('/user/News/'.$value->getNews->id)}}">
            <div class="row">
                <div class="col-md-2">
                    <img style=" margin-left:50px ;width: 200px"
                         src="{{URL::to('/Uploads/News/'.$value->getNews->image)}}"
                         alt="">
                </div>
                <div class="col-md-10">
                    <h2 style="margin-left: 50px">{{$value->getNews->title}}</h2>
                    <i style="margin-left: 50px">{{$value->getNews->reporter}}</i>
                    <p style="margin-left: 50px">{{\Carbon\Carbon::parse($value->getNews->date)->diffForHumans()}}</p>
                    <p style="margin-left: 50px">{{Str::limit($value->getNews->details,250)}}</p>
                </div>
            </div>
        </a><br>

        @empty
        <div style="text-align: center; font-size: 50px">
            <i class="glyphicon glyphicon-tree-deciduous"></i>
        </div>
    @endforelse


@endsection