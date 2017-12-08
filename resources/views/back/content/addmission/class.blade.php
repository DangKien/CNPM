@extends('back.layouts.default')
@section ('title', 'Loại tin')
@section ('myJs')
	<script src="{{ url('')}}/js/ctrl/backend/contactCtrl.js"></script>
	<script src="{{ url('')}}/js/factory/services/backend/contactService.js"></script>
@endsection

@section('content')
	<div id="content-container" ng-controller="contactCtrl">
		
		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow">Liên hệ</h1>
			<!--Searchbox-->
		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->

		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
				
			</div>
			<div class="row">			
				<!-- datatable -->
				<div class="col-sm-12">
					<div class="panel">
						<!--Data Table-->
						<!--===================================================-->
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Họ Tên</th>
											<th>Địa chỉ</th>
											<th>Số điện thoại</th>
											<th>Email</th>
											<th>Nội dung</th>
										</tr>
									</thead>
									<tbody>
										<tr ng-repeat="(key, contact) in data.listContact">
											<td>@{{ contact.name }}</td>
											<td>@{{ contact.address }}</td>
											<td>@{{ contact.phone }}</td>
											<td>@{{ contact.email }}</td>
											<td>
												@{{ contact.content }}
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
						           page="data.pageContact.current_page"
						           page-size = "data.pageContact.per_page"
						           total="data.pageContact.total"
						           paging-action="actions.changePage(page)">
						       </div>
						   </div>
						</div>
					</div>
				</div>
				<!-- end datatable -->

			</div>	
		</div>
		<!--===================================================-->
		<!--End page content-->
	</div>
@endsection