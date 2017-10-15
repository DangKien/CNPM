ngApp.directive('mySelectpicker', function($apply) {
    return {
        restrict: 'C',
        link: function(scope, element, attrs) {
            $apply(function () {
                $(element[0]).selectpicker();
            });
        }
    };
});


