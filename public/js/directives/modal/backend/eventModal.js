ngApp.directive('eventModal', function ($apply, $eventService) {
	var templateUrl = SiteUrl + '/modal/eventModal';

	var link = function (scope) {

		scope.paramsEvent = function () {
			var name      = scope.data.params.name;
			var beginDate = moment($('input[name="beginDate"]').val(), 'DD-MM-YYYY').format("YYYY-MM-DD");
			var endDate   = moment($('input[name="endDate"]').val(), 'DD-MM-YYYY').format("YYYY-MM-DD");
			var content   = scope.data.params.content;
			var params    = $eventService.data(name, beginDate, endDate, content);
			return params;
		},

		scope.actions = {
			insertEvent: function () {
				var params = scope.paramsEvent();
				$eventService.action.insertEvent(params).then( function (resp) {
					if (resp) {
						scope.onSave({data : true});
					}
				}, function (error) {
					scope.onSave({data : error.data});
				});

			},

			updateEvent: function (idEvent) {
				var params = scope.paramsEvent();
				$eventService.action.updateEvent(idEvent, params).then( function (resp) {
					if (resp) {
						scope.onSave({data : true});
					}
				}, function (error) {
					scope.onSave({data : error.data});
				});
			},

			save: function () {
				if (scope.data.idEvent) {
					scope.actions.updateEvent(scope.data.idEvent);
				} else {
					scope.actions.insertEvent();
				}
			}

		}
	}

	return {
		restrict: 'E',
		scope: {
			'data' : "=data",
			'eventForm' : "=formValidate",
			'eventModal' : "=eventChosseModal",
			'onSave' : '&saveEvent'
		},
		link: link,
		templateUrl: templateUrl,
	}

	
});