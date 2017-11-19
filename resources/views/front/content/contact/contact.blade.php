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
	  				<div class="menu-left padding-left-0 col-md-3 col-sm-5 text-center">
	  					<ul>
	  					    <li class="active-li"><a href="{{ url('lien-he') }}"> Liên hệ </a></li>
	  					    @if (isset($menu)) 
	  		                    @foreach ($menu as $item) 
		  		                	<li>
		  		                		<a class="color-theme-medium" href="{{ url('',  ["$slug" ,"$item->slug"]) }} ">{{ $item->name }}</a>
		  		                	</li>
	  		              		@endforeach
	  		              	@endif
	  					</ul>
	  				</div>
	  				<div class="content-main col-md-9 col-sm-7">
	  					<div class="con-index-news">
							<i class="fa fa-home style-home"></i><i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true"></i> Sống khỏe
						</div>
	  					<h3 class="text-center text-title-content">
	  						Đăng kí tuyển sinh trực tuyến
	  					</h3>
						<div class="title">
							<p>
							Cảm ơn bạn đã ghé thăm website của trường mầm non chúng tôi.<br>
							Mời bạn điền vào thông tin liên lạc và gửi cho chúng tôi. Các chuyên viên tư vấn sẽ trả lời bạn trong thời gian sớm nhất. 
							<p class="text-right">Trân thành cảm ơn!</p>
							</p>
						</div>

						<div class="panel panel-default content-post">
						  	<div class="panel-body">
						    	<form class="form-horizontal form-lh">
						    		<div class="form-group">
						    		    <label for="name" class="col-md-2 col-sm-4 control-label">Họ tên bạn: </label>
						    		    <div class="col-sm-9">
						    		      <input type="text" class="form-control" id="name" placeholder="Hãy điền đầy đủ họ tên của bạn">
						    		    </div>
						    		</div>

						    		<div class="form-group">
						    		    <label for="name" class="col-md-2 col-sm-4 control-label">Tiêu đề: </label>
						    		    <div class="col-sm-9">
						    		      <input type="text" class="form-control" id="name" placeholder="Tiêu đề">
						    		    </div>
						    		</div>

						    		<div class="form-group">
						    		    <label for="name" class="col-md-2 col-sm-4 control-label">Email: </label>
						    		    <div class="col-sm-9">
						    		      <input type="email" class="form-control" id="name" placeholder="Email của bạn">
						    		    </div>
						    		</div>
						    		
						    		<div class="form-group">
						    		    <label for="name" class="col-md-2 col-sm-4 control-label">Nội dung: </label>
						    		    <div class="col-sm-9">
						    		      <textarea class="form-control" rows="10"></textarea>
						    		    </div>
						    		</div>

						    		<button type="button" class="btn btn-warning pull-right button-fix">Phản hồi</button>
						    	</form>
						  	</div>
						</div>
	  				</div>
			  	</div>
			</div>
		</div>
	</section>
@endsection




