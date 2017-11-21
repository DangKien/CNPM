@extends('back.layouts.default')
@section ('title', 'Loại tin')
	@section ('myJs')
		<script src="{{ url('')}}/js/ctrl/backend/menuCtrl.js"></script>
	    <script src="{{ url('')}}/js/factory/services/backend/menuService.js"></script>
	    <script src="{{ url('')}}/js/directives/modal/backend/menuModal.js"></script>
	@endsection
@section('content')
	<div id="content-container" ng-controller="menuCtrl">
		
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
				<div class="col-md-6 col-sm-6">
					<div class="searchbox">
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" placeholder="Tìm kiếm..">
							<span class="input-group-btn">
								<button class="text-muted" type="button"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-5 pull-right search-nc">
					<button type="button" class="btn btn-primary pull-right" data-target="#demo-panel-collapse-default"
					        data-toggle="collapse">Tìm kiếm nâng cao
					</button>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
					    <!--Panel body-->
					    <div id="demo-panel-collapse-default" class="collapse">
					        <form>
					            <div class="panel-body">
					                <div class="row">
					                    <div class="col-sm-6">
					                        <div class="form-group">
					                            <label class="control-label">Họ tên: </label>
					                            <input type="text" class="form-control">
					                        </div>
					                    </div>
					                    <div class="col-sm-6">
					                        <div class="form-group">
					                            <label class="control-label">Email: </label>
					                            <input type="text" class="form-control">
					                        </div>
					                    </div>
					                </div>
					                <div class="row">
					                    <div class="col-sm-6">
					                        <div class="form-group">
					                            <label class="control-label">Số điện thoại</label>
					                            <input type="email" class="form-control">
					                        </div>
					                    </div>
					                    <div class="col-sm-6">
					                        <div class="form-group">
					                            <label class="control-label">Trạng thái: </label>
					                            <br>
					                            <select class="selectpicker" data-width="100%">
					                                <option>Hoạt động</option>
					                                <option>Không hoạt động</option>
					                            </select>
					                        </div>
					                    </div>
					                    
					                    
					                </div>
					            </div>
					            <div class="panel-footer text-right">
					                <button class="btn btn-info" type="submit"><i class="fa fa-search"> Tìm kiếm</i>
					                </button>
					            </div>
					        </form>
					    </div>
					</div>
				</div>
		</div>
			<div class="panel">
				<!--Data Table-->
				<!--===================================================-->
				<div class="panel-body">
					
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>STT</th>
									<th>Tuần</th>
									<th>Tháng</th>
									<th>Năm</th>
									<th>Thực đơn</th>
									<th>Loại</th>
									<th>Thao tác </th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="(key, menu) in data.listMenu">
									<td>@{{ key + 1 }}</td>
									<td>@{{ menu.week }}</td>
									<td>@{{ menu.month }}</td>
									<td>@{{ menu.year }}</td>
									<td><img style="height: 100px; width: 100px;" ng-src="{{ url('storage/images/menu/title_menu') }}/@{{ menu.url_image }}" alt=""></td>
									<td>@{{ menu.cates.name }}</td>
									<td>
										<button ng-click= "actions.showModalMenu(menu.id)" class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit"></button>
										<button ng-click= "actions.deleteMenu(menu.id)" class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></button>
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
				           page="page"
				           page-size = "data.pageMenu.per_page"
				           total="data.pageMenu.total"
				           paging-action="actions.changePage(page)">
				       </div>
				   </div>
				</div>
			</div>
		</div>
		<!--===================================================-->
		<!--End page content-->
		<button 
	class="btn btn-primary btn-icon btn-circle icon-lg fa fa-plus pull-right"
	style="position: fixed; right: 15px; bottom: 20px; z-index: 500;"
	ng-click="actions.showModalMenu()"
	>
	</button>
	
	<menu-moal menu-save="actions.saveModalMenu(data)" data="data" dom-menu-modal ="domMenuModal" dom-menu-form="domMenuForm"> </menu-moal>
	
</div>
@endsection