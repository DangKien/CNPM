@extends('front.layouts.default')
@if(isset($nameCate))
	@section ('title', $nameCate)   
@endif
@section ('myJs')
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="{{ url('Frontend') }}/js/ctrl/contactCtrl.js"></script>
	<script src="{{ url('Frontend') }}/js/factory/service/contactService.js"></script>
@endsection

@section('content')
	<section>
		<div class="container" ng-controller="contactCtrl">
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
						    	<form class="form-horizontal form-lh" ng-dom="formValidate" ng-enter="actions.submitForm()">
						    		<div class="form-group">
						    			<label class="col-sm-3 control-label" for="demo-is-inputsmall"></label>
						    			<div class="col-sm-8">
						    				<div class="text-danger" style="margin-top: 5px;">
						    				    @{{ data.errors.messages }}
						    				</div>
						    			</div>
						    		</div>
						    		<div class="form-group">
						    		    <label for="name" class="col-md-2 col-sm-4 control-label">Họ tên bạn: </label>
						    		    <div class="col-sm-9">
						    		      <input ng-model="data.params.name" type="text" class="form-control" id="name" placeholder="Hãy điền đầy đủ họ tên của bạn" required>
						    		      <ul>
							    		        <li class="text-danger text-left" style="margin-top: 5px;"
							    		      	ng-repeat="er in data.errors.name"
							    		        >
							    		            @{{ er }}
							    		        </li>
						    		      </ul>
						    		    </div>
						    		</div>

						    		<div class="form-group">
						    		    <label for="name" class="col-md-2 col-sm-4 control-label">Địa chỉ: </label>
						    		    <div class="col-sm-9">
						    		      <input ng-model="data.params.address" type="text" class="form-control" id="name" placeholder="Địa chỉ" required>
						    		       <ul>
							    		        <li class="text-danger text-left" style="margin-top: 5px;"
							    		      	ng-repeat="er in data.errors.address"
							    		        >
							    		            @{{ er }}
							    		        </li>
						    		      </ul>
						    		    </div>
						    		</div>
						    		<div class="form-group">
						    		    <label for="name" class="col-md-2 col-sm-4 control-label">Số điện thoại: </label>
						    		    <div class="col-sm-9">
						    		      <input ng-model="data.params.phone" type="text" class="form-control" id="name" placeholder="Số điện thoại" required data-parsley-type="number">
						    		       <ul>
							    		        <li class="text-danger text-left" style="margin-top: 5px;"
							    		      	ng-repeat="er in data.errors.phone"
							    		        >
							    		            @{{ er }}
							    		        </li>
						    		      </ul>
						    		    </div>
						    		</div>

						    		<div class="form-group">
						    		    <label for="name" class="col-md-2 col-sm-4 control-label">Email: </label>
						    		    <div class="col-sm-9">
						    		      <input ng-model="data.params.email" type="email" class="form-control" id="name" placeholder="Email của bạn" required data-parsley-type="email">
						    		       <ul>
							    		        <li class="text-danger text-left" style="margin-top: 5px;"
							    		      	ng-repeat="er in data.errors.email"
							    		        >
							    		            @{{ er }}
							    		        </li>
						    		      </ul>
						    		    </div>
						    		</div>
						    		
						    		<div class="form-group">
						    		    <label for="name" class="col-md-2 col-sm-4 control-label">Nội dung: </label>
						    		    <div class="col-sm-9">
						    		      <textarea ng-model="data.params.content" class="form-control" rows="10" required></textarea>
						    		      <ul>
							    		        <li class="text-danger text-left" style="margin-top: 5px;"
							    		      	ng-repeat="er in data.errors.content"
							    		        >
							    		            @{{ er }}
							    		        </li>
						    		        </ul>
						    		    </div>
						    		</div>

						    		<div class="form-group">
    		                            <div class="col-md-offset-4 col-md-6">
    		                                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
    		                            </div>
    		                        </div>	

						    		<button ng-click="actions.submitForm()" type="button" class="btn btn-warning pull-right button-fix">Phản hồi</button>
						    	</form>
						  	</div>
						</div>
	  				</div>
			  	</div>
			</div>
		</div>
	</section>
@endsection




