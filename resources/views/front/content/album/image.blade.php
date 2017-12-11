@extends('front.layouts.default')
@if(isset($nameCate))
	@section ('title', $nameCate)   
@endif
@section ('myJs')
	<script>
	  	var idAlbum = '@if (isset($idAlbum)) {{ $idAlbum }} @endif'			
	</script>
	<script src="{{ url('Frontend') }}/js/ctrl/imageDetailCtrl.js"></script>
	<script src="{{ url('Frontend') }}/js/factory/service/imageService.js"></script>
@endsection

@section('content')
	<section>
		<div class="container">
			<div class="panel panel-fix">
			  	<div class="panel-body content-body">

	  				<div class="menu-left padding-left-0 col-md-3 col-sm-12 text-center">
	  					<ul>
	  					   <li class="active-li"><a href=""> Liên hệ </a></li>
	  					    @if (isset($menu)) 
	  		                    @foreach ($menu as $item) 
		  		                	<li class="text-left {{ request()->is($slug."/".$item->slug.'/*') ? "active-li-sp" : " "  }} ">
		  		                		<a class="color-theme-medium" href="{{ url('',  ["$slug" ,"$item->slug"]) }} ">{{ $item->name }}</a>
		  		                	</li>
	  		              		@endforeach
	  		              	@endif
	  					</ul>
	  				</div>
	  				<div class="col-md-9 col-sm-12 content-main" ng-controller="imageDetailCtrl">
	  					
	  					<div class="con-index-news">
							<i class="fa fa-home style-home"></i>
							<i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true">
							 @if(isset($nameCate))
								{{ $nameCate }}
							@endif
							</i>
							<i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true">
							 	Thư viện ảnh
							</i>
							<i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true">
							 @if(isset($nameCate))
								@{{ data.albumName.name }}
							@endif
							</i>

						</div>
	  					<h3 class="text-center text-title-content">
	  						@{{ data.albumName.name }}
	  					</h3>
						<div class="panel">
							<div id="blueimp-gallery" class="blueimp-gallery">
								<!-- The container for the modal slides -->
			                    <div class="slides"></div>
			                    <!-- Controls for the borderless lightbox -->
			                    <h3 class="title"></h3>
			                    <a class="prev">‹</a>
			                    <a class="next">›</a>
			                    <a class="close">×</a>
			                    <a class="play-pause"></a>
			                    <ol class="indicator"></ol>
			                    <!-- The modal dialog, which will be used to wrap the lightbox content -->                
							</div>
						  	<div class="row" id="links">
						  	  	<div  class="col-sm-6 col-md-4" ng-repeat="(key, image) in data.albumImage">
							  	    <a href="{{ url('storage/images/album/lib_images') }}/@{{ image.url_image }}" title="...." data-gallery alt="....">
	                    	       <div class="thumbnail fix-thumbnail">
		                    	   	    <img class="img-responsive" 
		                    	         ng-src="{{ url('storage/images/album/title_images') }}/@{{ image.url_image }}"
		                    	         alt="....">
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