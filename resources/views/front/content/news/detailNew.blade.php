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
					  	<div class="panel-body">
			  				<div class="col-sm-3 col-md-4 col-lg-3 padding-topbot-15px">
			  					<ul class="nav nav-tab sub-sidebar padding-topbot-15px" role="tablist">
			  						<li>
			  							<a class="color-theme-medium" href="{{ url('chuong-trinh-hoc') }}">{{ $nameCate }}</a>
			  						</li>
			  						@if (isset($menu)) 
			  		                    @foreach ($menu as $item) 
				  		                	<li>
				  		                		<a class="color-theme-medium" href="{{ url('',  ["$slug" ,"$item->slug"]) }} ">{{ $item->name }}</a>
				  		                	</li>
			  		              		@endforeach
			  		              	@endif
			  					</ul>
			  				</div>
			  				<div class="col-sm-9 col-md-8 col-lg-9 padding-topbot-15px">
			  					<div class="dashboard-content">
			  						<div class="tab-content">
			  							<div id="gioithieuchung" class="tab-pane fade in active">
			  								<div class="tab-pane active" id="tabs-guide-index" role="tabpanel">
			  									<h2 class="text-center">Title</h2>
			  									<p>content</p>
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