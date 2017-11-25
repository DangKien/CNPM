@extends('front.layouts.default')
@if(isset($nameCate))
	@section ('title', $nameCate)   
@endif

@section ('myJs')
	<script src="{{ url('Frontend') }}/js/ctrl/fileCtrl.js"></script>
	<script src="{{ url('Frontend') }}/js/factory/service/fileService.js"></script>
@endsection

@section('content')
	<section>
		<div class="container">
			<div class="panel">
			  	<div class="panel-body content-body">
	  				<div class="menu-left padding-left-0 col-md-3 col-sm-12 text-center">
	  					<ul>
	  					    <li class="active-li"><a href="{{ url('lien-he') }}"> {{ $nameCate }} </a></li>
	  					    @if (isset($menu)) 
	  		                    @foreach ($menu as $item) 
		  		                	<li class="{{ request()->is($slug."/".$item->slug) ? "active-li-sp" : " "  }} ">
		  		                		<a class="color-theme-medium" href="{{ url('',  ["$slug" ,"$item->slug"]) }} ">{{ $item->name }}</a>
		  		                	</li>
	  		              		@endforeach
	  		              	@endif
	  					</ul>
	  				</div>
	  				<div class="col-md-9 col-sm-12 padding-left-right" ng-controller="fileCtrl">
	  					<div class="con-index-news">
							<i class="fa fa-home style-home"></i><i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix">{{ $nameCate }}</i> 
						</div>
	  					<h3 class="text-center text-title-content">
	  						Thư viện ảnh
	  					</h3>
						<div class="col-md-4 col-sm-4 ng-scope bg-color"  ng-repeat="(key, file) in data.listFile">
					  		<div class="panel text-center">
					  			<div class="panel-body" >
					  				<img class="image-file-fix img-border mar-btm" ng-src="{{ url('/storage/images/file') }}/@{{ file.url_image }}" alt="@{{ file.title }}" title="@{{ file.title }}" >
					  			</div>
					  			<div class="pad-all text-left">
					  				<p class="ng-binding"><b>Tên tài liệu:</b> @{{ file.title }} </p>
					  				<p class="ng-binding"><b>Loại File:</b> @{{ file.cate_file }} </p>
					  				<p class="ng-binding"><b>Ngày đăng:</b> @{{ file.created_at | formatDate }} </p>
					  				<a href="{{ url('download/file') }}/@{{ file.id }}">
					  					<p class="text-center text-primary">
					  						<b> Download </b>
					  						<i class="fa fa-download" aria-hidden="true"></i>
					  					</p>
					  				</a>
					  			</div>
					  		</div>
					  	</div>
					
	  				</div>
			  	</div>
			</div>
		</div>
	</section>
@endsection
