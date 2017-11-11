ngApp.directive('fileModel', function () {
	var link = function(scope, element, attrs, ngModel) {
       $(element).change(function () {
       		file =  element[0].files[0];
       		ngModel.$setViewValue(file);
        });
    }
    return {
       restrict: 'C',
       link: link,
       require: 'ngModel',
    };
});