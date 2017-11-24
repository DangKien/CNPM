ngApp.directive('myCalendar', function ($apply) {
    var link = function (scope, elm, attrs) {
        scope.domCalendar;
        scope.initCalendar = function (config) {
            $apply(function () {
                scope.calendar = $(scope.domCalendar).fullCalendar(config);
            });
        };

        scope.$watchCollection('config', function (newVal, oldVal) {
            $apply(function () {
                scope.initCalendar(newVal);
            });
        });
    };

    return {
        restrict: 'E',
        scope: {
            config: '=',
            calendar: '='
        },
        link: link,
        template: '<div ng-dom="domCalendar"></div>'
    }
})