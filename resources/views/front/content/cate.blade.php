@extends('front.layouts.default')
@section ('title', $nameCate)
@section ('myJs')
	<script>
		var idNews = '@if (isset($idNews)) {{ $idNews }} @endif';
		var slug   = '@if (isset($slug)) {{ $slug }} @endif';
	</script>
	<script src="{{ url('Frontend') }}/js/ctrl/cateNewCtrl.js"></script>
	<script src="{{ url('Frontend') }}/js/factory/service/cateNewService.js"></script>
@endsection

@section('content')
	<section>
		<div class="container">
			<div class="panel panel-fix">
			  	<div class="panel-body">
	  				<div class="menu-left padding-left-0 col-md-3 col-sm-12 text-center">
		  					<ul>
		  					    <li class="active-li">
		  					    	<a> {{ $nameCate }} </a>
		  					    </li>
		  					    @if (isset($menu)) 
		  		                    @foreach ($menu as $item) 
			  		                	<li class="{{ request()->is($slug."/*".$item->slug) || request()->is($slug."/".$item->slug.'/*') ? "active-li-sp" : " "  }} ">
			  		                		<a class="color-theme-medium" href="{{ url('',  ["$slug" ,"$item->slug"]) }} ">{{ $item->name }}</a>
			  		                	</li>
		  		              		@endforeach
		  		              	@endif
		  					</ul>
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