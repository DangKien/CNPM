@extends('back.layouts.default')
@section ('title', 'Thư viện tài liệu')
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
			<div class="searchbox">
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" placeholder="Tìm kiếm..">
					<span class="input-group-btn">
						<button class="text-muted" type="button"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-5">
					<div class="panel">
						<!-- insert cate -->
						<form action="" method="get" accept-charset="utf-8">
							<div class="panel-heading">
								<h3 class="panel-title">Thêm mới loại tin</h3>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tên loại tin: </label>
									<div class="col-sm-8">
										<input type="text" placeholder="Tài khoản" class="form-control input-sm"
										id="demo-is-inputsmall">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Loại tin: </label>
									<div class="col-sm-8 mar-btm">
										<select class="selectpicker" data-width="100%">
											<option>--Giới thiệu--</option>
											<option>--- Cơ sở vật chất ---</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tag: </label>
									<div class="col-sm-8">
										<input type="text" placeholder="Tài khoản" class="form-control input-sm"
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
											<th>STT</th>
											<th> Tên loại tin</th>
											<th>Loại tin cha</th>
											<th>Tag</th>
											<th>Trạng thái</th>
											<th>Hành động</th>
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

	
</div>
@endsection