@extends('back.layouts.default')
@section ('title', 'Loại tin')

@section ('myJs')
	<script src="{{ url('') }}/js/directives/modal/newModal.js"></script>
	<script src="{{ url('')}}/js/ctrl/newCtrl.js"></script>
    <script src="{{ url('')}}/js/factory/services/newService.js"></script>
    <script src="{{ url('')}}/js/factory/services/cateService.js"></script>
	<script src=""></script>
@endsection

@section('content')
	<div id="content-container" ng-controller="newCtrl">
		
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
			<!-- tim kiem  -->
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
			<!-- het tim kiem -->
			<!-- tim nang cao -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
					    <!--Panel body-->
					    <div id="demo-panel-collapse-default" class="collapse">
					        <form ng-enter="actions.listNew()">
					            <div class="panel-body">
					                <div class="row">
					                    <div class="col-sm-6">
					                        <div class="form-group">
					                            <label class="control-label">Tiêu đề: </label>
					                            <input ng-model="filter.title" type="text" class="form-control">
					                        </div>
					                    </div>
					                    <div class="col-sm-6">
					                        <div class="form-group">
					                            <label class="control-label">Loại tin: </label>
					                            <select class="form-control" data-width="100%">
					                                <option ng-repeat="(key, cate) in data.nameCate" value="@{{ cate.id }}"> @{{ cate.name }} </option>
					                            </select>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <div class="panel-footer text-right">
					                <button ng-click="actions.listNew()" class="btn btn-info" type="submit"><i class="fa fa-search"> Tìm kiếm</i>
					                </button>
					            </div>
					        </form>
					    </div>
					</div>
				</div>
			</div>
			<!-- het tim nang cao -->
			<div class="panel">
				<!--Data Table-->
				<!--===================================================-->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr class="text-center">
									<th>Bài viết</th>
									<th>Ảnh minh họa</th>
									<th>Nội dung</th>
									<th>Loại tin</th>
									<th>Người đăng tin</th>
									<th>Lượng người xem</th>
									<th>Hành động</th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="(key, new) in data.listNews">
									<td>@{{ new.title }}</td>
									<td><img class="img-responsive" style="width: 100px; height: 100px;" src="{{ url('storage/')}}/@{{ new.image }}" alt=""  ></td>
									<td ng-bind-html="new.content"></td>
									<td>@{{ new.cates.name }}</td>
									<td>@{{ new.users.name }}</td>
									<td>@{{ new.view }}</td>
									<td>
										<button ng-click= "actions.showModal(new.id)" class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit"></button>
										<button ng-click= "actions.deleteCate(new.id)" class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></button>
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
				           page-size = "data.pageNew.per_page"
				           total="data.pageNew.total"
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
	ng-click="actions.showModal()"
	>
	</button>

	<new-modal data = "data" save-new="actions.saveNew(data)"> </new-modal>
</div>
@endsection