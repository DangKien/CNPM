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
			<div class="panel panel-fix">
			  	<div class="panel-body content-body" style="background-color: #fff;">
	  				<div class="menu-left padding-left-0 col-md-5 col-sm-12 text-center" style="margin-top: 40px;">
	  					<h2>Trường mầm nom Color House</h2>
	  					<br>
	  					<br>
	  					<p><i class="fa fa-address-card" aria-hidden="true"></i> Địa chỉ: Lệ Mật,Việt Hưng, Long Biên, Hà Nội </p>
	  					<p><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Email: colorhouse@gmail.com</p>
	  					<p><i class="fa fa-phone" aria-hidden="true"></i> Số điện thoại: 01659901941</p>
	  					<img class="img-responsive" src="{{ url('Frontend/img/gioithieu') }}/map.png" style="width: 100%; padding-left: 10px;padding-top: 15px;" alt="">
	  				</div>
	  				<div class="content-main col-md-7 col-sm-12">
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
									<div class="form-group" ng-if="data.check">
						    			<label class="col-sm-3 control-label" for="demo-is-inputsmall"></label>
						    			<div class="col-sm-12 text-center">
						    				<div class="text-success" style="margin-top: 5px; font-weight: 600; font-size: 16px;">
						    				    Bạn đã gửi yêu cầu thành công
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

						    		<button ng-click="actions.submitForm()" type="button" class="btn btn-warning pull-right button-fix ">Phản hồi</button>
						    	</form>
						  	</div>
						</div>
	  				</div>
			  	</div>
			</div>
		</div>
	</section>
@endsection




