<div class="modal fade" ng-dom="editImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-enter="actions.saveImage()">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">Sửa thông tin người dùng</h5>
				</div>
				<div class="modal-body">
					<div class="panel panel-primary">
						<div class="panel-body">
							<form class="form-horizontal" ng-dom="editImageForm">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tên ảnh: </label>
									<div class="col-sm-8">
										<input type="text" placeholder="Tên ảnh" class="form-control input-sm"
										id="demo-is-inputsmall" ng-model="data.paramsEditImage.title">
										<p class="text-danger" style="margin-top: 5px;"
											ng-repeat="er in data.errorsEditImage.title"
										>
										    @{{ er }}
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Ảnh: </label>
									<img class="avatar" ng-src="{{ url('storage/images/album/lib_images') }}/@{{ data.paramsEditImage.url_image }}" alt="" style="padding-left:15px; width: 140px; height: 150px;">
									<br>
								</div>
							</form>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="actions.saveImage()">Cập nhật</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>