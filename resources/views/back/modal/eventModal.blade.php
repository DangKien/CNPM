<div class="modal fade" ng-dom="eventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" style="min-height: 100px;" role="document" ng-enter="actions.save()">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">@{{ data.title }}</h5>
			</div>
			<div class="modal-body">
				<div class="panel panel-primary">
					<form class="form-horizontal" ng-dom="eventForm">
						<div class="panel-body">

							<div class="form-group">
								<label class="col-sm-3 control-label" for="demo-is-inputsmall"></label>
								<div class="col-sm-8">
									<div class="text-danger" style="margin-top: 5px;">
									    @{{ data.errors.messages }}
									</div>
								</div>
							</div>
								
							<div class="form-group">
								<label class="col-sm-3 control-label" for="demo-is-inputsmall">Tên sự kiện: </label>
								<div class="col-sm-8">
									<input required type="text" ng-model="data.params.name" placeholder="Tên sự kiện" class="form-control input-sm" id="demo-is-inputsmall">
									<p class="text-danger" style="margin-top: 5px;"
										ng-repeat="er in data.errors.errors.name"
									>
									    @{{ er }}
									</p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label" for="demo-is-inputsmall">Ngày bắt đầu: </label>
								<div class="col-sm-8 input-group date my-datepicker" id="sandbox-container">
									<input my-formatdate="dd-MM-yyyy" required ng-model="data.params.begin_date" name="beginDate" type="text" class="form-control " placeholder="Ngày-Tháng-Năm">
									<p class="text-danger" style="margin-top: 5px;"
										ng-repeat="er in data.errors.errors.beginDate"
									>
									    @{{ er }}
									</p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label" for="demo-is-inputsmall">Ngày kết thúc: </label>
								<div class="col-sm-8 input-group date my-datepicker" id="sandbox-container">
									<input my-formatdate="dd-MM-yyyy" required ng-model="data.params.end_date" name="endDate" type="text" class="form-control " placeholder="Ngày-Tháng-Năm">
									<p class="text-danger" style="margin-top: 5px;"
										ng-repeat="er in data.errors.errors.endDate"
									>
									    @{{ er }}
									</p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label" for="demo-is-inputsmall">Nội dung: </label>
								<div class="col-sm-8">
									<textarea class="form-control" rows="5" ng-model="data.params.content"></textarea>
									<p class="text-danger" style="margin-top: 5px;"
										ng-repeat="er in data.errors.errors.content"
									>
									    @{{ er }}
									</p>
								</div>
							</div>

						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" ng-click="actions.save()">Cập nhật</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>