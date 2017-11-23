@extends('front.layouts.default')
@if(isset($nameCate))
	@section ('title', $nameCate)   
@endif
@section ('myJs')
	<script src="{{ url('Frontend') }}/js/ctrl/addmissionCtrl.js"></script>
	<script src="{{ url('Frontend') }}/js/factory/service/addmissionService.js"></script>
@endsection

@section('content')
	<section>
		<div class="container" ng-controller="addmissionCtrl">
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
							<i class="fa fa-home style-home"></i><i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true">{{ $nameCate }}</i>
							<i class="fa fa-chevron-right fa-chevron-right-1 breadcrumb-fix" aria-hidden="true">Đăng kí tuyển sinh Online</i>  
						</div>
							<h3 class="text-center text-title-content">
								Đăng kí tuyển sinh trực tuyến
							</h3>

						<form ng-enter = "actions.insertAddMission()" ng-dom="formVal">
							<div class="panel panel-default content-post row">
								<div class="form-group">
						    			<label class="col-sm-3 control-label" for="demo-is-inputsmall"></label>
						    			<div class="col-sm-12 text-center">
						    				<div class="text-danger" style="margin-top: 5px;">
						    				    @{{ data.errors.messages }}
						    				</div>
						    			</div>
						    		</div>
							  	<div class="panel-body col-md-6 ">
							  		<h5 class="text-center"> Thông tin học sinh </h5>
							    		<div class="form-group">
							    		    <label for="nameStudent">Tên học sinh:</label>
							    		    <input type="text" class="form-control" id="nameStudent" placeholder="Tên học sinh" ng-model="data.params.nameStudent" required>
							    		    <ul>
							    		        <li class="text-danger text-left" style="margin-top: 5px;"
							    		      	ng-repeat="er in data.errors.nameStudent"
							    		        >
							    		            @{{ er }}
							    		        </li>
						    		      </ul>
							    		</div>

							    		<div class="form-group">
							    		    <label for="gender">Giới tính:</label>
							    		    <select type="text" class="form-control" id="gender" placeholder="Giới tính"  ng-model="data.params.gender" required>
							    		    	<option value="">Chọn giới tính</option>
							    		    	<option value="MALE">Nam</option>
							    		    	<option value="FEMALE">Nữ</option>
							    		    	<option value="ORTHER">Khác</option>
							    		    </select>
							    		    <ul>
							    		        <li class="text-danger text-left" style="margin-top: 5px;"
							    		      	ng-repeat="er in data.errors.gender"
							    		        >
							    		            @{{ er }}
							    		        </li>
						    		      </ul>
							    		</div>

							    		<div class="form-group">
							    		    <label for="birthday">Ngày sinh:</label>
							    		    <input type="text" class="form-control" id="birthday" placeholder="Ngày sinh" ng-model="data.params.birthday" required >
							    		    <ul>
							    		        <li class="text-danger text-left" style="margin-top: 5px;"
							    		      	ng-repeat="er in data.errors.birthday"
							    		        >
							    		            @{{ er }}
							    		        </li>
						    		        </ul>
							    		</div>
							  	</div>

							  	<div class="panel-body col-md-6 boder-fix-content">
							  		<h5 class="text-center"> Thông tin phụ huynh </h5>
							    		<div class="form-group">
							    		    <label for="nameParent">Tên phụ huynh:</label>
							    		    <input type="text" class="form-control" id="nameParent" placeholder="Tên phụ huynh" ng-model="data.params.nameParent" required>
							    		    <ul>
							    		        <li class="text-danger text-left" style="margin-top: 5px;"
							    		      	ng-repeat="er in data.errors.nameParent"
							    		        >
							    		            @{{ er }}
							    		        </li>
						    		        </ul>
							    		</div>

							    		<div class="form-group">
							    		    <label for="email">Email:</label>
							    		    <input type="email" class="form-control" id="email" placeholder="Email" ng-model="data.params.email" data-parsley-type="email"	required>
							    		    <ul>
							    		        <li class="text-danger text-left" style="margin-top: 5px;"
							    		      	ng-repeat="er in data.errors.email"
							    		        >
							    		            @{{ er }}
							    		        </li>
						    		        </ul>
							    		</div>

							    		<div class="form-group">
							    		    <label for="phone">Số điện thoại:</label>
							    		    <input type="text" class="form-control" id="phone" placeholder="Số điện thoại" ng-model="data.params.phone" data-parsley-type="integer" required>
							    		    <ul>
							    		        <li class="text-danger text-left" style="margin-top: 5px;"
							    		      	ng-repeat="er in data.errors.phone"
							    		        >
							    		            @{{ er }}
							    		        </li>
						    		        </ul>
							    		</div>

							    		<div class="form-group">
							    		    <label for="address">Địa chỉ:</label>
							    		    <input type="text" class="form-control" id="address" placeholder="Địa chỉ" ng-model="data.params.address" required>
							    			<ul>
							    		        <li class="text-danger text-left" style="margin-top: 5px;"
							    		      	ng-repeat="er in data.errors.address"
							    		        >
							    		            @{{ er }}
							    		        </li>
						    		        </ul>
							    		</div>
							  	</div>
							  	<div class="col-md-12">
							  		<div class="form-group">
							  		    <label for="message">Tin nhắn: </label>
							  		    <textarea ng-model="data.params.message" id="message" class="form-control" rows="5"></textarea>
							  		    <ul>
							    		    <li class="text-danger text-left" style="margin-top: 5px;"
							    		      	ng-repeat="er in data.errors.message"
							    		        >
							    		            @{{ er }}
							    		    </li>
						    		     </ul>
							  		</div>
							  	</div>
							  	<div class="text-center">
							  		<button ng-click="actions.insertAddMission()" class="btn btn-warning button-dk">Đăng kí học</button>
							  	</div>
							</div>
						</form>
					
						</div>
			  	</div>
			</div>
		</div>
	</section>
@endsection
