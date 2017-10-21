<div class="modal fade" id="dishes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">Sửa thông tin người dùng</h5>
				</div>
				<div class="modal-body">
					<div class="panel panel-primary">
						<div class="panel-body">
							<form class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tên người dùng: </label>
									<div class="col-sm-8">
										<input type="text" placeholder="Tên người dùng" class="form-control input-sm"
										id="demo-is-inputsmall">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tài khoản: </label>
									<div class="col-sm-8">
										<input type="text" placeholder="Tài khoản" class="form-control input-sm"
										id="demo-is-inputsmall">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Giới tính: </label>
									<div class="col-sm-8">
										<select class="selectpicker" data-width="100%">
											<option>Nam</option>
											<option>Nữ</option>
											<option>Khác</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Ngày sinh: </label>
									<div class="col-sm-8 input-group date" id="sandbox-container">
										<input type="text" class="form-control"><span class="input-group-addon"><i
											class="fa fa-calendar"></i></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="demo-is-inputsmall">Điện thoại: </label>
										<div class="col-sm-8">
											<input type="text" placeholder="Điện thoại" class="form-control input-sm"
											id="demo-is-inputsmall">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label" for="demo-is-inputsmall">Địa chỉ: </label>
										<div class="col-sm-8">
											<input type="text" placeholder="Địa chỉ" class="form-control input-sm"
											id="demo-is-inputsmall">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label" for="demo-is-inputsmall">Email: </label>
										<div class="col-sm-8">
											<input type="text" placeholder="Email" class="form-control input-sm"
											id="demo-is-inputsmall">
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label" for="demo-is-inputsmall">Nghề nghiệp: </label>
										<div class="col-sm-8">
											<input type="text" placeholder="Nghề nghiệp" class="form-control input-sm"
											id="demo-is-inputsmall">
										</div>
									</div>
									<div class="form-group">
										<label for="demo-vs-definput" class="control-label col-sm-3">Ảnh đại diện: </label>
										<div class="col-md-8">
											<input type="file" name="" value="" placeholder="">
											<br>
											<img class="avatar" src="{{ url('Nifty') }}/img/av6.png" alt="" style="width: 140px; height: 150px;">
											<br>
										</div>
									</div>
								<div class="radio">
									<label for="demo-vs-definput" class="control-label col-sm-3" style="padding-top:3px;">Trạng
									thái:</label>
									&nbsp; &nbsp;
									<label class="form-radio form-normal"><input type="radio" name="de-blk2" checked>Hoạt
									động </label>
									<label class="form-radio form-normal"><input type="radio" name="de-blk2">Không hoạt động</label>
								</div>
							</form>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">Cập nhật</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>