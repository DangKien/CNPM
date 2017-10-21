ngApp.directive('newModal', function ($apply) {
	var templateUrl = SiteUrl + '/modal/newModal';

	return {
		restrict: 'E',
		scope: "=",
		link: link,
		templateUrl: templateUrl,

	}

	var link = function (scope) {

	}
});