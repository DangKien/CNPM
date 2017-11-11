<div class="modal fade" id="cate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-enter="actions.saveCate()">
	<div class="modal-dialog" role="document">
		<form id="form-cate" method="get" accept-charset="utf-8">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">@{{ data.title }}</h5>
				</div>
				<div class="modal-body">
					<!-- insert cate -->
					<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-3 control-label fix-form-cate" for="demo-is-inputsmall">Tên loại tin: </label>
								<div class="col-sm-8">
									<input required type="text" placeholder="Tên loại tin" class="form-control input-sm"
									id="demo-is-inputsmall" ng-model = "data.params.name">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label fix-form-cate" for="demo-is-inputsmall">Loại tin cha: </label>
								<div class="col-sm-8">
									<select id = "idCate" class="form-control">
										<option ng-selected="data.params.cate_id == '0'" value="0">Loại tin cha </option>
										<option ng-repeat="(key, cate) in data.nameCate" 
												ng-selected="(cate.id == data.params.cate_id)"
												value="@{{ cate.id }}">@{{ cate.name }}
										</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label fix-form-cate" for="demo-is-inputsmall">Tag: </label>
								<div class="col-sm-8">
									<input type="text" placeholder="Tag: tag1, tag2,..." class="form-control input-sm"
									id="demo-is-inputsmall" ng-model = "data.params.tag">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label" for="demo-is-inputsmall">Trạng thái: </label>
								<div class="col-sm-8 text-left padding-top-7">
									<label style="margin-bottom: 10px;" class="form-normal">
										<input ng-model = "data.params.status" value="1" type="radio" ng-checked="data.params.status == '1' "> Hoạt động</label>
									<label class="form-normal">
										<input ng-checked="data.params.status == '2'" ng-model = "data.params.status " value="2" type="radio" > Không hoạt động</label>
								</div>
								
							</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="actions.saveCate()">Cập nhật</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</form>
	</div>
</div>