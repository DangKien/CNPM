@extends('front.layouts.default')
@section ('title', "Mầm non Color")
@section ('myJs')
	<script src="{{ url('Frontend') }}/js/ctrl/homeCtrl.js"></script>
	<script src="{{ url('Frontend') }}/js/factory/service/homeService.js"></script>
@endsection

@section('content')
	<section ng-controller="homeCtrl">
		<div class="container slider-image-t">
			{{-- slide image --}}
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
			  <!-- Indicators -->
				<ol class="carousel-indicators">
				    <li ng-repeat="(key, slide) in data.listSlider" data-target="#carousel-example-generic" data-slide-to="@{{ key + 1 }}" ng-class="key == 0? 'active' : ' ' "></li>
				</ol>

			  <!-- Wrapper for slides -->
				<div class="carousel-inner" style="min-height: 250px" role="listbox">
				    <div ng-repeat="(key, slide) in data.listSlider" class="item" ng-class="key == 0 ? 'active' : ' ' ">
				      <img ng-src="{{ url('storage/images/slides/images_slides') }}/@{{ slide.image }}" style="width:100%; min-height: 250px" alt="@{{ slide.title }}">
				    </div>
				</div>

			  <!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				</a>
			</div>
			{{-- het slide image --}}
			
			{{-- div tin tuc --}}
			<div class="row" style="margin-top:15px;">
				<div class="col-md-6 col-sm-6">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Tin tức mới</h3>
						</div>
						<div class="panel-body">
							<div class="row fix-panel" ng-repeat="(key, news) in data.listNews" ng-if="(key == 0)">
								<a href="{{ url('') }}/tin-tuc/@{{ news.slug + '/post-' + news.id }}">
									<div class="col-md-12 new">
										<img style="width: 100%" class="img-responsive" ng-src="{{ url('storage') }}/@{{ news.image }}">
									</div>
									<div class="col-md-12 content-news">
											<h4 class="title">@{{ news.title }}</h4>
											<span>@{{ news.created_at | formatDate }}</span>
											<p ng-bind-html="news.content | limitTo: 200"></p>
									</div>
								</a>
							</div>

							<div class="row lq" ng-repeat="(key, news) in data.listNews" ng-if="(key != 0)">
								<a href="{{ url('') }}/tin-tuc/@{{ news.slug + '/post-' + news.id }}">
									<div class="col-md-3 col-sm-5 col-xs-6">
										<img style="width: 100%; height: 110px;" class="img-responsive" ng-src="{{ url('storage')}}/@{{ news.image }}" alt="@{{ new.title }}">
									</div>
									<div class="col-md-9 col-sm-7 col-xs-6 content-lq">
											<p class="title">@{{ news.title }}</p>
											<span>@{{ news.created_at | formatDate }}</span>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-sm-6">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Thông báo</h3>
						</div>
						<div class="panel-body">
							<div class="row fix-panel" ng-repeat="(key, news) in data.listNotifi" ng-if="(key == 0)">
								<a href="{{ url('') }}/thong-bao/@{{ news.slug + '/post-' + news.id }}">
									<div class="col-md-12 new">
										<img style="width: 100%" class="img-responsive" ng-src="{{ url('storage') }}/@{{ news.image }}">
									</div>
									<div class="col-md-12 content-news">
											<h4 class="title">@{{ news.title }}</h4>
											<span>@{{ news.created_at | formatDate }}</span>
											<p ng-bind-html="news.content | limitTo: 200"></p>
									</div>
								</a>
							</div>

							<div class="row lq" ng-repeat="(key, news) in data.listNotifi" ng-if="(key != 0)">
								<a href="{{ url('') }}/thong-bao/@{{ news.slug + '/post-' + news.id }}">
									<div class="col-md-3 col-sm-5 col-xs-6">
										<img style="width: 100%; height: 110px;" class="img-responsive" ng-src="{{ url('storage') }}/@{{ news.image }}" alt="">
									</div>
									<div class="col-md-9 col-sm-7 col-xs-6 content-lq">
											<p class="title">@{{ news.title }}</p>
											<span>@{{ news.created_at | formatDate }}</span>
									
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- het tin tuc --}}

			<!-- video -->
			<div class="row">
				<div class="col-md-8">

					<div class="embed-responsive embed-responsive-16by9">
						<!-- <iframe src="image/logo1.png?rel=0"></iframe> -->
						<video id="video-home" class=" embed-responsive-item" poster="{{ url('Frontend') }}/img/logo1.png" controls autoplay="autoplay" frameborder="0" allowfullscreen>
						  	{{-- <source src="video/vido1.mp4" type="video/mp4"> --}}
						</video>
						<button class="button-video-play">
							
						</button>

					</div>
				</div>
				<div class="col-md-4">
					<div>
						
					</div>
					<div>
						
					</div>
					<div>
						
					</div>
				</div>
			</div>
			<!-- end video -->

			<!-- album Image -->
			<div class="row album-image">
				<div class="container">
					<ul id="lightSlider">
					   <li class="fix-slider-product" lib-image ng-repeat="(key, image) in data.listLibImage">
					       <img class="img-responsive" ng-src="{{ url('storage/images/album/title_images') }}/@{{ image.url_image }}" alt="">
					   </li>
					</ul>
				</div>
			</div>
			<!-- end album image -->
		</div>

	</section>
@endsection