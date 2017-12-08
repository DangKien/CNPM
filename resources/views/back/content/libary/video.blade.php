@extends('back.layouts.default')
@section ('title', 'Thư viện video')
@section ('myJs')
	<script src="{{ url('')}}/js/ctrl/backend/videoCtrl.js"></script>
	<script src="{{ url('')}}/js/factory/services/backend/videoService.js"></script>
	<script src="{{ url('')}}/js/directives/modal/backend/videoModal.js"></script>
@endsection

@section('content')
	<div id="content-container" ng-controller="videoCtrl">
		
		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow">@if(isset($title)) {{ $title }} @endif</h1>
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
											<th>Tiêu đề</th>
											<th>Ảnh minh họa</th>
											<th>Video</th>
											<th>Nội dung</th>
											<th>Người đăng</th>
											<th>Lượt xem</th>
											<th>Thao tác</th>
										</tr>
									</thead>
									<tbody>
										<tr ng-repeat="(key, video) in data.listVideo">
											<td>@{{ video.title }}</td>
											<td>@{{ video.url_image }}</td>
											<td>@{{ video.url_video }}</td>
											<td>@{{ video.content }}</td>
											<td>@{{ video.title }}</td>
											<td>@{{ video.title }}</td>
											<td>
												<button ng-click="actions.showModalVideo(video.id)"
												        class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit"></button>
												<button ng-click="actions.deleteVideo(video.id)" 
														class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></button>
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
						           page="data.pageVideo.current_page"
						           page-size = "data.pageVideo.per_page"
						           total="data.pageVideo.total"
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
	ng-click="actions.showModalVideo()"
	>
	</button>

	<video-modal data = "data" video-save="actions.saveModalVideo(data)"></video-modal>
</div>
@endsection