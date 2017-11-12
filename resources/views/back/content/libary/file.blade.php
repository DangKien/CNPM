@extends('back.layouts.default')
@section ('title', 'Thư viện tài liệu')
@section ('myJs')
	<script src="{{ url('')}}/js/ctrl/backend/fileCtrl.js"></script>
	<script src="{{ url('')}}/js/factory/services/backend/fileService.js"></script>
	<script src="{{ url('')}}/js/directives/modal/backend/fileModal.js"></script>
@endsection

@section('content')
	<div id="content-container" ng-controller="fileCtrl">
		
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
				<div class="col-md-3 col-sm-4" ng-repeat=" (key,file) in data.listFile">
					<div class="panel text-center">
						<div class="panel-body">
							<img class="image-file-fix img-border mar-btm" ng-src="{{ url('storage/images/file') }}/@{{ file.url_image }}" alt="">
						</div>
						<div class="pad-all text-left">
							<p><b>Tên tài liệu:</b> @{{ file.title }} </p>
							<p><b>Loại File:</b> @{{ file.cate_file }} </p>
							<p><b>Ngày đăng:</b> @{{ file.updated_at }} </p>
							<a href="">
								<p class="text-center text-primary">
									<b> Download </b>
									<i class="fa fa-download" aria-hidden="true"></i>
								</p>
							</a>
						</div>
						<div class="pad-btm">
						    <button ng-click="actions.showModalFile(file.id)"
						            class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit"></button>
						    <button ng-click="actions.removeFile(file.id)" 
						    		class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="row text-center">
			   <div class="page-oum">
			       <div paging
			           page="page"
			           page-size = "data.pageFile.per_page"
			           total="data.pageFile.total"
			           paging-action="actions.changePage(page)">
			       </div>
			   </div>
			</div>	
		</div>
		<!--===================================================-->
		<!--End page content-->
	<button 
	class="btn btn-primary btn-icon btn-circle icon-lg fa fa-plus pull-right"
	style="position: fixed; right: 15px; bottom: 20px; z-index: 500;"
	ng-click="actions.showModalFile()"
	>
	</button>

	<file-modal data = "data" file-save = "actions.saveModalFile(data)" dom-file-modal="domFileModal" dom-file-form="domFileForm"> </file-modal>
</div>
@endsection