ngApp.directive('fileModal', function($apply, $fileService){
	templateUrl = SiteUrl + '/modal/uploadFileModal';

	var link = function (scope) {
		scope.dataParams = function () {
			var title   = scope.data.params.title;
			var image  = $('input[name*="image-title"]')[0].files[0];
			var file   = $('input[name*="file"]')[0].files[0];
			console.log(image);
			console.log(file);
			var params = $fileService.data (title, image, file);

			return params;
		};

		scope.actions = {

			insertFile : function () {
				var params = scope.dataParams();
				$fileService.action.insertFile(params).then( function (resp) {
						if (resp) {
							scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},

			updateFile: function (idAlbum) {
				var params = scope.dataParams();
				$fileService.action.updateFile(idAlbum, params).then( function (resp) {
						if (resp) {
						scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},

			saveFile: function () {
				if (!scope.data.idFile) {
					if ($(scope.fileForm).parsley().validate()) {
						scope.actions.insertFile();
					}
				}else {
					if ($(scope.fileForm).parsley().validate()) {
						scope.actions.updateFile(scope.data.idFile);
					}
				}
			}
		}


	}
	return {
		name: '',
		scope: {
			data: '=data',
			onSave: '&fileSave',
			fileForm: '=domFileForm',
			fileModal: '=domFileModal',
		},
		restrict: 'E',
		templateUrl: templateUrl,
		link:link,
	};
});