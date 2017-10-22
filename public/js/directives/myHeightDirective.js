ngApp.directive('myRepeatDirective', function() {
  return function(scope, element, attrs) {
    if (scope.$last){
        var maxh = 0;
        $('.fix-pad-all').each(function() {
           h = $(this).height();
           if (h >= maxh){
            maxh = h;
           }
        });
        $('.fix-pad-all').height(maxh);
    }
  };
});
