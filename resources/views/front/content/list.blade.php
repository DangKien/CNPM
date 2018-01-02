@extends('front.layouts.default')
@section ('title', $nameCate)
@section ('myJs')
    <script src="{{ url('Frontend') }}/js/ctrl/listNewCtrl.js"></script>
    <script src="{{ url('Frontend') }}/js/factory/service/listNewService.js"></script>
    <script>
        var slug   = '@if (isset($slug)) {{ $slug }} @endif';
    </script>
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="panel panel-fix">
                <div class="panel-body content-body ">
                    <div class="menu-left padding-left-0 col-md-3 col-sm-12 text-center" ng-controller="listCtrl">
                        <ul ng-if="data.checkList">
                            <li class="active-li"><a href=""> {{ $nameCate }} </a></li>
                            @if (isset($menu)) 
                                @foreach ($menu as $item) 
                                    <li class="text-left {{ request()->is($slug."/".$item->slug) ? "active-li-sp" : " "  }} ">

                                        <a class="color-theme-medium" href="{{ url('',  ["$slug" ,"$item->slug"]) }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="panel" ng-if="(data.checkList == false)">
                            <div class="panel-heading">
                                <h3 class="panel-title text-left""> <span style="border-bottom: 3px solid #e14f3b">{{ $nameCate }} nổi bật </span></h3>
                            </div>
                            <div class="panel-body">
                               <div style="padding: 5px;" class="row" ng-repeat="(key, news) in data.listPostHot"
                                    ng-if="(key == 0)"
                                >
                                    <a href="{{ url('', $slug) }}/@{{ news.slug + '/post-' + news.id }}">
                                        <div class="col-md-12">
                                            <img style="width: 100%; height: 200px" class="img-responsive" ng-src="{{ url('storage') }}/@{{ news.image }}">
                                        </div>
                                        <div class="col-md-12 text-left">
                                                <h4 class="title" style="color:#e200bc;">@{{ news.title }}</h4>
                                                <span style="font-size: 12px;">@{{ news.created_at | formatDate }}</span>
                                        </div>
                                    </a>
                               </div>
                               <div style="padding: 5px; padding-left: 15px;" class="row" ng-repeat="(key, news) in data.listPostHot" ng-if="(key != 0)">
                                    <a href="{{ url('', $slug) }}/@{{ news.slug + '/post-' + news.id }}">
                                        <div class="col-md-9 col-sm-7 col-xs-6 text-left" style="color: #e200bc;">
                                                <p class="title">@{{ news.title }}</p>
                                                 <span style="font-size: 10px;">@{{ news.created_at | formatDate }}</span>
                                        </div>
                                    </a>
                               </div>
                            </div>
                        </div>

                        <div class="panel" ng-if="(data.checkList == false)">
                            <div class="panel-heading" style="padding-bottom: 0px;">
                                <h3 class="panel-title text-left" style="padding-bottom: 0px;"> <span style="border-bottom: 3px solid #e14f3b"> Thư viện </span></h3>
                            </div>
                            <div class="panel-body">
                                <ol class="text-left padding-ed" style="padding: 10px; padding-left: 25px; font-size: 16px;">
                                    <li><a style="color: #b733b3;" href="{{ url('thu-vien/thu-vien-anh') }}">Thư viện ảnh</a></li>
                                    <li><a style="color: #b733b3;" href="{{ url('thu-vien/thu-vien-video') }}">Thư viện video</a></li>
                                    <li><a style="color: #b733b3;" href="{{ url('thu-vien/thu-vien-tai-lieu') }}">Thư viện tài liệu</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="content-main col-md-9 col-sm-12" ng-controller="listNewCtrl">
                        <div class="con-index-news">
                            <i class="fa fa-home style-home"></i><i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true">{{ $nameCate }}</i>
                            <i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true">@{{  data.listPost[0].cates.name }}</i> 
                             
                        </div>
                        <h3 class="text-center text-title-content">
                            @{{  data.listPost[0].cates.name }}
                        </h3>
                        <div class="row" >
                            <div class="content-list col-md-12 col-sm-12 padding-left-right" ng-repeat="(key, listPost) in data.listPost">
                                <div class="">
                                    <a href="{{ url('', $slug) }}/@{{ listPost.slug + '/post-' + listPost.id }}">
                                        <div class="col-md-5 col-sm-6 padding-left-right">
                                            <img class="image-list" ng-src="{{ url('storage') }}/@{{ listPost.image }}" alt="">
                                        </div>
                                        <div class="col-md-7 col-sm-6 padding-left-right">
                                            <h4 class="title-tt">
                                                @{{ listPost.title }}
                                            </h4>
                                            <p class="date-post">@{{ listPost.created_at | formatDate }} &nbsp&nbsp&nbsp<i class="fa fa-eye" aria-hidden="true"> @{{ listPost.view }}</i></p>
                                            <p ng-bind-html="listPost.content | ellipsis:200"></p>
                                        </div>
                                    </a>
                                </div>
                            </div>  
                            <div class="row text-center">
                               <div class="">
                                   <div paging
                                       page="data.pageList.current_page"
                                       page-size = "data.pageList.per_page"
                                       total="data.pageList.total"
                                       paging-action="actions.changePage(page)">
                                   </div>
                               </div>
                            </div>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
