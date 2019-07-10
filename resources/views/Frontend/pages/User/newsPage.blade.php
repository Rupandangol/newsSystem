@extends("Frontend.pages.User.dashboard")

@section('title')

    Categories:

@endsection
@section('subTitle')
    @foreach($relatedCategory as $value)
        <a href="{{url('/user/category/'.$value->getCategory->category.'/'.$value->getCategory->id)}}">
            <div class="label label-success"> {{$value->getCategory->category}}</div>
        </a>

    @endforeach

@endsection

@section('content')
    <br><br>
    <div class="container">
        <div id="newPage-header"><h1>{{ucfirst($detailNews->title)}}</h1></div>
        <img id="newPage-image" src="{{URL::to('Uploads/News/'.$detailNews->image)}}" alt=""><br>
        <div id="newPage-date"><i>{{\Carbon\Carbon::parse($detailNews->date)->format('Y.m.d')}}</i></div>
        <br>
        <p>{{$detailNews->details}}</p>
        <i>{{$detailNews->reporter}}</i>

        <br><br><br>

        <button value="{{$detailNews->id}}" class="btn btn-secondary" id="upVote" type="button"><i class="fa fa-thumbs-up"></i></button>

        <button value="0" class="btn btn-secondary" id="downVote" type="button"><i class="fa fa-thumbs-down"></i></button>
        <form action="">

            <br><br>

            <input style="width: 1055px;height: 50px;" name="feedback" id="newPage-comment" placeholder="Feedback"
                   type="text">
            <button style="height: 50px;margin-bottom: 3px" class="btn btn-success">Submit</button>


        </form>
    </div>


@endsection
@section('my-footer')
    <script src="{{URL::to('/js/rating.js')}}"></script>

@endsection