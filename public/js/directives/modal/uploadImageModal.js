ngApp.directive('uploadImageModal', function ($apply) {
	var templateUrl = SiteUrl + '/modal/uploadImageModal';

	var link = function (scope) {
		scope.actions = {
			save: function () {
				console.log(scope.data);
			}
		}

	}

	return {
		restrict: 'E',
		scope: {
		},
		link: link,
		templateUrl: templateUrl,
	}

	
});