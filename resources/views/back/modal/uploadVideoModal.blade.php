<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
								<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tiêu đề: </label>
								<div class="col-sm-8">
									<input type="text" placeholder="Tên album" class="form-control input-sm"
									id="demo-is-inputsmall" 
										required
										ng-model="data.params.title">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="demo-is-inputsmall">Nội dung: </label>
								<div class="col-sm-8">
									<textarea class="form-control" rows="6" 
											  required
										      ng-model="data.params.content"
									></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="demo-vs-definput" class="control-label col-sm-3">Ảnh đại diện: </label>
								<div class="col-md-8">
									<input accept= "image/*" class="image-support file-model" type="file"
										   ng-model="data.params.image">
									<img class="avatar" src="{{ url('Nifty') }}/img/av6.png" alt="" style="width: 140px; height: 150px;">
									<br>
								</div>
							</div>

							<div class="form-group">
								<label for="demo-vs-definput" class="control-label col-sm-3">Video: </label>
								<div class="col-md-8">
									<input accept= "video/*" class="file-model " type="file"
										   ng-model="data.params.video">
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" 
						ng-click = "actions.saveVideo()" 
						ng-enter = "actions.saveVideo()" >Cập nhật</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>