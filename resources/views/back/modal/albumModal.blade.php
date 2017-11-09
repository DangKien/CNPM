<div class="modal fade" id="album" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document" ng-enter="actions.saveAlbum()">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">@{{ data.title }}</h5>
				</div>
				<div class="modal-body">
					<div class="panel panel-primary">
						<div class="panel-body">
							<form class="form-horizontal" id="album-form">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tên album: </label>
									<div class="col-sm-8">
										<input type="text" ng-model="data.params.name" placeholder="Tên album" class="form-control input-sm"
										id="demo-is-inputsmall" required>
									</div>
								</div>
								<div class="form-group">
									<label for="demo-vs-definput" class="control-label col-sm-3">Ảnh đại diện: </label>
									<div class="col-md-8">
										<input id="image-album" accept= "image/*" class="image-support" type="file" name="" value="" placeholder="">
										<br>
										<p class="text-danger" ng-repeat="(key, err) in data.errors.imageAlbum">
											@{{ err }}
										</p>
										<img class="avatar" src="{{ url('Nifty') }}/img/av6.png" alt="" style="width: 140px; height: 150px;">
										<br>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="actions.saveAlbum()">Cập nhật</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>