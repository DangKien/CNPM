@extends('front.layouts.default')
@section ('title', $nameCate)
@section ('myJs')
	<script src="{{ url('Frontend') }}/js/ctrl/homeCtrl.js"></script>
	<script src="{{ url('Frontend') }}/js/factory/service/homeService.js"></script>
@endsection

@section('content')
	<section>
		<div class="container">
			<div class="panel">
			  	<div class="panel-body content-body">
	  				<div class="menu-left padding-left-0 col-md-3 col-sm-4 text-center">
	  					<ul>
	  					    <li class="active-li"><a href="">Liên hệ</a></li>
	  					    <li><a href="">Liên hệ</a></li>
	  					    <li><a href="">Liên hệ</a></li>
	  					</ul>
	  				</div>
	  				<div class="col-md-9 col-sm-8 padding-left-right">
	  					<div class="con-index-news">
							<i class="fa fa-home style-home"></i><i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true"></i> Sống khỏe
						</div>
	  					<h3 class="text-center text-title-content">
	  						Đăng kí tuyển sinh trực tuyến
	  					</h3>
						<div class="panel">
						  	<div class="row">
						  	  	<div class="col-sm-6 col-md-4">
							  	    <div class="thumbnail fix-height-img-album">
							  	      	<img src="image/3.jpg" alt="...">
							  	    </div>
						  	    </div>

						  	    <div class="col-sm-6 col-md-4">
							  	    <div class="thumbnail fix-height-img-album">
							  	      	<img src="image/3.jpg" alt="...">
							  	    </div>
						  	    </div>

						  	    <div class="col-sm-6 col-md-4">
							  	    <div class="thumbnail fix-height-img-album">
							  	      	<img src="image/3.jpg" alt="...">
							  	 
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
