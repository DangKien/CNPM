ngApp.directive('myRepeatDirective', function() {
  return function(scope, element, attrs) {
    if (scope.$last){
        var maxh = 0;
        $('.oum-fix-panel').each(function() {
           h = $(this).height();
           if (h >= maxh){
            maxh = h;
           }
        });
        $('.oum-fix-panel').height(maxh);
    }
  };
});
