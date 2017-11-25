<div class="modal fade" ng-dom="eventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-enter="actions.saveCate()">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center" id="myModalLabel">@{{ event.name }}</h5>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label" for="demo-is-inputsmall">Sự kiện vào ngày: </label>
						<div class="col-sm-8">
							<div class="text-danger" style="padding-top: 5px;">
							   	@{{ event.begin_date | formatDate }}
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="demo-is-inputsmall">Sự kiện kết thúc: </label>
						<div class="col-sm-8">
							<div class="text-danger" style="padding-top: 5px;">
							   	@{{ event.end_date | formatDate }}
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for="demo-is-inputsmall">Nội dung sự kiện: </label>
						<div class="col-sm-8">
							<div class="text-danger" style="padding-top: 5px;">
							   	@{{ event.content }}
							</div>
						</div>
						</div>					
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>