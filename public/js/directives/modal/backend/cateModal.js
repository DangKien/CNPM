ngApp.directive('cateModal', function($apply, $cateService){
	templateUrl = SiteUrl + '/modal/cateModal';
	var link = function (scope) {

		scope.dataParams = function () {
			var name   = scope.data.params.name;
			var status = scope.data.params.status;
			var cateId = $('#idCate').val();
			var tag = scope.data.params.tag;
			var params = $cateService.data(name, status, cateId, tag);
			return params;
		};

		scope.actions = {

			insertCate : function () {
				var params = scope.dataParams();
				$cateService.action.insertCate(params).then( function (resp) {
						if (resp) {
							scope.onSave({data : true, conf:"insert"});
						}
					}, function (error) {
						scope.onSave({data : error.data, conf:"insert"});
					});
			},

			updateCate: function (idCate) {
				var params = scope.dataParams();
				$cateService.action.updateCate(idCate, params).then( function (resp) {
						if (resp) {
							scope.onSave({data : true, conf:"update"});
						}
					}, function (error) {
						scope.onSave({data : error.data, conf:"update"});
					});
			},

			saveCate: function () {
				if (!scope.data.idCate) {
					if ($('#form-cate').parsley().validate())
					{
						scope.actions.insertCate();
					}
					
				}else {
					if ($('#form-cate').parsley().validate())
					{
						scope.actions.updateCate(scope.data.idCate);
					}
					
				}
			}
		}


	}
	return {
		name: '',
		scope: {
			data: "=cateData",
			onSave: "&cateSave",
		},
		restrict: 'E',
		templateUrl: templateUrl,
		link:link,
	};
});