@extends('back.layouts.default')
@section ('title', 'Sự kiện')
@section ('myJs')
	<script src="{{ url('')}}/js/ctrl/backend/eventCtrl.js"></script>
	<script src="{{ url('')}}/js/factory/services/backend/eventService.js"></script>
	<script src="{{ url('')}}/js/directives/modal/backend/eventModal.js"></script>
@endsection

@section('content')
	<div id="content-container" ng-controller="eventCtrl">
		
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
			<div class="searchbox">
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" placeholder="Tìm kiếm..">
					<span class="input-group-btn">
						<button class="text-muted" type="button"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel">
						<!--Data Table-->
						<!--===================================================-->
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>STT</th>
											<th>Tên sự kiện</th>
											<th>Ngày bắt đầu</th>
											<th>Ngày kết thúc</th>
											<th>Nội dung</th>
											<th>Hành động</th>
										</tr>
									</thead>
									<tbody>
										<tr ng-repeat="(key, event) in data.listEvent">
											<td>@{{ key + 1 }}</td>
											<td>@{{ event.name }}</td>
											<td>@{{ event.begin_date | formatDate }}</td>
											<td>@{{ event.end_date | formatDate }}</td>
											<td>@{{ event.content }}</td>
											<td>
												<button ng-click= "actions.showEventModal(event.id)" class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit"></button>
												<button ng-click= "actions.deleteEvent(event.id)" class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="row text-center">
						   <div class="page-oum">
						       <div paging
						           page="page"
						           page-size = "data.pageEvent.per_page"
						           total="data.pageEvent.total"
						           paging-action="actions.changePage(page)">
						       </div>
						   </div>
						</div>
						<!--===================================================-->
						<!--End Data Table-->
					</div>
				</div>
				<!-- end datatable -->
			</div>	
		</div>
		<!--===================================================-->
		<!--End page content-->
	<button 
	class="btn btn-primary btn-icon btn-circle icon-lg fa fa-plus pull-right"
	style="position: fixed; right: 15px; bottom: 20px; z-index: 500;"
	ng-click="actions.showEventModal()"
	>
	</button>
	<event-modal data="data" form-validate="eventForm" event-chosse-modal="eventModal" save-event="actions.saveEvent(data)"> </event-modal>
</div>
@endsection