@extends('back.layouts.default')
@section ('title', 'Loại tin')
@section ('myJs')
	<script src="{{ url('')}}/js/ctrl/backend/slideCtrl.js"></script>
	<script src="{{ url('')}}/js/factory/services/backend/slideService.js"></script>
	<script src="{{ url('')}}/js/directives/modal/backend/SlideModal.js"></script>
@endsection

@section('content')
	<div id="content-container" ng-controller="slideCtrl">
		
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
										<tr class="text-center">
											<th>STT</th>
											<th>Ảnh slide</th>
											<th>Tiêu đề</th>
											<th>Nội dung</th>
											<th>Trạng thái</th>
											<th>Thao tác</th>
										</tr>
									</thead>
									<tbody>
										<tr ng-repeat="(key, slide) in data.listSlides">
											<td>@{{ key + 1 }}</td>
											<td><img class="img-responsive" ng-src="{{ url('storage/images/slides/title_slides') }}/@{{ slide.image }}" alt=""></td>
											<td>@{{ slide.title }}</td>
											<td>@{{ slide.content }}</td>
											<td>@{{ slide.status }}</td>
											<td>
												<button ng-click= "actions.showModal(slide.id)" class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit" title="Cập nhật slide"></button>
												<button ng-click= "actions.deleteSlide(slide.id)" class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash" title="Xóa slide"></button>
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
						           page-size = "data.pageSlide.per_page"
						           total="data.pageSlide.total"
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
		<button 
		class="btn btn-primary btn-icon btn-circle icon-lg fa fa-plus pull-right"
		style="position: fixed; right: 15px; bottom: 20px; z-index: 500;"
		ng-click="actions.showModal()" title="Thêm mới slide" 
		>
		</button>
		<slide-modal data="data" save-slide="actions.saveSlide(data)" dom-slide-form="domSlideForm" dom-slide-modal="domSlideModal"></slide-modal>

</div>
@endsection