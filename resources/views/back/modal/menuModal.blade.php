<div class="modal fade" ng-dom="menuModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel"> @{{ data.title }} </h5>
				</div>
				<div class="modal-body">
					<div class="panel panel-primary">
						<div class="panel-body">
							<form class="form-horizontal" ng-dom="menuForm">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall"></label>
									<div class="col-sm-8">
										<div class="text-danger" style="margin-top: 5px;">
										    @{{ data.errors.messages }}
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tuần học: </label>
									<div class="col-sm-8">
										<select class="form-control" ng-model="data.params.week">
											<option ng-repeat="(key, week) in data.weeks" value="@{{week.value }}" ng-selected="data.params.week == week.value">
												@{{ week.name }} 
											</option>
										</select>
										<p class="text-danger" style="margin-top: 5px;"
											ng-repeat="er in data.errors.week"
										>
										    @{{ er }}
										</p>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tháng học: </label>
									<div class="col-sm-8">
										<select class="form-control" ng-model="data.params.month">
											<option ng-repeat="(key, month) in data.months" value="@{{month.value }}" ng-selected="data.params.month == month.value">
												@{{ month.name }} 
											</option>
										</select>
										<p class="text-danger" style="margin-top: 5px;"
											ng-repeat="er in data.errors.month"
										>
										    @{{ er }}
										</p>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Năm học: </label>
									<div class="col-sm-8">
										<input type="text" ng-model="data.params.year" placeholder="Năm học" class="form-control input-sm"
										id="demo-is-inputsmall" required>
										<p class="text-danger" style="margin-top: 5px;"
											ng-repeat="er in data.errors.year"
										>
										    @{{ er }}
										</p>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Loại: </label>
									<div class="col-sm-8">
										<select class="form-control" ng-model="data.params.cateId">
											<option ng-repeat="(key, cateMenu) in data.listCateMenu" ng-value="cateMenu.id" ng-selected="(cateMenu.id == data.params.cateId )">
												@{{ cateMenu.name }}
											</option>
										</select>
										<p class="text-danger" style="margin-top: 5px;"
											ng-repeat="er in data.errors.name"
										>
										    @{{ er }}
										</p>
									</div>
								</div>

								<div class="form-group">
									<label for="demo-vs-definput" class="control-label col-sm-3">Ảnh đại diện: </label>
									<div class="col-md-8">
										<input id="image-album" ng-model="data.params.image" accept= "image/*" class="image-support file-model" type="file" >
										<br>
										<p class="text-danger" ng-repeat="(key, err) in data.errors.imageAlbum">
											@{{ err }}
										</p>
										<img class="avatar" src="{{ url('Nifty') }}/img/av6.png" alt="" style="width: 140px; height: 150px;">
										<br>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="actions.saveMenu()">Cập nhật</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>