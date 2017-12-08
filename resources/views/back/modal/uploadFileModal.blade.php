<div class="modal fade" ng-dom="fileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" ng-enter="actions.saveFile()">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">@{{ data.title }}</h5>
			</div>
			<div class="modal-body">
				<div class="panel panel-primary">
					<div class="panel-body">
						<form class="form-horizontal" ng-dom="fileForm">
							<div class="form-group">
								<label class="col-sm-3 control-label" for="demo-is-inputsmall"></label>
								<div class="col-sm-8">
									<div class="text-danger" style="margin-top: 5px;">
									    @{{ data.errors.messages }}
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tiêu đề: </label>
								<div class="col-sm-8">
									<input required type="text" placeholder="Tiêu đề" class="form-control input-sm" ng-model="data.params.title"
									id="demo-is-inputsmall">
									<p class="text-danger" style="margin-top: 5px;"
										ng-repeat="er in data.errors.title"
									>
									    @{{ er }}
									</p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label" for="demo-is-inputsmall">Ảnh nền tài liệu: </label>
								<div class="col-sm-8">
									<input type="file" class="form-control input-sm image-support" name="image-title"
									id="demo-is-inputsmall">
									<p class="text-danger" style="margin-top: 5px;"
										ng-repeat="er in data.errors.image"
									>
									    @{{ er }}
									</p>
									<br>
									<img class="image-support img-responsive" src="{{ url('Nifty') }}/img/av6.png" alt="" style="width: 140px; height: 150px;">
									<br>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tài liệu: </label>
								<div class="col-sm-8">
									<input name="file" type="file" class="form-control input-sm"
									id="demo-is-inputsmall">
									<p class="text-danger" style="margin-top: 5px;"
										ng-repeat="er in data.errors.file"
									>
									    @{{ er }}
									</p>
									{{-- <p> @{{ data.params.url_file }} </p> --}}
								</div>
							</div>

						</form>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" ng-click="actions.saveFile()">Cập nhật</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>