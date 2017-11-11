ngApp.directive('newModal', function ($apply, $newService) {
	var templateUrl = SiteUrl + '/modal/newModal';

	var link = function (scope) {
		scope.actions = {
			paramsNew: function () {
				var title   = scope.data.params.title;
				var cate    = $('#newCateModal').val();
				var tag     = scope.data.params.tag;
				var image   = $('input[name*="fileImg"]')[0].files[0];
				var content = scope.data.params.content;
				var params  = $newService.data(title, cate, tag, image, content);
				return params;
			},
			insertNew: function () {

				var params  = scope.actions.paramsNew();
				$newService.action.insertNew(params).then(function (resp) {
					if (resp.data){
						scope.onSave({data: true});
					}
				}, function (error) {
					scope.onSave({data: error.data})
				});
			},
			updateNew: function (idNew) {
				var params = scope.actions.paramsNew();
				$newService.action.updateNew(idNew, params).then(function (resp) {
					if (resp.data){
						scope.onSave({data: true});
					}
				}, function (error) {
					scope.onSave({data: error.data});
				});
			},
			saveNew: function () {
				if (!scope.data.idNew){
					if ($(scope.newForm).parsley().validate()) {
						scope.actions.insertNew();
					}
				} else {
					if ($(scope.newForm).parsley().validate()) {
						scope.actions.updateNew(scope.data.idNew);
					}
					
				}
				
			},
		}
	}
	return {
		restrict: 'E',
		scope: {
			data: "=data",
			onSave: "&saveNew",
			newForm: "=domNewForm",
			newModal: "=domNewModal",
		},
		link: link,
		templateUrl: templateUrl,

	}

	
});