@extends('Frontend.master')
@section('content')

    <div>
        <p><b>Search text</b> : <i>{{$searchItem}}</i></p>
    </div>

    <br><br>

        @forelse($item as $value)
            <div>

                <h1 style="text-align: center;">{{$value->title}}</h1>
                <p>{{\Carbon\Carbon::parse($value->date)->format('Y-M-D')}}</p>
                @if($value->image)
                    <img style="align-content: center" src="{{URL::to('Uploads/News/'.$value->image)}}" alt="">
                @endif

                <p>{{$value->details}}</p>

            </div>
        @empty
            <h1>No News</h1>

        @endforelse

@endsection
