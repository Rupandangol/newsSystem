@include('Frontend.layout.header')
<div class="container">
    <div id="jumbotronId" class="jumbotron">
        <p>Date:{{\Carbon\Carbon::now()->format('Y-M-D')}} </p>
        <h1 style="font-family:'New Peninim MT'" id="top" class="display-4"><b>TOP</b> NEWSPAPER</h1>
        <a class="btn btn-success" style="margin-left: 850px" href="{{url('/signIn')}}"><b>Sign</b>In</a><a
                class="btn btn-primary" href="{{url('/signUp')}}"><b>Sign</b>up</a>
    </div>
    {{--navbar--}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{url('/')}}">ALL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach($category as $value)
                    <li class="nav-item active">
                        <a class="nav-link"
                           href="{{url('page',['page'=>$value->category,'id'=>$value->id])}}">{{$value->category}}<span
                                    class="sr-only">(current)</span></a>
                    </li>
                @endforeach
            </ul>
            <form method="post" action="{{route('search-news')}}" class="form-inline my-2 my-lg-0">

                {{csrf_field()}}
                <input class="form-control mr-sm-2" type="search" name="searchKey" placeholder="Search"
                       aria-label="Search">
                <button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    {{--end of navbar--}}

    @yield('content')

</div>
@include('Frontend.layout.footer')