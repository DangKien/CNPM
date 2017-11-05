ngApp.controller('ImageCtrl', function ($apply, $albumService, $imageService, $scope, changStatus, $conf, $routeParams) {
	$scope.data = {
		listAlbum: {},
		listImage:{},
		params: {},
		filter: {},
		title: "",
		idAlbum: '',
		pageAlbum: {},
		allListAlbum:{},
	};

	$scope.data.idAlbum = $routeParams.id;
	$scope.actions = {

		changePage: function (page) {
			$scope.data.pageAlbum.current_page = page;
			$scope.actions.listAlbum();
		},
		filterParams: function () {
			var idAlbum = $scope.data.idAlbum;
			var params = $imageService.filter(idAlbum);
			return params;
		},
		// Danh sach loai tin
		listAlbum: function () {
			var params = $scope.actions.filterParams();
			$imageService.action.listImage(params).then(function (resp) {
				$scope.data.listImage = resp.data.data;
			}, function (error) {
				console.log(error);
			});
		},

		showModalAlbum: function () {
			$('#album').modal('show');
			$scope.data.title = "Cập nhật album";
			$albumService.action.editAlbum($scope.data.idAlbum).then(function (resp) {
				$scope.data.params = resp.data;
				$('.avatar').attr('src', SiteUrl + '/storage/images/album/title_albums/' + $scope.data.params.image);
			}, function (error) {
			});

		},
		showModalUpload: function () {
			$('#uploadImage').modal('show');
		},

		saveModalAlbum: function (data) {
			if (data == true) {
				$conf.confirmNotifi('success', 'Cập nhật album thành công!!!');
				$('#album').modal('hide');
				$scope.actions.listAlbum();
			} else {
				$scope.data.errors = data.errors;
			}
		}


	};

	$scope.actions.listAlbum();
});