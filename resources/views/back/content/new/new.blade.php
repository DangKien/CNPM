@extends('back.layouts.default')
@section ('title', 'Loại tin')

@section ('myJs')
	<script src="{{ url('') }}/js/directives/modal/newModal.js"></script>
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
			<!-- tim kiem  -->
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
			<!-- het tim kiem -->
			<!-- tim nang cao -->
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
			<!-- het tim nang cao -->
			<div class="panel">
				<!--Data Table-->
				<!--===================================================-->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th class="text-center">Invoice</th>
									<th>Bài viết</th>
									<th>Ảnh minh họa</th>
									<th>Nội dung</th>
									<th>Lượng người xem</th>
									<th>Loại tin</th>
									<th>Người đăng tin</th>
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
		<!--===================================================-->
		<!--End page content-->
		<button 
	class="btn btn-primary btn-icon btn-circle icon-lg fa fa-plus pull-right"
	style="position: fixed; right: 15px; bottom: 20px; z-index: 500;"
	data-toggle="modal" data-target="#new"
	>
	</button>

	<new-modal> </new-modal>
</div>
@endsection