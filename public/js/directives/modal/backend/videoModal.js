ngApp.directive('videoModal', function($apply, $videoService){
	templateUrl = SiteUrl + '/modal/uploadVideoModal';

	var link = function (scope) {

		scope.videoPrams = function () {
			var title   = scope.data.params.title;
			var content = scope.data.params.content;
			var image   = scope.data.params.image;
			var video   = scope.data.params.video;

			var params  = $videoService.data(title, content, image, video);
			return params;
		};

		scope.actions = {

			insertVideo : function () {
				var params = scope.videoPrams();
				$videoService.action.insertVideo(params).then( function (resp) {
					if (resp) {
						scope.onSave({data : true});
					}
				}, function (error) {
					scope.onSave({data : error.data});
				});
			},

			// updateAlbum: function (idAlbum) {
			// 	var params = scope.dataParams();
			// 	$albumService.action.updateAlbum(idAlbum, params).then( function (resp) {
			// 			if (resp) {
			// 			scope.onSave({data : true});
			// 			}
			// 		}, function (error) {
			// 			scope.onSave({data : error.data});
			// 		});
			// },

			saveVideo: function () {
				scope.actions.insertVideo();	
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
			onSave: '&videoSave'
		},
		restrict: 'E',
		templateUrl: templateUrl,
		link:link,
	};
});