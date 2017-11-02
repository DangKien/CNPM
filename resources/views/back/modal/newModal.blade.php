<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-enter="actions.saveNew()">
		<div class="modal-dialog modal-lg"" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">@{{ data.title }}</h5>
				</div>
				<div class="modal-body">
					<div class="panel panel-primary">
						<div class="panel-body">
							<form class="form-horizontal" id="form-new">
								<div class="form-group">
									<label class="control-label" for="demo-is-inputsmall">Tiêu đề: </label>
									<div class="">
										<input required type="text" placeholder="Tiêu đề" class="form-control input-sm"
										id="demo-is-inputsmall" ng-model="data.params.title">
									</div>
								</div>

								 <div class="form-group">
		                            <label class="control-label">Loại tin: </label>
		                            <select id="newCateModal" class="form-control" data-width="100%">
		                                <option ng-repeat="(key, cate) in data.nameCate" ng-selected="(data.params.cate == cate.id)" value="@{{ cate.id }}"> @{{ cate.name }} </option>
		                            </select>
		                        </div>

								<div class="form-group">
									<label class="control-label" for="demo-is-inputsmall">Tag: </label>
									<div class="">
										<input required type="text" placeholder="tag1, tag2, tag3,.." class="form-control input-sm"
										id="demo-is-inputsmall" ng-model="data.params.tag">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label" for="demo-is-inputsmall">Ảnh minh họa: </label>
									<div class="">
										<input required name="fileImg" type="file" placeholder="Tên người dùng" class="form-control input-sm image-support"
										id="demo-is-inputsmall">
										<img class="image-support img-responsive" src="{{ url('Nifty') }}/img/av6.png" alt="" style="width: 140px; height: 150px;">
									</div>
								</div>

								<div class="form-group">
									<label required class="control-label" for="demo-is-inputsmall">Nội dung: </label>
									<div class="">
										<textarea ng-model="data.params.content" class="my-ckeditor" name="content"></textarea>
									</div>
								</div>
								
							</form>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="actions.saveNew()">Cập nhật</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>