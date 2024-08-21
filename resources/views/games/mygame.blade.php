@extends('layouts.index-user')
@section('content')
    <div class="main-content">
        @foreach($topic as $topics)
            <form action="{{route('saveId')}}" method="post">
                @csrf
                <div class="parent">
                    <input value="topic" name="type" type="hidden">
                    <input name="type_id" value="{{$topics->id}}" type="hidden">
                    <div class="card">
                        <div class="content-box">

                            <h1 class="card-topic"> {{$topics->name}}</h1>
                            <p class="card-description">
                                {{$topics->description}}
                            </p>
                                <button style="background-color: transparent; border : none" type="submit" class="play">Show Detail</button>
                        </div>
                        <div class="qr-box">
                            <img src="{{$topics->thumbnail_url}}" alt="">
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
            @include('layouts.default', ['paginator' => $topic])
    </div>
@endsection

