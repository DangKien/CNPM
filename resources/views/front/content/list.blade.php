@extends('front.layouts.default')
@section ('title', $nameCate)
@section ('myJs')
    <script src="{{ url('Frontend') }}/js/ctrl/listNewCtrl.js"></script>
    <script src="{{ url('Frontend') }}/js/factory/service/listNewService.js"></script>
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="panel">
                <div class="panel-body content-body">
                    <div class="menu-left padding-left-0 col-md-3 col-sm-5 text-center">
                        <ul>
                            <li class="active-li"><a href="{{ url('') }}/{{ request()->path() }}"> {{ $nameCate }} </a></li>
                            @if (isset($menu)) 
                                @foreach ($menu as $item) 
                                    <li class="{{ request()->is($slug."/".$item->slug) ? "active-li-sp" : " "  }} ">

                                        <a class="color-theme-medium" href="{{ url('',  ["$slug" ,"$item->slug"]) }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="content-main col-md-9 col-sm-8 padding-left-right" ng-controller="listNewCtrl">
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
