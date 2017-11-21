ngApp.controller('addmissionCtrl', function ($apply, $addmissionService, $scope, changStatus, $conf) {
	$scope.data = {
		listCate: {},
		pageAddmission: {},
	};

	$scope.actions = {
		changePage: function (page) {
			$scope.data.pageAddmission.current_page = page;
			$scope.actions.listAddmission();
		},
		listAddmission: function () {
			$addmissionService.action.listAddmission().then(function (resp) {
				$scope.data.listAddmission = resp.data.data;
				$scope.data.pageAddmission = resp.data;
			}, function (error) {
				console.log(error);
			});
		},

		checkAdd: function (id) {
			$conf.confirmDelete ('small', 'Bạn muốn xóa ảnh này?', function (respon) {
					if (respon == true){
						$addmissionService.action.checkAddmission(id).then(function (resp){
							if (resp.data.status == true) {
								$conf.confirmNotifi('success', 'Đã liên hệ');
								$scope.actions.listAddmission();
							}
						}, function (error) {
							$conf.confirmNotifi('error', 'Lỗi hệ thống', "fa fa-ban");
						});
					}
				});
		}

		
	}

	$scope.actions.listAddmission();
	

});