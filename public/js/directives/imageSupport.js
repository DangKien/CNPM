ngApp.directive('imageSupport', function () {
	var link = function(scope, element, attrs) {
        $(element).change(function () {
                 console.log(element[0].files[0]);
                    if (element[0].files && element[0].files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                           element.parent().find('img').attr('src', e.target.result);
                         //element.parent().find('.image-support').attr('src', e.target.result)
;
                        };
                     reader.readAsDataURL(element[0].files[0]);
                }
            });
    }
    return {
       restrict: 'C',
       link: link,
    };
});