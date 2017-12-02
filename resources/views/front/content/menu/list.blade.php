@extends('front.layouts.default')
@section ('title', $nameCate)
@section ('myJs')
	<script src="{{ url('Frontend') }}/js/ctrl/menuCtrl.js"></script>
	<script src="{{ url('Frontend') }}/js/factory/service/menuService.js"></script>
@endsection

@section('content')
	<section>
		<div class="container">
			<div class="panel">
			  	<div class="panel-body">
	  				<div class="menu-left padding-left-0 col-md-3 col-sm-12 text-center">
		  					<ul>
		  					    <li class="active-li">
		  					    	<a> {{ $nameCate }} </a>
		  					    </li>
		  					    @if (isset($menu)) 
		  		                    @foreach ($menu as $item) 
			  		                	<li class="{{ request()->is($slug."/".$item->slug) ? "active-li-sp" : " "  }} ">
			  		                		<a class="color-theme-medium" href="{{ url('',  ["$slug" ,"$item->slug"]) }} ">{{ $item->name }}</a>
			  		                	</li>
		  		              		@endforeach
		  		              	@endif
		  					</ul>
	  					</div>
	  				<div class="content-main col-md-9 col-sm-12 padding-left-right" ng-controller="menuCtrl">
                        <div class="con-index-news">
                            <i class="fa fa-home style-home"></i><i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true">{{ $nameCate }}</i>
                            <i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true">Thực đơn</i> 
                             
                        </div>
                        <h3 class="text-center text-title-content">
                           	Danh sách thực đơn
                        </h3>
                        <div class="row" >
                            <div class="content-list col-md-12 col-sm-12 padding-left-right" ng-repeat="(key, menu) in data.listMenu">
                                <div class="">
                                    <a href="{{ url('', $slug) }}/thuc-don/thuc-don-cho-be-@{{ menu.id }}">
                                        <div class="col-md-5 col-sm-6 padding-left-right">
                                            <img class="image-list" ng-src="{{ url('storage/images/menu/title_menu') }}/@{{ menu.url_image }}" alt="">
                                        </div>
                                        <div class="col-md-7 col-sm-6 padding-left-right">
                                            <h4 class="title-tt">
                                                Thực đơn cho bé Tuần @{{ menu.week }} - Tháng @{{ menu.month }} - Năm @{{ menu.year }}
                                            </h4>
                                            <p class="date-post">@{{ menu.created_at | formatDate }} &nbsp&nbsp&nbsp<i class="fa fa-eye" aria-hidden="true"> @{{ menu.view }}</i></p>
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