ngApp.directive('albumModal', function($apply, $albumService){
	templateUrl = SiteUrl + '/modal/albumModal';

	var link = function (scope) {

		scope.dataParams = function () {
			var name   = scope.data.params.name;
			var image   = $('#image-album')[0].files[0];
			var params = $albumService.data(name, image);
			return params;
		};

		scope.actions = {

			insertAlbum : function () {
				var params = scope.dataParams();
				$albumService.action.insertAlbum(params).then( function (resp) {
						if (resp) {
							scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},

			updateAlbum: function (idAlbum) {
				var params = scope.dataParams();
				$albumService.action.updateAlbum(idAlbum, params).then( function (resp) {
						if (resp) {
						scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},

			saveAlbum: function () {
				
				if (!scope.data.idAlbum) {
					if ($('#album-form').parsley().validate())
					{
						scope.actions.insertAlbum();
					}
					
				}else {
					if ($('#form-cate').parsley().validate())
					{
						scope.actions.updateAlbum(scope.data.idAlbum);
					}
				}
			}
		}


	}
	return {
		name: '',
		scope: {
			data: '=data',
			onSave: '&albumSave'
		},
		restrict: 'E',
		templateUrl: templateUrl,
		link:link,
	};
});