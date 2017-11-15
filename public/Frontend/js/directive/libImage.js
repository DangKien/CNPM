ngApp.directive('libImage', function($apply) {
  return function(scope, element, attrs) {
    if (scope.$last){
        $apply(function () {
        	$("#lightSlider").lightSlider({
        		autoWidth: true,
        		responsive : [],
        }); 
        });
    }
  };
});
