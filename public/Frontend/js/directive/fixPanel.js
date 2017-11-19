ngApp.directive('fixPanel', function($apply) {
    return {
        restrict: 'C',
        link: function(scope, element, attrs) {
            var maxh = 0;
            $('.fix-panel').each(function() {
               h = $(this).height();
               if (h >= maxh){
                maxh = h;
               }
            });
            $('.fix-panel').height(maxh);
            var maxxh = 0;
            $('.lq').each(function() {
                h1 = $(this).height();
                if (h1 >= maxxh){
                    maxxh = h1;
               }
            });
            $('.lq').height(maxxh);

        }
    };
});

    