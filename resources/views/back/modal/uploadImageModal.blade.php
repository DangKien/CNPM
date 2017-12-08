<div class="modal fade fix-upload-image" ng-dom="imageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog fix-upload" role="document" ng-enter="actions.saveUploadImg()">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Đăng ảnh</h5>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" ng-dom="imageForm">
					<div class="panel panel-primary">
						<div class="panel-body">
							<p  class="text-danger" style="margin-bottom: 5px;"
								ng-repeat="er in data.errors.upload.image"
							>
								@{{ er }}
							</p>
							<form class="form-horizontal">

								<div>
									<div class="text-danger" style="margin-top: 5px;">
									    @{{ data.errors.messages }}
									</div>
								</div>

								<div class="image-file upload-multi-image" ng-model="data.images">
									<input required id="image-multi" type="file" name="image[]" multiple accept="image/*">
								</div>
								

								<div id="images">
								</div>
							</form>
						</div>
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" ng-click="actions.saveUploadImg()">Cập nhật</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>