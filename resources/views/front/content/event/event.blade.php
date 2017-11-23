@extends('front.layouts.default')
@section ('title', $nameCate)
@section ('myJs')
	<script src="{{ url('Frontend') }}/js/ctrl/eventCtrl.js"></script>
	<script src="{{ url('Frontend') }}/js/factory/service/cateNewService.js"></script>
	<script src="{{ url('Frontend') }}/js/directive/myCalendar.js"></script>
@endsection

@section('content')
	<section>
		<div class="container">
			<div class="panel">
			  	<div class="panel-body">
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
	  				<div class="col-sm-9 col-md-8 col-lg-9 padding-topbot-15px" ng-controller="eventCtrl">
	  					<div class="con-index-news" >
                            <i class="fa fa-home style-home"></i>
                            <i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix">{{ $nameCate }}</i>

                        </div>
	  					<div class="post-content" role="tabpanel">
	  						<my-calendar calendar='calendar' config="calendarConfig"></my-calendar>
	  					</div>
	  					
	  				</div>
			  	</div>
			</div>
		</div>
	</section>
@endsection

