ngApp.directive('myCkeditor', function($apply) {
    return {
        restrict: 'C',
        link: function(scope, element, attrs) {
            $apply(function () {
                 CKEDITOR.replace( 'content', 
                 {
                    language: 'vi',
                    filebrowserImageBrowseUrl: SiteUrl + '/js/plugin/ckfinder/ckfinder.html?type=Images',     
                    filebrowserFlashBrowseUrl: SiteUrl + '/js/plugin/ckfinder/ckfinder.html?type=Flash', 
                    filebrowserImageUploadUrl: SiteUrl + '/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',                
                    filebrowserFlashUploadUrl: SiteUrl + '/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                 } );
            });
        }
    };
});