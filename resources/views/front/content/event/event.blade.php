@extends('front.layouts.default')
@section ('title', $nameCate)
@section ('myJs')
	
	<script src="{{ url('Frontend') }}/plugin/fullcalendar/fullcalendar.min.js"></script>
	<script src="{{ url('Frontend') }}/js/directive/myCalendar.js"></script>

	<script src="{{ url('Frontend') }}/js/directive/modal/eventModal.js"></script>
	<script src="{{ url('Frontend') }}/js/factory/service/eventService.js"></script>
	
	<script src="{{ url('Frontend') }}/js/ctrl/eventCtrl.js"></script>

	
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
	  				<div class="content-main col-sm-12 col-md-9 col-lg-9 padding-topbot-15px" ng-controller="eventCtrl">
	  					<div class="con-index-news" >
                            <i class="fa fa-home style-home"></i>
                            <i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix">{{ $nameCate }}</i>
                        </div>
	  					<div class="post-content" role="tabpanel">
	  						<div id='calendar' class="my-calendar" config="calendarConfig"></div>
	  						{{-- <my-calendar calendar='calendar' config="calendarConfig"></my-calendar> --}}
	  					</div>

	  					<event-modal id-event="idEvent" event-modal="chosseEventModal"> </event-modal>
	  				</div>
			  	</div>
			</div>
		</div>

		<div class="modal" id="modalLoader">
		    <div id="loader-wrapper">
		        <div id="loader"></div>
		    </div>
		</div><!-- /.modal -->

	</section>
@endsection

