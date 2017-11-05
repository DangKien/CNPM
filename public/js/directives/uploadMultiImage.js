ngApp.directive('uploadMultiImage', function () {

	var link = function (scope, element, attrs) {
		fileList = [];
		element.find('input').on('change', function (e) {

				var filesImage = e.target.files;
				$.each(filesImage, function(key, file) {
					fileList[key] = file;
					var reader = new FileReader();
					reader.onload = function (event) {
                        var image = '<div class="images-upload col-md-3 col-sm-4 col-xs-6">' +
                        			'<button class="reomve-image" data = "' + file.name + '" onclick="remove(this)"></button>' +
									'<img src="'+  event.target.result +'">' +
									'</div>';
						$('#images').append(image);
                    };
                    reader.readAsDataURL(file);
				});

			});
		scope.imagesUpload = fileList;
	}
	return {
		restrict: 'C',
		scope: {
			imagesUpload: '=ngModel',
		},
		link: link,
	}
})