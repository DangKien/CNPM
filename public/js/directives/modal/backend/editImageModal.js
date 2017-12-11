ngApp.directive('editImageModal', function($apply, $imageService){
	templateUrl = SiteUrl + '/modal/editImageModal';

	var link = function (scope) {

		scope.dataParams = function () {
			var name   = scope.data.paramsEditImage.title;
			var params = $imageService.editImageData(name);
			return params;
		};

		scope.actions = {
			updateImage: function (idImage) {
				var params = scope.dataParams();
				$imageService.action.updateImage(idImage, params).then( function (resp) {
						if (resp) {
						scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},
			saveImage: function () {
				if ($(scope.editImageForm).parsley().validate())
				{
					if (scope.data.idEditImage) {
						scope.actions.updateImage(scope.data.idEditImage);
					}
					
				}
			}
		}


	}
	return {
		name: '',
		scope: {
			data: '=data',
			onSave: '&imageSave',
			editImageModal: "=domEditImageModal",
			editImageForm: "=domEditImageForm",
		},
		restrict: 'E',
		templateUrl: templateUrl,
		link:link,
	};
});