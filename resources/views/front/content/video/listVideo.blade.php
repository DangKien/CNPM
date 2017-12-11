@extends('front.layouts.default')
@if(isset($nameCate))
	@section ('title', $nameCate)   
@endif
@section ('myJs')
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
		  		                	<li class="text-left {{ request()->is($slug."/".$item->slug) ? "active-li-sp" : " "  }} ">
		  		                		<a class="color-theme-medium" href="{{ url('',  ["$slug" ,"$item->slug"]) }} ">{{ $item->name }}</a>
		  		                	</li>
	  		              		@endforeach
	  		              	@endif
	  					</ul>
	  				</div>
	  				<div class="content-main col-md-9 col-sm-12">
	  					<div class="con-index-news">
							<i class="fa fa-home style-home"></i><i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix">{{ $nameCate }}</i> <i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix"> Thư viện video </i>
						</div>
	  					<h3 class="text-center text-title-content">
	  						Thư viện video
	  					</h3>
						<div class="panel" ng-controller="videoCtrl">
						  	<div class="row">
						  	  	<div class="col-sm-6 col-md-4" ng-repeat="(key, video) in data.listVideo">
							  	    <a href="{{ url('') }}/thu-vien/thu-vien-video/video-@{{ video.id }}/">
							  	    	<div class="thumbnail fix-height-img-album">
							  	      	<img style="min-height: 200px;" ng-src="{{ url('storage/images/video') }}/@{{ video.url_image }}" alt="@{{ album.name }} - @{{ album.created_at }}  ">
							  	      	<div class="caption-img text-center">
							  	        	<h5>@{{ video.title }}</h5>
							  	        	<i><span> @{{ video.created_at | formatDate }} <span></i>
							  	        	<br>
							  	        	<i class="fa fa-eye">@{{ video.view }}</i>
							  	      	</div>
							  	    </div>
							  	    </a>
						  	    </div>
						  	</div>
						  	<div class="row text-center">
                               <div class="">
                                   <div paging
                                       page="data.pageVideo.current_page"
                                       page-size = "data.pageVideo.per_page"
                                       total="data.pageVideo.total"
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
