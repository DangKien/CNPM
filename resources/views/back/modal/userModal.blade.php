<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">@{{ data.title }}</h5>
				</div>
				<div class="modal-body">
					<div class="panel panel-primary">
						<div class="panel-body">
							<form class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tên người dùng: </label>
									<div class="col-sm-8">
										<input type="text" ng-model="data.params.name" placeholder="Tên người dùng" class="form-control input-sm"
										id="demo-is-inputsmall">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tài khoản: </label>
									<div class="col-sm-8">
										<input type="text" ng-model="data.params.account" placeholder="Tài khoản" class="form-control input-sm"
										id="demo-is-inputsmall">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Giới tính: </label>
									<div class="col-sm-8">
										<select class="form-control" {{-- class="selectpicker" --}} data-width="100%" ng-model="data.params.gender">
											<option value="0">Nam</option>
											<option value="1">Nữ</option>
											<option value="2">Khác</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Ngày sinh: </label>
									<div class="col-sm-8 input-group date" id="sandbox-container">
										<input ng-model="data.params.birthday" name="birthday" type="text" class="form-control datepicker my-datepicker"><span class="input-group-addon"><i
											class="fa fa-calendar"></i></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="demo-is-inputsmall">Điện thoại: </label>
										<div class="col-sm-8">
											<input type="text" ng-model="data.params.phone" placeholder="Điện thoại" class="form-control input-sm"
											id="demo-is-inputsmall">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label" for="demo-is-inputsmall">Địa chỉ: </label>
										<div class="col-sm-8">
											<input type="text" ng-model="data.params.address" placeholder="Địa chỉ" class="form-control input-sm"
											id="demo-is-inputsmall">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label" for="demo-is-inputsmall">Email: </label>
										<div class="col-sm-8">
											<input type="text" ng-model="data.params.email" placeholder="Email" class="form-control input-sm"
											id="demo-is-inputsmall">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label" for="demo-is-inputsmall">Nghề nghiệp: </label>
										<div class="col-sm-8">
											<input type="text" ng-model="data.params.job" placeholder="Nghề nghiệp" class="form-control input-sm"
											id="demo-is-inputsmall">
										</div>
									</div>
									<div class="form-group">
										<label for="demo-vs-definput" class="control-label col-sm-3">Ảnh đại diện: </label>
										<div class="col-md-8">
											<input type="file" name="avatar" value="" placeholder="">
											<br>
											<img class="avatar" src="{{ url('Nifty') }}/img/av6.png" alt="" style="width: 140px; height: 150px;">
											<br>
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