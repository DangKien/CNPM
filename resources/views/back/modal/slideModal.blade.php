<div class="modal fade" ng-dom="slideModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">@{{ data.title }}</h5>
			</div>
			<div class="modal-body">
				<div class="panel panel-primary">
					<div class="panel-body">
						<form class="form-horizontal" ng-dom="slideForm">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall"></label>
									<div class="col-sm-8">
										<div class="text-danger" style="margin-top: 5px;">
										    @{{ data.errors.messages }}
										</div>
									</div>
								</div>
								<!-- insert cate -->
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tiêu đề: </label>
									<div class="col-sm-8">
										<input required type="text" placeholder="Tiêu đề" class="form-control input-sm" id="demo-is-inputsmall"
										ng-model="data.params.title">
										<p class="text-danger" style="margin-top: 5px;"
											ng-repeat="er in data.errors.title"
										>
										    @{{ er }}
										</p>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Nội dung: </label>
									<div class="col-sm-8">
										<input type="text" placeholder="Nội dung" class="form-control input-sm" ng-model="data.params.content"
										id="demo-is-inputsmall" required>
										<p class="text-danger" style="margin-top: 5px;"
											ng-repeat="er in data.errors.content"
										>
										    @{{ er }}
										</p>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Ảnh: </label>
									<div class="col-sm-8">
										<input type="file" placeholder="Tài khoản" class="form-control input-sm image-support" name="fileSlide" 
										id="demo-is-inputsmall">
										<p class="text-danger" style="margin-top: 5px;"
											ng-repeat="er in data.errors.imageSlide"
										>
										    @{{ er }}
										</p>
										<br>
										<img class="image-support img-responsive" src="{{ url('Nifty') }}/img/av6.png" alt="" style="width: 140px; height: 150px;">
										<br>

									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Trạng thái: </label>
									<div class="col-sm-8 text-left" style="margin-top:6px;">
										<input ng-model="data.params.status" type="radio" value="AVAILABLE"> Hoạt động
										<input ng-model="data.params.status" type="radio" value="DISABLE"> Không hoạt động
									</div>
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