@extends('front.layouts.default')
@section ('title', 'Thư viện tài liệu')
@section ('myJs')
	
@endsection

@section('content')
	<section>
		<div class="container slider-image-t">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
				<ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>

			  <!-- Wrapper for slides -->
			<div class="carousel-inner" style="min-height: 250px" role="listbox">
			    <div class="item active">
			      <img src="{{ url('Frontend') }}/img/slide/slide1.jpg" style="width:100%; min-height: 250px" alt="...">
			    </div>
			    <div class="item">
			      <img src="{{ url('Frontend') }}/img/slide/slide2.jpg" style="width:100%; min-height: 250px" alt="...">
			    </div>
			    <div class="item">
			      <img src="{{ url('Frontend') }}/img/slide/slide3.jpg" style="width:100%; min-height: 250px;" alt="...">
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

			<div class="row" style="margin-top:15px;">
				<div class="col-md-6 col-sm-6">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Tin tức mới</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 new">
									<img style="width: 100%" class="img-responsive" src="{{ url('Frontend') }}/img/3.jpg" alt="">
								</div>
								<div class="col-md-12 content-news">
										<h4 class="title">Các con vui chơi</h4>
										<span>20-11-2017</span>
										<p>Đi khắp thế gian không ai tốt bằng mẹ. Gánh nặng cuộc đời không ai khổ bằng cha. Một năm có 365 ngày, 365 lời cảm ơn…  </p>
								</div>
							</div>

							<div class="row lq">
								<div class="col-md-3 col-sm-5 col-xs-6">
									<img style="width: 100%; height: 110px;" class="img-responsive" src="{{ url('Frontend') }}/img//3.jpg" alt="">
								</div>
								<div class="col-md-9 col-sm-7 col-xs-6 content-lq">
										<p class="title">Các con vui chơi</p>
										<span>20-11-2017</span>
										<p>Đi khắp thế gian không ai tốt bằng mẹ. Gánh nặng cuộc đời không ai khổ bằng cha. Một năm có 365 ngày, 365 lời cảm ơn…  </p>
								</div>
							</div>
							<div class="row lq">
								<div class="col-md-3 col-sm-5 col-xs-6">
									<img style="width: 100%; height: 110px;" class="img-responsive" src="{{ url('Frontend') }}/img/3.jpg" alt="">
								</div>
								<div class="col-md-9 col-sm-7 col-xs-6 content-lq">
										<p class="title">Các con vui chơi</p>
										<span>20-11-2017</span>
										<p>Đi khắp thế gian không ai tốt bằng mẹ. Gánh nặng cuộc đời không ai khổ bằng cha. Một năm có 365 ngày, 365 lời cảm ơn…  </p>
								</div>
							</div>
							<div class="row lq">
								<div class="col-md-3 col-sm-5 col-xs-6">
									<img style="width: 100%; height: 110px;" class="img-responsive" src="{{ url('Frontend') }}/img/3.jpg" alt="">
								</div>
								<div class="col-md-9 col-sm-7 col-xs-6 content-lq">
										<p class="title">Các con vui chơi</p>
										<span>20-11-2017</span>
										<p>Đi khắp thế gian không ai tốt bằng mẹ. Gánh nặng cuộc đời không ai khổ bằng cha. Một năm có 365 ngày, 365 lời cảm ơn…  </p>
								</div>
							</div>					

						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Tin tức mới</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<img style="width: 100%; height: 300px" class="img-responsive" src="{{ url('Frontend') }}/img/3.jpg" alt="">
								</div>
								<div class="col-md-12 content-news">
										<h4 class="title">Các con vui chơi</h4>
										<span>20-11-2017</span>
										<p>Đi khắp thế gian không ai tốt bằng mẹ. Gánh nặng cuộc đời không ai khổ bằng cha. Một năm có 365 ngày, 365 lời cảm ơn…  </p>
								</div>
							</div>

							<div class="row lq">
								<div class="col-md-3 col-sm-5 col-xs-6">
									<img style="width: 100%; height: 110px;" class="img-responsive" src="{{ url('Frontend') }}/img/3.jpg" alt="">
								</div>
								<div class="col-md-9 col-sm-7 col-xs-6 content-lq">
										<p class="title">Các con vui chơi</p>
										<span>20-11-2017</span>
										<p>Đi khắp thế gian không ai tốt bằng mẹ. Gánh nặng cuộc đời không ai khổ bằng cha. Một năm có 365 ngày, 365 lời cảm ơn…  </p>
								</div>
							</div>
							<div class="row lq">
								<div class="col-md-3 col-sm-5 col-xs-6">
									<img style="width: 100%; height: 110px;" class="img-responsive" src="{{ url('Frontend') }}/img/3.jpg" alt="">
								</div>
								<div class="col-md-9 col-sm-7 col-xs-6 content-lq">
										<p class="title">Các con vui chơi</p>
										<span>20-11-2017</span>
										<p>Đi khắp thế gian không ai tốt bằng mẹ. Gánh nặng cuộc đời không ai khổ bằng cha. Một năm có 365 ngày, 365 lời cảm ơn…  </p>
								</div>
							</div>
							<div class="row lq">
								<div class="col-md-3 col-sm-5 col-xs-6">
									<img style="width: 100%; height: 110px;" class="img-responsive" src="{{ url('Frontend') }}/img/3.jpg" alt="">
								</div>
								<div class="col-md-9 col-sm-7 col-xs-6 content-lq">
										<p class="title">Các con vui chơi</p>
										<span>20-11-2017</span>
										<p>Đi khắp thế gian không ai tốt bằng mẹ. Gánh nặng cuộc đời không ai khổ bằng cha. Một năm có 365 ngày, 365 lời cảm ơn…  </p>
								</div>
							</div>					

						</div>
					</div>
				</div>
			</div>
			
			<!-- video -->
			<div class="row">
				<div class="col-md-8">

					<div class="embed-responsive embed-responsive-16by9">
						<!-- <iframe src="image/logo1.png?rel=0"></iframe> -->
						<video id="video-home" class=" embed-responsive-item" poster="image/logo1.png" controls autoplay="autoplay" frameborder="0" allowfullscreen>
						  	<source src="video/vido1.mp4" type="video/mp4">
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
					   <li class="fix-slider-product">
					       <img class="img-responsive" src="{{ url('Frontend') }}/img/4.jpg" alt="">
					   </li>
					   <li class="fix-slider-product">
					       <img class="img-responsive" src="{{ url('Frontend') }}/img/2.jpg" alt="">
					   </li>
					   <li class="fix-slider-product">
					       <img class="img-responsive" src="{{ url('Frontend') }}/img/1.jpg" alt="">
					   </li>
					   <li class="fix-slider-product">
					       <img class="img-responsive" src="{{ url('Frontend') }}/img/3.jpg" alt="">
					   </li>
					   <li class="fix-slider-product">
					       <img class="img-responsive" src="{{ url('Frontend') }}/img/5.jpg" alt="">
					   </li>
					</ul>
				</div>
			</div>
			<!-- end album image -->
		</div>

	</section>
@endsection