ngApp.controller('fileCtrl', function ($apply, $fileService, $scope, $conf) {
	$scope.domFileModal;
	$scope.domFileForm;
	$scope.data = {
		params: {},
		listFile: {},
		title: "",
		idFile:{},
		errors: {},
	};
	$scope.actions = {
		changePage: function (page) {
			$scope.data.pageAlbum.current_page = page;
			$scope.actions.listFile();
		},
		// filterParams: function () {
		// 	var idAlbum = $scope.data.idAlbum;
		// 	var params = $imageService.filter(idAlbum);
		// 	return params;
		// },

		// Danh sach loai tin
		listFile: function () {
			//var params = $scope.actions.filterParams();
			$fileService.action.listFile().then(function (resp) {
				$scope.data.listFile = resp.data.data;
			}, function (error) {
				console.log(error);
			});
		},

		showModalFile: function ($idFile) {
			$($scope.domFileModal).modal('show');
			$($scope.domFileForm).parsley().reset();
			$scope.data.idFile = $idFile;
			$scope.data.params = {};
			$scope.data.errors = {};
			$('.image-support').attr('src', "");
			$('input[name*="image-title"]').val('');
			$('input[name*="file"').val();
			if (!$idFile) {
				$scope.data.title = "Đăng tài liệu mới";
			} else {
				$fileService.action.editFile($scope.data.idFile).then(function (resp) {
					$scope.data.params = resp.data;
					var urlImage = SiteUrl + "/storage/images/file/" + $scope.data.params.url_image;
					$('.image-support').attr('src', urlImage);
				}, function (error) {
					console.log(error);
				});

				$scope.data.title = "Cập nhật tài liệu";
			}
			
		},


		saveModalFile: function (data) {
			if (data == true) {
				if (!$scope.data.idFile) {
					$conf.confirmNotifi('success', 'Thêm mới thành công');
				}else {
					$conf.confirmNotifi('success', 'Cập nhật album thành công');
				}
				$($scope.domFileModal).modal('hide');
				$scope.actions.listFile();
			} else {
				$scope.data.errors = data.errors;
			}
		},

		removeFile: function (idImage) {
			$conf.confirmDelete ('small', 'Bạn muốn xóa ảnh này?', function (respon) {
				if (respon == true){
					$fileService.action.deleteFile(idImage).then(function (resp){
						if (resp.data.status == true) {
							$conf.confirmNotifi('success', 'Xóa tài liệu thành công!!!');
							$scope.actions.listFile();
						}
					}, function (error) {
						$conf.confirmNotifi('error', 'Xóa tài liệu thất bại!!!', "fa fa-ban");
					});
				}
			});	
		},
	};
	$scope.actions.listFile();

});