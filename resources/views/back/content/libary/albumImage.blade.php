@extends('back.layouts.default')
@section ('title', 'Thư viện')
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
				<div class="col-md-5 col-sm-5 pull-right search-nc">
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
			<div class="row pad-top mar-top">
			    <div class="col-md-12">
				   <div id="blueimp-gallery" class="blueimp-gallery">
	                    <!-- The container for the modal slides -->
	                    <div class="slides"></div>
	                    <!-- Controls for the borderless lightbox -->
	                    <h3 class="title"></h3>
	                    <a class="prev">‹</a>
	                    <a class="next">›</a>
	                    <a class="close">×</a>
	                    <a class="play-pause"></a>
	                    <ol class="indicator"></ol>
	                    <!-- The modal dialog, which will be used to wrap the lightbox content -->
	                    
	                </div>
	                <!-- Anh image slide ng-reapet -->
	                <div id="links">
	                    <div class="col-md-3 ">
	                    	<a href="http://cnpm.com/public/Nifty/img/123.jpg"
	                    	   title="anh 2" data-gallery>
	                    	       <div class="thumbnail fix-thumbnail">
	                    	   	    <img class="img-responsive" 
	                    	         src="http://cnpm.com/public/Nifty/img/123.jpg"
	                    	         alt="Apple">
	                    	       </div>
	                    	    
	                    	</a>
	                    </div>

	                    <div class="col-md-3">
	                    	<a href="http://cnpm.com/public/Nifty/img/123.jpg"
	                    	   title="anh 1" data-gallery>
	                    	       <div class="thumbnail fix-thumbnail">
	                    	   	    <img class="img-responsive" 
	                    	         src="http://cnpm.com/public/Nifty/img/123.jpg"
	                    	         alt="Apple">
	                    	       </div>
	                    	    
	                    	</a>
	                    </div>
	                </div>
			    </div>
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