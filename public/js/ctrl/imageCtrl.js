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
		errors: {
			album: {},
			upload:{}
		},

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
				console.log($scope.data.params);
				$('.avatar').attr('src', SiteUrl + '/storage/images/album/title_images/' + $scope.data.params.images[0].url_image);
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
				$scope.data.errors.album = data.errors;
			}
		},

		removeImage: function (idImage) {
			$conf.confirmDelete ('small', 'Bạn muốn xóa ảnh này?', function (respon) {
				if (respon == true){
					$imageService.action.deleteImage(idImage).then(function (resp){
						if (resp.data.status == true) {
							$conf.confirmNotifi('success', 'Xóa ảnh thành công!!!');
							$scope.actions.listAlbum();
						}
					}, function (error) {
						$conf.confirmNotifi('error', 'Xóa ảnh thất bại!!!', "fa fa-ban");
					});
				}
			});

			
		},

		saveModalUploadImg: function (data) {
			if (data == true) {
				$conf.confirmNotifi('success', 'Cập nhật ảnh thành công!!!');
				$('#album').modal('hide');
				$scope.actions.listAlbum();
				$('#uploadImage').modal('hide');
			} else {
				$scope.data.errors.upload = data.errors;
			}
		}


	};

	$scope.actions.listAlbum();
});