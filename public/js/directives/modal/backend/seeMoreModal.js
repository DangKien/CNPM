ngApp.directive('seeMoreModal', function ($apply, $newService) {
	var templateUrl = SiteUrl + '/modal/seeMoreModal';

	var link = function (scope) {
	}
	return {
		restrict: 'E',
		scope: {
			data: "=seeMoreNew",
		},
		link: link,
		templateUrl: templateUrl,

	}

	
});