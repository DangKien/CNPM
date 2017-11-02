ngApp.controller('ImageCtrl', function ($apply, $albumService, $scope, changStatus, $conf, $routeParams) {
	$scope.data = {
		listAlbum: {},
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

		// Danh sach loai tin
		listAlbum: function () {
			$albumService.action.listAlbum().then(function (resp) {
				$scope.data.listAlbum = resp.data.data;
			}, function (error) {
				console.log(error);
			});
		},

		showModal: function () {
			$('#album').modal('show');
			$scope.data.title = "Cập nhật album";
			$albumService.action.editAlbum($scope.data.idAlbum).then(function (resp) {
				$scope.data.params = resp.data;
				$('.avatar').attr('src', SiteUrl + '/storage/images/album/' + $scope.data.params.image);
				console.log($scope.data.params);
			}, function (error) {
			});

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