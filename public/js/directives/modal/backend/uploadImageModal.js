ngApp.directive('uploadImageModal', function ($apply, $imageService) {
	var templateUrl = SiteUrl + '/modal/uploadImageModal';

	var link = function (scope) {
		scope.actions = {
			paramsUploadImg: function (){
				var idAlbum = scope.idAlbum;
				var images  = scope.data.images;
				var params = $imageService.data(idAlbum, images);
				console.log(images);
				return params;
			},

			insertUploadImg: function (){
				var params = scope.actions.paramsUploadImg();
				$imageService.action.insertImage(params).then(function (resp) {
					if (resp.data.status == true) {
						scope.onSave({data: true});
					}
				}, function (error) {
					scope.onSave({data: error.data});
				});
			},

			saveUploadImg: function () {
				scope.actions.insertUploadImg();
			}
		}

	}

	return {
		restrict: 'E',
		scope: {
			idAlbum: "=idAlbumImage",
			onSave: "&uploadSave",
			data: "=data",
			imageModal: "=domImageModal",
			imageForm: "=domImageForm"
		},
		link: link,
		templateUrl: templateUrl,
	}

	
});