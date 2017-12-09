@extends('front.layouts.default')
@section ('title', 'Môt ngày của bé')
@section ('myJs')
@endsection

@section('content')
	<section>
		<div class="container">
			<div class="panel panel-fix">
			  	<div class="panel-body">
	  				<div class="menu-left padding-left-0 col-md-3 col-sm-12 text-center">
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
	  				<div class="col-sm-12 col-md-8 col-lg-9 padding-topbot-15px">
	  					<img style="width: 100%;" src="{{ url('Frontend/img/onday.png') }}" alt="" class="img-responsive">
	  					
	  				</div>
			  	</div>
			</div>
		</div>
	</section>
@endsection