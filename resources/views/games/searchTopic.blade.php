@extends('layouts.index-user')
@section('content')
    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @if(isset($topic))
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
                <form action="{{route('saveId')}}" method="post">
                    @csrf
                    <div class="parent">
                        <input value="topic" name="type" type="hidden">
                        <input name="type_id" value="{{$topic->id}}" type="hidden">
                        <div class="card">
                            <div class="content-box">
                                <h1 class="card-topic">{{$topic->name}}</h1>
                                <p class="card-description">
                                    {{$topic->description}}
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
            </div>
        </div>
    @else
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'No topics available.',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.history.back();
                }
            });
        </script>
    @endif
@endsection

