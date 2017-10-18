@extends('back.layouts.default')
@section ('title', 'Nhân viên')
@section ('myJs')
<script src=""></script>
<script src=""></script>
@section('content')
<div id="content-container">
	
	<!--Page Title-->
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	<div id="page-title">
		<h1 class="page-header tẽt-overflow">@if(isset($title) ) {{ $title }} @endif</h1>
	</div>
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	<!--End page title-->

	<!--Page content-->
	<!--===================================================-->
	<div id="page-content">
		<!-- searchbox -->
		<div class="searchbox">
			<div class="input-group custom-search-form">
				<input type="tẽt" class="form-control" placeholder="Tìm kiếm..">
				<span class="input-group-btn">
					<button class="text-muted" type="button"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</div>
		<!-- end searchbox 	-->

		<!-- content  -->
		<div class="col-md-6 col-lg-3">
			<div class="panel text-center">
				<div class="panel-body">
					<img alt="Avatar" class="img-md img-circle img-border mar-btm" src="{{ url('Nifty/') }}/img/av6.png">
					<h4 class="mar-no">Tên</h4>
					<p>Chức vụ</p>
				</div>
				<div class="pad-all">
					<p class="text-left font14">
						<i class="fa fa-envelope"> &nbsp; &nbsp; Email</i>
					</p>
					<p class="text-left font14">
						<i class="fa fa-phone"> &nbsp; &nbsp; Số điện thoại</i>
					</p>
					<p class="text-left font14">
						<i class="fa fa-address-card"> &nbsp; &nbsp; Địa chỉ nhà</i>
					</p>
					<br>
					<div class="pad-btm">
						<button  ng-click="actions.showModal('edit', user.id)"
						class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit"></button>
						<button ng-click="actions.resetPassword(user.id)" class="btn btn-default btn-icon btn-circle icon-lg fa fa-refresh"></button>
						<button ng-click="actions.resetPassword(user.id)" class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></button>
					</div>
				</div>
			</div>
			<!--===================================================-->
		</div>

		<div class="col-md-6 col-lg-3">
			<div class="panel text-center">
				<div class="panel-body">
					<img alt="Avatar" class="img-md img-circle img-border mar-btm" src="{{ url('Nifty/') }}/img/av6.png">
					<h4 class="mar-no">Tên</h4>
					<p>Chức vụ</p>
				</div>
				<div class="pad-all">
					<p class="text-left font14">
						<i class="fa fa-envelope"> &nbsp; &nbsp; Email</i>
					</p>
					<p class="text-left font14">
						<i class="fa fa-phone"> &nbsp; &nbsp; Số điện thoại</i>
					</p>
					<p class="text-left font14">
						<i class="fa fa-address-card"> &nbsp; &nbsp; Địa chỉ nhà</i>
					</p>
					<br>
					<div class="pad-btm">
						<button  ng-click="actions.showModal('edit', user.id)"
						class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit"></button>
						<button ng-click="actions.resetPassword(user.id)" class="btn btn-default btn-icon btn-circle icon-lg fa fa-refresh"></button>
						<button ng-click="actions.resetPassword(user.id)" class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></button>
					</div>
				</div>
			</div>
			<!--===================================================-->
		</div>

		<div class="col-md-6 col-lg-3">
			<div class="panel text-center">
				<div class="panel-body">
					<img alt="Avatar" class="img-md img-circle img-border mar-btm" src="{{ url('Nifty/') }}/img/av6.png">
					<h4 class="mar-no">Tên</h4>
					<p>Chức vụ</p>
				</div>
				<div class="pad-all">
					<p class="text-left font14">
						<i class="fa fa-envelope"> &nbsp; &nbsp; Email</i>
					</p>
					<p class="text-left font14">
						<i class="fa fa-phone"> &nbsp; &nbsp; Số điện thoại</i>
					</p>
					<p class="text-left font14">
						<i class="fa fa-address-card"> &nbsp; &nbsp; Địa chỉ nhà</i>
					</p>
					<br>
					<div class="pad-btm">
						<button  ng-click="actions.showModal('edit', user.id)"
						class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit"></button>
						<button ng-click="actions.resetPassword(user.id)" class="btn btn-default btn-icon btn-circle icon-lg fa fa-refresh"></button>
						<button ng-click="actions.resetPassword(user.id)" class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></button>
					</div>
				</div>
			</div>
			<!--===================================================-->
		</div>

		<div class="col-md-6 col-lg-3">
			<div class="panel text-center">
				<div class="panel-body">
					<img alt="Avatar" class="img-md img-circle img-border mar-btm" src="{{ url('Nifty/') }}/img/av6.png">
					<h4 class="mar-no">Tên</h4>
					<p>Chức vụ</p>
				</div>
				<div class="pad-all">
					<p class="text-left font14">
						<i class="fa fa-envelope"> &nbsp; &nbsp; Email</i>
					</p>
					<p class="text-left font14">
						<i class="fa fa-phone"> &nbsp; &nbsp; Số điện thoại</i>
					</p>
					<p class="text-left font14">
						<i class="fa fa-address-card"> &nbsp; &nbsp; Địa chỉ nhà</i>
					</p>
					<br>
					<div class="pad-btm">
						<button  ng-click="actions.showModal('edit', user.id)"
						class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit"></button>
						<button ng-click="actions.resetPassword(user.id)" class="btn btn-default btn-icon btn-circle icon-lg fa fa-refresh"></button>
						<button ng-click="actions.resetPassword(user.id)" class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></button>
					</div>
				</div>
			</div>
			<!--===================================================-->
		</div>
		<!-- end content -->
	</div>
	<!--===================================================-->
	<!--End page content-->

	<button 
	class="btn btn-primary btn-icon btn-circle icon-lg fa fa-plus pull-right"
	style="position: fixed; right: 15px; bottom: 20px; z-index: 500;"
	data-toggle="modal" data-target="#edit-user"
	>
	</button>

	<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
</div>
@endsection