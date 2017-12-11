ngApp.controller('ImageCtrl', function ($apply, $albumService, $imageService, $scope, changStatus, $conf, $routeParams) {
	$scope.domAlbumModal;
	$scope.domAlbumForm;
	$scope.domImageModal;
	$scope.domImageForm;
	$scope.domEditImageModal;
	$scope.domEditImageForm;
	$scope.data = {
		listAlbum: {},
		listImage:{},
		paramsEditImage: {},
		params: {},
		filter: {},
		title: "",
		idAlbum: '',
		pageImage: {},
		idEditImage: {},
		allListAlbum:{},
		errors: {
			album: {},
			upload:{}
		},
		errorsEditImage: {},
	};

	$scope.data.idAlbum = $routeParams.id;
	$scope.actions = {

		changePage: function (page) {
			$scope.data.pageImage.current_page = page;
			$scope.actions.listAlbum();
		},
		// Danh sach loai tin
		listAlbum: function () {

			var params = $imageService.filter($scope.data.idAlbum, $scope.data.pageImage.current_page, 16);
			$imageService.action.listImage(params).then(function (resp) {
				$scope.data.listImage = resp.data.data;
				$scope.data.pageImage = resp.data;
			}, function (error) {
				console.log(error);
			});
		},

		showModalAlbum: function () {
			$($scope.domAlbumModal).modal('show');
			$scope.data.errors = {};
			$($scope.domAlbumForm).parsley().reset();
			$scope.data.title = "Cập nhật album";
			$albumService.action.editAlbum($scope.data.idAlbum).then(function (resp) {
				$scope.data.params = resp.data;
				$('.avatar').attr('src', SiteUrl + '/storage/images/album/title_images/' + $scope.data.params.images[0].url_image);
			}, function (error) {
			});

		},
		showModalUpload: function () {
			$scope.data.errors.upload = {};
			$($scope.domImageModal).modal('show');
		},

		showEditImageModal: function (idEditImage) {
			$($scope.domEditImageForm).parsley().reset();
			$scope.data.idEditImage = idEditImage;
			$scope.data.errorsEditImage = {};
			$imageService.action.editImage(idEditImage).then(function (resp) {
				$scope.data.paramsEditImage = resp.data;
				console.log($scope.data.paramsEditImage);
			}, function (error) {
				console.log(error);
			});
			$($scope.domEditImageModal).modal('show');
		},

		saveEditImage: function (data) {
			if (data == true) {
				$conf.confirmNotifi('success', 'Cập nhật tiêu đề ảnh thành công!!!');
				$($scope.domEditImageModal).modal('hide');
				$scope.actions.listAlbum();
			} else {
				$scope.data.errorsEditImage = data.errors;
			}
		},

		saveModalAlbum: function (data) {

			if (data == true) {
				$conf.confirmNotifi('success', 'Cập nhật album thành công!!!');
				$($scope.domAlbumModal).modal('hide');
				$scope.actions.listAlbum();
			} else {
				$scope.data.errors = data.errors;
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
				$($scope.domImageModal).modal('hide');
				$scope.actions.listAlbum();
				$('#uploadImage').modal('hide');
			} else {
				$scope.data.errors.upload = data.errors;
			}
		},

		removeAlbum: function () {
			$conf.confirmDelete ('small', 'Bạn muốn xóa ảnh này?', function (respon) {
				if (respon == true){
					$albumService.action.deleteAlbum($scope.data.idAlbum).then(function (resp){
						if (resp.data.status == true) {
							$conf.confirmNotifi('success', 'Xóa thành công thành công');
							$scope.actions.listAlbum();
							window.location = SiteUrl + "/backend/view/file-image";
						}
					}, function (error) {
						$conf.confirmNotifi('error', 'Xóa ảnh thất bại!!!', "fa fa-ban");
					});
				}
			});

			
		},


	};

	$scope.actions.listAlbum();
});