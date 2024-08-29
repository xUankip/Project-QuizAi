@extends('layouts.index-user')
<article class="col-sm-9">
    <div class="row-items row">
        <!-- ngRepeat: subject in Subjects|limitTo: 6:begin -->
        <div style="margin-bottom: 50px;" class="item ng-scope" ng-repeat="subject in Subjects|limitTo: 6:begin">
            @foreach($topic as $topics)
                <form action="{{route('saveId')}}" method="post">
                    @csrf
                    <input type="hidden" name="type" value="topic">
                    <input name="type_id" value="{{$topics->id}}" style="display: none">
                    <img src="{{$topics->thumbnail_url}}" alt="">
                    <div class="content">
                        <p class="tag">{{$topics->description}}</p>
                        <p class="name ng-binding">{{$topics->name}}</p>
                        <hr class="line-bott">
                        <button type="submit">Click</button>
                    </div>
                </form>
            @endforeach
                <form action="{{route('generateQuiz')}}" method="get">
                    @csrf
                    <button type="submit">Thêm Topic</button>
                </form>
            {!! $topic -> links ()!!}
        </div>

    </div>
</article>
