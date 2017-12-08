ngApp.controller('videoCtrl', function ($apply, $videoService, $scope, changStatus, $conf) {
	$scope.data = {
		title: "",
		idVideo:{},
		params: {},
		listVideo: {},
		pageVideo: {},
	};

	$scope.actions = {

		changePage: function (page) {
			$scope.data.pageVideo.current_page = page;
			$scope.actions.listVideo();
		},

		// Danh sach loai tin
		listVideo: function () {

			$videoService.action.listVideo({page: $scope.data.pageVideo.current_page}).then(function (resp) {
				$scope.data.listVideo = resp.data.data;
				$scope.data.pageVideo = resp.data;
			}, function (error) {
				console.log(error);
			});
		},

		showModalVideo: function (idVideo) {
			$scope.data.idVideo = idVideo;
			$('#video').modal('show');
			// $('#album-form').parsley().reset();
			if (!idVideo) {
				$scope.data.title = "Thêm mới video";
			} else {
				$scope.data.title = "Cập nhật video";
				$videoService.action.editVideo(idVideo).then(function (resp) {
					$scope.data.params = resp.data;
				}, function (error) {

				});
			}
		},

		saveModalVideo: function (data) {
			if (data == true) {
				if (!$scope.data.idVideo) {
					$conf.confirmNotifi('success', 'Thêm mới thành công');
				} else {
					$conf.confirmNotifi('success', 'Cập nhật thành công');
				}
				$('#video').modal('hide');
				$scope.actions.listVideo();
			} else {
				$scope.data.errors = data.errors;
			}
		},

		deleteVideo: function (idVideo) {
			$conf.confirmDelete ('small', 'Bạn muốn xóa video tin này?', function (resp) {
				if (resp == true){
					$videoService.action.deleteVideo(idVideo).then(function (resp) {
							$scope.actions.listVideo();
							$conf.confirmNotifi('success', 'Xóa loại tin thành công!!!');
					}, function (error) {
							$conf.confirmNotifi('error', 'Xóa loại tin thất bại!!!', "fa fa-ban");
					});
				}
			});
			
		},

	};
	$scope.actions.listVideo();
});

