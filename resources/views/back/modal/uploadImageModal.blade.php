<div class="modal fade fix-upload-image" id="uploadImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog fix-upload" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Đăng ảnh</h5>
			</div>
			<div class="modal-body">
				<div class="panel panel-primary">
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="image-file upload-multi-image" ng-model="data">
								<input type="file" name="image[]" multiple>
							</div>
							<div id="images">
							</div>
						</form>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" ng-click="actions.save()">Cập nhật</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>