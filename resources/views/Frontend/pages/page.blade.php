@extends('Frontend.master')
@section('content')


    <h1 style="font-family: 'New Peninim MT'">Catogory:  {{$categoryItem}}</h1>
    {{--category news--}}
    @forelse($news as $item)

        <h1 style="text-align: center;">{{$item->getNews->title}}</h1>
        <p>{{\Carbon\Carbon::parse($item->getNews->date)->format('M-d')}}</p>
        @if($item->getNews->image)
            <img style="align-content: center" src="{{URL::to('Uploads/News/'.$item->getNews->image)}}" alt="">
        @endif
        <p>{{$item->getNews->details}}</p>

    @empty
        <h1 style="text-align: center">No News</h1>
    @endforelse


@endsection
