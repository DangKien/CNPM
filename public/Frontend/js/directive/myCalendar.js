ngApp.directive('myCalendar', function ($apply, $myLoader, $timeout) {
    var link = function (scope, elm, attrs) {
        scope.initCalendar = function (config) {
            $apply(function () {
                $(elm).fullCalendar(config);
            });
        };
        scope.$watchCollection('config', function (newVal, oldVal) {
            $myLoader.show();
            $timeout(function() {
                $apply(function () {
                    scope.initCalendar(newVal);
                    $myLoader.hide();
                });
            }, 1000);
            
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