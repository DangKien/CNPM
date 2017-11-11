ngApp.directive('dishesModal', function ($apply) {
	var templateUrl = SiteUrl + '/modal/dishesModal';

	return {
		restrict: 'E',
		scope: "=",
		link: link,
		templateUrl: templateUrl,

	}

	var link = function (scope) {

	}
});