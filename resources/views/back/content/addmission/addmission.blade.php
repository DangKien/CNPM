@extends('back.layouts.default')
@section ('title', 'Đăng kí học')
@section ('myJs')
	<script src="{{ url('')}}/js/ctrl/backend/addmissionCtrl.js"></script>
	<script src="{{ url('')}}/js/factory/services/backend/addmissionService.js"></script>
	<script src="{{ url('')}}/js/factory/socketIo.js"></script>
@endsection
@section('content')
	<div id="content-container" ng-controller="addmissionCtrl">
		
		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow">@if(isset($title) ) {{ $title }} @endif</h1>
			<!--Searchbox-->
		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->

		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
				
			</div>
			<div class="panel">
				<!--Data Table-->
				<!--===================================================-->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Tên học sinh</th>
									<th>Giới tính</th>
									<th>Ngày sinh</th>
									<th>Họ tên mẹ, cha</th>
									<th>Số điện thoại</th>
									<th>Email</th>
									<th>Địa chỉ</th>
									<th>Tin nhắn</th>
									<th>Trạng thái</th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="(key, addmission) in data.listAddmission">
									<td>@{{ addmission.name_student }}</td>
									<td>
										<span ng-if="(addmission.gender == 'MALE')">
											Nam
										</span>
										<span ng-if="(addmission.gender == 'FEMALE')">
											Nữ
										</span>
										<span ng-if="(addmission.gender == 'ORTHER')">
											Khác
										</span>
									</td>
									<td>@{{ addmission.birthday | formatDate }}</td>
									<td>@{{ addmission.name_parent }}</td>
									<td>@{{ addmission.phone }}</td>
									<td>@{{ addmission.email }}</td>
									<td>@{{ addmission.address }}</td>
									<td>@{{ addmission.message }}</td>
									<td><div class="label" ng-class=" {'label-warning': addmission.status == 'PENDING',  'label-success': addmission.status == 'AVAILABLE' }">
										<span ng-if="(addmission.status == 'PENDING')">
											Đang đợi
										</span>
										<span ng-if="(addmission.status == 'AVAILABLE')">
											Đã liên hệ
										</span>
									</div></td>
									<td>
										<span ng-if="(addmission.status == 'PENDING')">
											<button ng-click="actions.checkAdd(addmission.id)"
						            				class="btn btn-default btn-icon btn-circle icon-lg fa fa-check"
						            				title="Đã liên hệ">
						            					
						            		</button>
										</span>
						        	</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!--===================================================-->
				<!--End Data Table-->
				<div class="row text-center">
				   <div class="page-oum">
				       <div paging
				           page="data.pageAddmission.current_page"
				           page-size = "data.pageAddmission.per_page"
				           total="data.pageAddmission.total"
				           paging-action="actions.changePage(page)">
				       </div>
				   </div>
				</div>
			</div>
		</div>
		<!--===================================================-->
		<!--End page content-->
	

</div>
@endsection