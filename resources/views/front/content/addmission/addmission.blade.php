
@extends('front.layouts.default')
@if(isset($nameCate))
	@section ('title', $nameCate)   
@endif
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
		  					    <li class="active-li">
		  					    	<a> {{ $nameCate }} </a>
		  					    </li>
		  					    @if (isset($menu)) 
		  		                    @foreach ($menu as $item) 
			  		                	<li class="{{ request()->is($slug."/".$item->slug) ? "active-li-sp" : " "  }} ">
			  		                		<a class="color-theme-medium" href="{{ url('',  ["$slug" ,"$item->slug"]) }} ">{{ $item->name }}</a>
			  		                	</li>
		  		              		@endforeach
		  		              	@endif
		  					</ul>
	  					</div>
						<div class="content-main col-md-9 col-sm-8 padding-left-right">
							<div class="con-index-news">
							<i class="fa fa-home style-home"></i><i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true"></i> Sống khỏe
						</div>
							<h3 class="text-center text-title-content">
								Đăng kí tuyển sinh trực tuyến
							</h3>

						<div class="panel panel-default content-post row">
						  	<div class="panel-body col-md-6 ">
						  		<h5 class="text-center"> Thông tin học sinh </h5>
						    		<div class="form-group">
						    		    <label for="name">Tên học sinh:</label>
						    		    <input type="text" class="form-control" id="name" placeholder="Tên học sinh">
						    		</div>

						    		<div class="form-group">
						    		    <label for="name">Giới tính:</label>
						    		    <input type="text" class="form-control" id="name" placeholder="Tên học sinh">
						    		</div>

						    		<div class="form-group">
						    		    <label for="name">Ngày sinh:</label>
						    		    <input type="text" class="form-control" id="name" placeholder="Tên học sinh">
						    		</div>

						    		<div class="form-group">
						    		    <label for="name">Lớp học:</label>
						    		    <input type="text" class="form-control" id="name" placeholder="Tên học sinh">
						    		</div>
						  	</div>

						  	<div class="panel-body col-md-6 boder-fix-content">
						  		<h5 class="text-center"> Thông tin phụ huynh </h5>
						    		<div class="form-group">
						    		    <label for="name">Tên phụ huynh:</label>
						    		    <input type="text" class="form-control" id="name" placeholder="Tên học sinh">
						    		</div>

						    		<div class="form-group">
						    		    <label for="name">Email:</label>
						    		    <input type="text" class="form-control" id="name" placeholder="Tên học sinh">
						    		</div>

						    		<div class="form-group">
						    		    <label for="name">Số điện thoại:</label>
						    		    <input type="text" class="form-control" id="name" placeholder="Tên học sinh">
						    		</div>

						    		<div class="form-group">
						    		    <label for="name">Địa chỉ:</label>
						    		    <input type="text" class="form-control" id="name" placeholder="Tên học sinh">
						    		</div>
						  	</div>
						  	<div class="col-md-12">
						  		<div class="form-group">
						  		    <label for="name">Tin nhắn: </label>
						  		    <textarea class="form-control" rows="5"></textarea>
						  		</div>
						  	</div>
						  	<div class="text-center">
						  		<button class="btn btn-warning button-dk">Đăng kí học</button>
						  	</div>
						</div>
					
						</div>
			  	</div>
			</div>
		</div>
	</section>
@endsection
