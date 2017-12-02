@extends('front.layouts.default')
@section ('title', $nameCate)
@section ('myJs')

@endsection

@section('content')
	<section>
		<div class="container">
			<div class="panel">
			  	<div class="panel-body">
	  				<div class="menu-left padding-left-0 col-md-3 col-sm-12 text-center">
		  					<ul>
		  					    <li class="active-li">
		  					    	<a> {{ $nameCate }} </a>
		  					    </li>
		  					    @if (isset($menu)) 
		  		                    @foreach ($menu as $item) 
			  		                	<li class=" {{ request()->is($slug."/".$item->slug) || request()->is($slug."/".$item->slug.'/*') ? "active-li-sp" : " "  }} ">
			  		                		<a class="color-theme-medium" href="{{ url('',  ["$slug" ,"$item->slug"]) }} ">{{ $item->name }}</a>
			  		                	</li>
		  		              		@endforeach
		  		              	@endif
		  					</ul>
	  					</div>
	  				<div class="col-sm-12 col-md-8 col-lg-9 padding-topbot-15px">
	  					<div class="con-index-news" >
                            <i class="fa fa-home style-home"></i>
                            <i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix">{{ $nameCate }}</i>
                            <i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix">Thực đơn</i> 	
                            <i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix">Thực đơn tuần {{ $detail['week'] }} tháng {{ $detail['month'] }} năm {{ $detail['year'] }} </i>
                        </div>
	  					<div class="post-content" role="tabpanel">
	  						<h2 class="text-center title">
	  							Thực đơn tuần {{ $detail['week'] }} tháng {{ $detail['month'] }} năm {{ $detail['year'] }}
	  						</h2>
	  							<img class="img-responsive" src="{{ url('storage/images/menu/menu', $detail['url_image']) }}" style="width: 100%;" alt="">
	  						<br>
	  						<br>
	  						<iframe src="{{ url('public/uploads/files/CommonTestCase.xls') }}" style="width: 100%; height:100% "></iframe>
	  					</div>
	  					
	  				</div>
			  	</div>
			</div>
		</div>
	</section>
@endsection