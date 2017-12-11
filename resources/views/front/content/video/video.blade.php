@extends('front.layouts.default')
@section ('title', $nameCate)
@section ('myJs')
    <script>
        var idVideo = '@if (isset($idVideo)) {{ $idVideo }} @endif'         
    </script>
    <script src="{{ url('Frontend') }}/js/ctrl/videoCtrl.js"></script>
    <script src="{{ url('Frontend') }}/js/factory/service/videoService.js"></script>

@endsection
@section('content')
    <section>
        <div class="container">
            <div class="panel panel-fix">
                <div class="panel-body content-body">
                    <div class="menu-left padding-left-0 col-md-3 col-sm-12 text-center">
                        <ul>
                            <li class="active-li"><a href=""> {{ $nameCate }} </a></li>
                            @if (isset($menu)) 
                                @foreach ($menu as $item) 
                                    <li class="text-left {{ request()->is($slug."/".$item->slug) || request()->is($slug."/".$item->slug.'/*') ? "active-li-sp" : " "  }} ">

                                        <a class="color-theme-medium" href="{{ url('',  ["$slug" ,"$item->slug"]) }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="content-main col-md-9 col-sm-12 pull-right" ng-controller="videoDetailCtrl">
                        <div class="con-index-news">
                            <i class="fa fa-home style-home"></i><i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true">{{ $nameCate }}</i>
                            <i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true">Thư viện video</i> 
                             
                        </div>
                        <h3 class="text-center text-title-content">
                            @{{ data.videoDetail.title }}
                        </h3>
                         <div style="padding: 15px 0px; font-size: 15px; font-weight: 600;">
                                Nội dung video: <span>@{{ data.videoDetail.content }}</span>
                        </div>
                         <div style="padding: 15px 0px; font-size: 15px; font-weight: 600;">
                                Lượt xem: @{{ data.videoDetail.view }}
                        </div>
                        <div class="row" >
                            <div class="col-md-offset-0 col-md-12 col-sm-12 padding-left-right">
                                <div class="embed-responsive embed-responsive-16by9 div-video" >
                                    <iframe ng-src="@{{ data.videoDetail.url_video }}"></iframe>
                                   {{--  <video preload="metadata" id="video-home" class=" embed-responsive-item" controls >
                                        <source src="https://www.youtube.com/watch?v=6wg9IgAlnFg" autostart= "false" type="video/youtube">
                                    </video> --}}

                                </div>
                               
                                
                            </div>
                            <div class="clearfix"></div>
                            <div style="padding-top: 50px;">
                              {{--   <p class="">Video Liên quan</p>
                                <div class="col-md-12" style="padding-left: 26px;  padding-right: 26px;">
                                   <div class="col-md-3">
                                       
                                   </div>
                                   <div class="col-md-3">
                                       
                                   </div>
                                   <div class="col-md-3">
                                       
                                   </div>
                                   <div class="col-md-3">
                                       
                                   </div>
                                </div> --}}
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
