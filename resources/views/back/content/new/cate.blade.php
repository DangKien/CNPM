@extends('back.layouts.default')
@section ('title', 'Loại tin')
@section ('myJs')
    <script src="{{ url('')}}/js/ctrl/backend/cateCtrl.js"></script>
    <script src="{{ url('')}}/js/factory/services/backend/cateService.js"></script>
    <script src="{{ url('')}}/js/directives/modal/backend/cateModal.js"></script>
@endsection

@section('content')
	<div id="content-container" ng-controller="cateCtrl">
		
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
				<div class="col-md-4 col-sm-6">
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
			<!-- tim kiem nang cao -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
					    <!--Panel body-->
					    <div id="demo-panel-collapse-default" class="collapse">
					        <form>
					            <div class="panel-body">
					                <div class="row">
					                   <form class="" ng-enter="actions.listCate()">
					                   		 <div class="col-sm-6">
					                        <div class="form-group">
					                            <label class="control-label">Tên loại tin: </label>
					                            <input ng-model = "data.filter.name" type="text" class="form-control">
					                        </div>
					                    </div>
					                    <div class="col-sm-6">
					                        <div class="form-group">
					                            <label class="control-label">Trạng thái: </label>
					                            <br>
					                            <select id ="statusFilter"  class="form-control" data-width="100%">
					                                <option value="1" selected ="selected">Hoạt động</option>
					                                <option value="2">Không hoạt động</option>
					                            </select>
					                        </div>
					                    </div>
					                   
					                </div>
					            </div>
					            <div class="panel-footer text-right">
					                <button ng-click="actions.listCate()" class="btn btn-info" type="submit">
					                	<i class="fa fa-search"> Tìm kiếm</i>
					                </button>
					            </div>
					        </form>
					    </div>
					</div>
				</div>
			</div>
			<!-- het tim kiem nang cao -->
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
											<th>Tên loại tin</th>
											<th>Loại tin cha</th>
											<th>Tag</th>
											<th>Trạng thái</th>
											<th>Người sửa</th>
											<!-- <th>Thao tác</th> -->
										</tr>
									</thead>
									<tbody>
										<tr ng-repeat="(key, cate) in data.listCate">
											<td> @{{ cate.name }} </td>
											<td> @{{ cate.cate_id }} </td>
											<td> @{{ cate.tag }} </td>
											<td> @{{ cate.status }} </td>
											<td> @{{ cate.users.name }} </td>
											<!-- <td> 
												<button ng-click= "actions.showModal(cate.id)" class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit"></button>
												<button ng-click= "actions.deleteCate(cate.id)" class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></button>
											</td> -->
										</tr>
									</tbody>
								</table>
							</div>

							<div class="row text-center">
							   <div class="page-oum">
							       <div paging
							           page="page"
							           page-size = "data.pageCate.per_page"
							           total="data.pageCate.total"
							           paging-action="actions.changePage(page)">
							       </div>
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
	<!-- <button 
	class="btn btn-primary btn-icon btn-circle icon-lg fa fa-plus pull-right"
	style="position: fixed; right: 15px; bottom: 20px; z-index: 500;"
	ng-click="actions.showModal()"
	>
	</button> -->
	<cate-modal cate-data="data" cate-save="actions.save(data)" dom-cate-form="domCateForm" dom-cate-modal="domCateModal"> </cate-modal>	
	</div>
@endsection