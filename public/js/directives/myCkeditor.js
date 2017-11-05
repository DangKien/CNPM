ngApp.directive('myCkeditor', function($apply) {
    return {
        restrict: 'C',
        require: '?ngModel',
        link: function(scope, element, attrs, ngModel) {
            var ck = CKEDITOR.replace(element[0], {
                language: 'vi',
                filebrowserImageBrowseUrl: SiteUrl + '/js/plugin/ckfinder/ckfinder.html?type=Images',     
                filebrowserFlashBrowseUrl: SiteUrl + '/js/plugin/ckfinder/ckfinder.html?type=Flash', 
                filebrowserImageUploadUrl: SiteUrl + '/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',                
                filebrowserFlashUploadUrl: SiteUrl + '/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            }); 
            if (!ngModel) return;
            ck.on('instanceReady', function () {
                ck.setData(ngModel.$viewValue);
            });
            function updateModel() {
                scope.$apply(function () {
                ngModel.$setViewValue(ck.getData());
                });
            }
            ck.on('change', updateModel);
            ck.on('key', updateModel);
            ck.on('dataReady', updateModel);

            ngModel.$render = function (value) {
                ck.setData(ngModel.$viewValue);
            };
        }
    }
});

ngApp.filter('ellipsis', function () {
    return function (text, length) {
        if (text.length > length) {
            return text.substr(0, length) + '<a class="sda" href=""> See More...</a>';
        }
        return text;
    }
});