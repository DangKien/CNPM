ngApp.controller('slideCtrl', function ($scope, $apply, $slideService, $conf) {
    $scope.domSlideModal;
    $scope.domSlideForm;
	$scope.data = {
		idSlide: {},
		params: {
			status: "AVAILABLE",
		},
		listSlides: {},
		filter: {},
		pageSlide: {},
		title: "",
		errors: {},

	}; 
	$scope.actions = {

		changePage: function (page) {
			$scope.data.pageSlide.current_page = page;
			$scope.actions.listSlide();
		},

		listSlide : function () {
			// lay du lieu tim kiem va page
			$slideService.action.listSlide($scope.data.pageSlide.current_page).then(function (resp) {
				$scope.data.listSlides = resp.data.data;
				$scope.data.pageSlide  = resp.data;
			  }, function (error) {
			  	console.log(error);
			  });
		},

		deleteSlide: function (id) {
			$conf.confirmDelete ('small', 'Bạn muốn xóa loại tin này?', function (resp) {
				if (resp == true) {
					$slideService.action.deleteSlide(id).then(function (resp) {
						$conf.confirmNotifi('success', 'Xóa loại tin thành công');
						$scope.actions.listSlide();
					  }, function (error) {
					  	$conf.confirmNotifi('danger', 'Xóa loại tin thất bại', "fa fa-ban");
					  });
				}
			});
			
		},	
		showModal: function (idSlide) {
			$scope.data.idSlide = idSlide;
			$scope.data.errors = {};
			$($scope.domSlideModal).modal('show');
			$($scope.domSlideForm).parsley().reset();
			if ($scope.data.idSlide) {
				$slideService.action.editSlide($scope.data.idSlide).then(function (resp) {
					$scope.data.params = resp.data;
				}, function (error) {

				});
				$scope.data.title = "Cập nhật ảnh slide";
			} else {
				$scope.data.params        = {};
				$scope.data.params.status = "AVAILABLE";
				$scope.data.title         = "Thêm mới ảnh slide";
			}
		},
		saveSlide: function (data) {
			$apply(function () {
				if (data == true) {
					if (!$scope.data.idSlide) {
						$conf.confirmNotifi ('success', "Thêm mới ảnh slide thành công")
					} else {
						$conf.confirmNotifi ('success', "Cập nhật ảnh slide thành công")
					}
					$scope.actions.listSlide();
					$($scope.domSlideModal).modal('hide');
				} else {
					$scope.data.errors = data.errors;
				}

			});
		}
	}

	$scope.actions.listSlide();

});
