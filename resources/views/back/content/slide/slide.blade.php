@extends('back.layouts.default')
@section ('title', 'Loại tin')
@section ('myJs')
	<script src=""></script>
@endsection

@section('content')
	<div id="content-container">
		
		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow">@if(isset($title) ) {{ $title }} @endif</h1>
			<!--Searchbox-->
		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->

		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="searchbox">
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" placeholder="Tìm kiếm..">
							<span class="input-group-btn">
								<button class="text-muted" type="button"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 pull-right search-nc">
					<button type="button" class="btn btn-primary pull-right" data-target="#demo-panel-collapse-default"
					        data-toggle="collapse">Tìm kiếm nâng cao
					</button>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="panel">
					    <!--Panel body-->
					    <div id="demo-panel-collapse-default" class="collapse">
					        <form>
					            <div class="panel-body">
					                <div class="row">
					                    <div class="col-sm-6">
					                        <div class="form-group">
					                            <label class="control-label">Họ tên: </label>
					                            <input type="text" class="form-control">
					                        </div>
					                    </div>
					                    <div class="col-sm-6">
					                        <div class="form-group">
					                            <label class="control-label">Email: </label>
					                            <input type="text" class="form-control">
					                        </div>
					                    </div>
					                </div>
					                <div class="row">
					                    <div class="col-sm-6">
					                        <div class="form-group">
					                            <label class="control-label">Số điện thoại</label>
					                            <input type="email" class="form-control">
					                        </div>
					                    </div>
					                    <div class="col-sm-6">
					                        <div class="form-group">
					                            <label class="control-label">Trạng thái: </label>
					                            <br>
					                            <select class="selectpicker" data-width="100%">
					                                <option>Hoạt động</option>
					                                <option>Không hoạt động</option>
					                            </select>
					                        </div>
					                    </div>
					                    
					                    
					                </div>
					            </div>
					            <div class="panel-footer text-right">
					                <button class="btn btn-info" type="submit"><i class="fa fa-search"> Tìm kiếm</i>
					                </button>
					            </div>
					        </form>
					    </div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-5">
					<div class="panel">
						<!-- insert cate -->
						<form action="" method="get" accept-charset="utf-8">
							<div class="panel-heading">
								<h3 class="panel-title">Thêm mới ảnh slide</h3>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tiêu đề: </label>
									<div class="col-sm-8">
										<input type="text" placeholder="Tài khoản" class="form-control input-sm"
										id="demo-is-inputsmall">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Nội dùng: </label>
									<div class="col-sm-8">
										<input type="text" placeholder="Tài khoản" class="form-control input-sm"
										id="demo-is-inputsmall">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Loại: </label>
									<div class="col-sm-8 mar-btm">
										<select class="selectpicker" data-width="100%">
											<option>Nam</option>
											<option>Nữ</option>
											<option>Khác</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Ảnh: </label>
									<div class="col-sm-8">
										<input type="file" placeholder="Tài khoản" class="form-control input-sm"
										id="demo-is-inputsmall">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Trạng thái: </label>
									<div class="col-sm-8 text-left">
										<label class="form-radio form-normal active form-text"><input type="radio" checked="" name="def-w-label"> Hoạt động</label>
										<label class="form-radio form-normal active form-text"><input type="radio" name="def-w-label"> Không hoạt động</label>
									</div>
								</div>



								
							</div>
							<div class="modal-footer">
							    <button type="button" class="btn btn-primary">Cập nhật</button>
							</div>

						</form>
						<!-- end cate -->
					</div>
				</div>
				<!-- datatable -->
				<div class="col-sm-7">
					<div class="panel">
						<!--Data Table-->
						<!--===================================================-->
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th class="text-center">Invoice</th>
											<th>User</th>
											<th>Order date</th>
											<th>Amount</th>
											<th>Status</th>
											<th>Tracking Number</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a class="btn-link" href="#"> Order #53431</a></td>
											<td>Steve N. Horton</td>
											<td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 22, 2014</span></td>
											<td>$45.00</td>
											<td>
												<div class="label label-table label-success">Paid</div>
											</td>
											<td>-</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!--===================================================-->
						<!--End Data Table-->
					</div>
				</div>
				<!-- end datatable -->
			</div>	
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