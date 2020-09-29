@extends('layouts.master_guest')
@section('content')
<div class="container">
    <div class="row carousel-holder">
        <div class="col-md-12">

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php $i=0;?> @foreach($param['slide'] as $sl)
                    <li data-target="#myCarousel" data-slide-to="{{$i}}" @if($i==0) class="active" @endif>
                    </li>
                    <?php $i++;?> @endforeach" class="active"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php $i=0;?> @foreach($param['slide'] as $sl)
                    <div @if($i==0) class="item active" @else class="item" @endif>
                        <?php $i++;?>
                        <img class="baner-img" src="/image_slide/{{$sl->image}}" style="width:100%;">
                    </div>
                    @endforeach

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
</div>
        
        <div class="container demo">  
          <div class="row">
            @foreach($param['tintuc'] as $tt)
            <div class="col-md-12">
                <div id="news-slider" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                    <div class="owl-wrapper-outer">
                        <div class="owl-wrapper" style="display: block;">
                            <div class="owl-item">
                                <div class="post-slide">
                                    <div class="post-img"> <img src="/image_news/{{$tt->imgnew}}" style="height" alt="">
                                        <div class="over-layer">
                                            <ul class="post-link">
                                                <li>
                                                    <a href="" class="fa fa-search"></a>
                                                </li>
                                                <li>
                                                    <a href="" class="fa fa-link"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post-review">
                                        <h3 class="post-title"><a href="">{{$tt->name}}</a>
                                                </h3>
                                        <p class="post-description"> {{$tt->tomtat}} </p>
                                        <a href="" class="read-more">
                                            <button type="button" class="btn btn-default">Chi tiết</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                          <hr>
                            
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
          </div>
</div>
</div>
@endsection
