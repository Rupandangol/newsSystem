@extends("Frontend.pages.User.dashboard")

@section('title')

    <b>Breaking News</b>

@endsection

@section('content')
    <br><br>

    @forelse($news as $value)
        <a style="color: black; text-decoration: none" href="{{url('/user/News/'.$value->id)}}">
            <div class="row">
                <div class="col-md-2">
                    <img style=" margin-left:50px ;width: 200px"
                         src="{{URL::to('/Uploads/News/'.$value->image)}}"
                         alt="">
                </div>
                <div class="col-md-10">
                    <h2 style="margin-left: 50px">{{$value->title}}</h2>
                    <i style="margin-left: 50px">{{$value->reporter}}</i>
                    <p style="margin-left: 50px">{{\Carbon\Carbon::parse($value->date)->diffForHumans()}}</p>
                    <p style="margin-left: 50px">{{Str::limit($value->details,250)}}</p>
                </div>
            </div>
        </a><br>
    @empty
        <b>No New News</b>
    @endforelse

@endsection