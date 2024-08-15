@extends('layouts.index-user')


<article class="col-sm-9">
    <div class="row-items row">
        <!-- ngRepeat: subject in Subjects|limitTo: 6:begin -->
        <div style="margin-bottom: 50px;" class="item ng-scope" ng-repeat="subject in Subjects|limitTo: 6:begin">
            @foreach($topic as $topics)
                <form action="{{route('saveId')}}" method="post">
                    @csrf
                    <input name="type" value="topic">
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

        <div class="text-center">
            <button style="margin-left: 50px; float: left;width: 130px;" class="slider__control slider__control--prev"
                    ng-disabled="count<=1" ng-click="prev()" disabled="disabled"><i
                        class="ti-arrow-left slder-control-icon" style="margin-right: 10px;"></i> Trước
            </button>
            <!-- <ol class="js__slider__pagers slider__pagers"></ol> -->
            <span ng-model="count" class="ng-pristine ng-untouched ng-valid ng-binding">1</span>
            <button style="margin-right: 20px; width: 130px; float: right;"
                    class="slider__control slider__control--next" ng-disabled="count>=4" ng-click="next()">Sau <i
                        class="ti-arrow-right slder-control-icon" style="margin-left: 10px;"></i></button>
        </div>
    </div>


</article>
