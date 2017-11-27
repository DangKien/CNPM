ngApp.directive('myCalendar', function ($apply, $myLoader) {
    var link = function (scope, elm, attrs) {
        scope.initCalendar = function (config) {
            $apply(function () {
                $(elm).fullCalendar(config);
            });
        };
        scope.$watchCollection('config', function (newVal, oldVal) {
            $apply(function () {
                scope.initCalendar(newVal);
            });
        });
    };

    return {
        restrict: 'C',
        scope: {
            config: '=',
        },
        link: link,
    }
})