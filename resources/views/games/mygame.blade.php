@extends('layouts.index-user')
@section('content')
    <div class="main-content">
        <div class="search-box">
            <form action="{{ route('searchTopic') }}" method="get">
                @csrf
                <div class="input-group">
                    <input type="search" name="topicId" placeholder="Search Data...">
                    <button type="submit"><img src="/images/img9.png" alt=""></button>
                </div>
            </form>
        </div>
        <div class="main-content-games">
            @foreach($topic as $topics)
                <form action="{{route('saveId')}}" method="post">
                    @csrf
                    <div class="parent">
                        <input value="topic" name="type" type="hidden">
                        <input name="type_id" value="{{$topics->id}}" type="hidden">
                        <div class="card">
                            <div class="content-box">
                                <p class="card-quiz">Topic:</p>
                                <h1 class="card-topic">{{$topics->name}}</h1>
                                <p class="card-description">
                                    {{$topics->description}}
                                </p>
                                <button style="background-color: transparent; border : none" type="submit" class="play">
                                    Chi Tiết
                                </button>
                            </div>
{{--                            <div class="qr-box">--}}
{{--                                <img src="{{asset('images/img10.jpeg')}}" alt="">--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
        <div class="pagination">
            @include('layouts.default', ['paginator' => $topic])
        </div>
    </div>
@endsection

