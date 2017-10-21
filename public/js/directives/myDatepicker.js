ngApp.directive('myDatepicker', function($apply) {
    return {
        restrict: 'C',
        link: function(scope, element, attrs) {
            $apply(function () {
                $('#sandbox-container input').datepicker({
                    language: "vi",
                    format: 'dd-mm-yyyy'
                });
            });
        }
    };
});