ngApp.directive('eventModal', function ($apply, $eventService) {
	var templateUrl = SiteUrl + '/modal/frontend/eventModal';

	var link = function (scope) {
		scope.event  = {};
		scope.action = {
			oneEvent: function (idEvent) {
				$eventService.action.oneEvent(idEvent).then(function (resp) {
				  scope.event = resp.data;
				  console.log(scope.event)
				}).catch(function (err) {

				}); 
			}

		}
		scope.$watch('idEvent', function(newValue, oldValue, scope) {
			scope.action.oneEvent(newValue);
		});
		
	}
	return {
		restrict: 'E',
		scope: {
			idEvent: "=idEvent",
			eventModal: "=eventModal"
		},
		link: link,
		templateUrl: templateUrl,

	}

	
});