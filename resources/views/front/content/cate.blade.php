@extends('front.layouts.default')
@section ('title', $nameCate)
@section ('myJs')
	<script>
		var idNews = '@if (isset($idNews)) {{ $idNews }} @endif';
		var slug   = '@if (isset($slug)) {{ $slug }} @endif';
	</script>
	<script src="{{ url('Frontend') }}/js/ctrl/cateNewCtrl.js"></script>
	<script src="{{ url('Frontend') }}/js/factory/service/cateNewService.js"></script>
	<script src="{{ url('Frontend') }}/js/ctrl/listNewCtrl.js"></script>
    <script src="{{ url('Frontend') }}/js/factory/service/listNewService.js"></script>
@endsection

@section('content')
	<section>
		<div class="container">
			<div class="panel panel-fix">
			  	<div class="panel-body">
	  				<div class="menu-left padding-left-0 col-md-3 col-sm-12 text-center" ng-controller="listCtrl">
		  					<ul ng-if="data.checkList">
		  					    <li class="active-li">
		  					    	<a> {{ $nameCate }} </a>
		  					    </li>
		  					    @if (isset($menu)) 
		  		                    @foreach ($menu as $item) 
			  		                	<li class="text-left {{ request()->is($slug."/*".$item->slug) || request()->is($slug."/".$item->slug.'/*') ? "active-li-sp" : " "  }} ">
			  		                		<a class="color-theme-medium" href="{{ url('',  ["$slug" ,"$item->slug"]) }} ">{{ $item->name }}</a>
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
		  					            <a href="{{ url('') }}/tin-tuc/@{{ news.slug + '/post-' + news.id }}">
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
		  					            <a href="{{ url('') }}/tin-tuc/@{{ news.slug + '/post-' + news.id }}">
		  					                <div class="col-md-9 col-sm-7 col-xs-6 text-left" style="color: #e200bc; ">
		  					                        <p class="title">@{{ news.title }}</p>
		  					                         <span style="font-size: 10px; color: #b733b3;">@{{ news.created_at | formatDate }}</span>
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
		  					        <ol class="text-left padding-ed" style="padding: 10px; padding-left: 25px;">
		  					            <li><a style="color: #b733b3;" href="{{ url('thu-vien/thu-vien-anh') }}">Thư viện ảnh</a></li>
		  					            <li><a style="color: #b733b3;" href="{{ url('thu-vien/thu-vien-video') }}">Thư viện video</a></li>
		  					            <li><a style="color: #b733b3;" href="{{ url('thu-vien/thu-vien-tai-lieu') }}">Thư viện tài liệu</a></li>
		  					        </ol>
		  					    </div>
		  					</div>
							
							<div class="panel" ng-if="(data.checkList == false)">
                            <div class="panel-heading" style="padding-bottom: 0px;">
                                <h3 class="panel-title text-left" style="padding-bottom: 0px;"> <span style="border-bottom: 3px solid #e14f3b"> Liên hệ </span></h3>
                            </div>
                            <div class="panel-body">
                                <ol class="text-left padding-ed" style="padding: 10px; padding-left: 25px;">
                                    <li>
                                        <a style="color: #b733b3;" href="{{ url('thu-vien/thu-vien-anh') }}">
                                            <i class="fa fa-phone" aria-hidden="true"></i> 01659901941</a>
                                    </li>
                                    <li>
                                        <a style="color: #b733b3;" href="{{ url('thu-vien/thu-vien-video') }}">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i> mannoncnpm@gmail.com</a>
                                    </li>
                                    <li class="text-center">
                                        <a style="color: #b733b3; font-size: 40px;" href="https://www.youtube.com/channel/UCKkT3-X31PfhdNq3YhVbi4g?view_as=subscriber">
                                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                        </a>
                                        <a style="color: #b733b3; font-size: 40px;"" href="https://www.facebook.com/KienDang.2112">
                                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>

	  					</div>
	  				<div class="content-main col-sm-12 col-md-8 col-lg-9 padding-topbot-15px" ng-controller="cateNewCtrl">
	  					<div class="con-index-news" >
                            <i class="fa fa-home style-home"></i>
                            <i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix">{{ $nameCate }}</i>
                            <span ng-if="data.listPost.cates.name">
                            	<i   class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix">@{{ data.listPost.cates.name }}</i> 
                            </span>		
                            <i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix">@{{ data.listPost.title }}</i>
                        </div>
	  					<div class="post-content" role="tabpanel">
	  						<h2 class="text-center title"> @{{ data.listPost.title }} </h2>
	  						<p ng-bind-html="data.listPost.content"></p>
	  						<br>
	  						<br>
	  						<div class="text-right">
	  							<p><i><b>Người đăng bài: </b> @{{ data.listPost.users.name }}</i></p>
	  							<p><i><b>Số lượt xem: </b> @{{ data.listPost.view }}</i></p>
	  							<p><i><b>Ngày đăng bài: </b> @{{ data.listPost.created_at | formatDate }}</i></p>
	  						</div>
	  					</div>
	  					
	  				</div>
			  	</div>
			</div>
		</div>
	</section>
@endsection