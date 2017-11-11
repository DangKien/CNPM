ngApp.directive('slideModal', function ($apply, $slideService) {
	var templateUrl = SiteUrl + '/modal/slideModal';

	var link = function (scope) {
		scope.actions = {
			paramsSlide: function () {
				var title = scope.data.params.title;
				var content = scope.data.params.content;
				var image = $('input[name*="fileSlide"]')[0].files[0];
				var status = scope.data.params.status;
				var params = $slideService.data(title, content, image, status);

				return params;
			},
			insertSlide: function () {
				var params = scope.actions.paramsSlide();
				$slideService.action.insertSlide(params).then (function (resp) {
					scope.onSave({data: true});
				}, function (error) {
					scope.onSave({data: error.data});
				});
			},

			updateSlide: function (idSlide) {
				var params = scope.actions.paramsSlide();
				$slideService.action.updateSlide(idSlide, params).then (function (resp) {
					scope.onSave({data: true});
				}, function (error) {
					scope.onSave({data: error.data});
				});
			},

			save: function () {
				if (scope.data.idSlide) {
					scope.actions.updateSlide(scope.data.idSlide);
				} else {
					scope.actions.insertSlide();
				}
			},
		}
	}
	return {
		restrict: 'E',
		scope: {
			data: "=data",
			onSave: "&saveSlide",
		},
		link: link,
		templateUrl: templateUrl,

	}

	
});