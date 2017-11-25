@extends('front.layouts.default')
@if(isset($nameCate))
	@section ('title', $nameCate)   
@endif

@section ('myJs')
	<script src="{{ url('Frontend') }}/js/ctrl/imageCtrl.js"></script>
	<script src="{{ url('Frontend') }}/js/factory/service/imageService.js"></script>
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
	  				<div class="col-md-9 col-sm-12 padding-left-right">
	  					<div class="con-index-news">
							<i class="fa fa-home style-home"></i><i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix">{{ $nameCate }}</i> 
						</div>
	  					<h3 class="text-center text-title-content">
	  						Thư viện ảnh
	  					</h3>
						<div class="panel" ng-controller="imageCtrl">
						  	<div class="row">
						  	  	<div class="col-sm-6 col-md-4" ng-repeat="(key, album) in data.albumImage">
							  	    <a href="{{ url('') }}/thu-vien/thu-vien-anh/album-@{{ album.id }}/">
							  	    	<div class="thumbnail fix-height-img-album">
							  	      	<img style="min-height: 200px;" ng-src="{{ url('storage/images/album/title_images') }}/@{{ album.images[0].url_image }}" alt="@{{ album.name }} - @{{ album.created_at }}  ">
							  	      	<div class="caption-img text-center">
							  	        	<h3>@{{ album.name }}</h3>
							  	        	<i><span> @{{ album.created_at | formatDate }} <span></i>
							  	      	</div>
							  	    </div>
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
