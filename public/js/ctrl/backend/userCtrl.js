ngApp.controller('userCtrl', function ($scope, $apply, $userService, $conf) {
	$scope.domUserForm;
	$scope.domUserModal;

	$scope.data = {
		idUser: {},
		params: {},
		listUsers: {},
		filter: {},
		pageUser: {},
		errors: {},
	}; 
	$scope.actions = {
		changePage: function (page) {
			$scope.data.pageUser.currentPage = page;
			$scope.actions.listUser();
		},

		listUser : function () {
			// lay du lieu tim kiem va page
			var name   = $scope.data.filter.name;
			var phone  = $scope.data.filter.phone;
			var email  = $scope.data.filter.email;
			var status = $('#statusFilter').val();
			var current_page = $scope.data.pageUser.currentPage;
			var params = $userService.filter(name, phone, email, status, current_page);
			// thuc hien tim kiem
			$userService.action.listUser(params).then(function (resp) {
				$scope.data.listUsers = resp.data.data;
				$scope.data.pageUser  = resp.data;
			  }, function (error) {
			  	console.log(error);
			  });
		},

		deleteUser: function (id) {
			$conf.confirmDelete ('small', 'Bạn muốn xóa loại tin này?', function (resp) {
				if (resp == true) {
					$userService.action.deleteUser(id).then(function (resp) {
						$conf.confirmNotifi('success', 'Xóa loại tin thành công!!!');
						$scope.actions.listUser();
					  }, function (error) {
					  	$conf.confirmNotifi('error', 'Xóa loại tin thất bại!!!', "fa fa-ban");
					  });
				}
			});
			
		},	
		showModal: function (idUser) {
			$scope.data.idUser       = idUser;
			$scope.data.params       = {};

			if (idUser) {
				$scope.data.title = "Cập nhật thông tin nhân viên";
				$userService.action.editUser(idUser).then(function (resp) {
					$scope.data.params = resp.data;
					$scope.data.params.birthday = moment($scope.data.params.birthday,'YYYY-MM-DD').format('DD-MM-YYYY');
			  }, function (error) {
			  	console.log(error);
			  });
			} else {
				$apply(function () {
					$scope.data.params.gender = "MALE";
				});
				$scope.data.title = "Thêm mới nhân viên";
			}
			$($scope.domUserModal).modal('show');
			$($scope.domUserForm).parsley().reset();
		},

		saveUser: function (data, conf) {
			$apply(function () {
				if (data == true) {
					$scope.actions.listUser();
					$($scope.domUserModal).modal('hide');

					if (!$scope.data.idUser) {
						$conf.confirmNotifi ('success', "Thêm mới nhân viên thành công !!!")
					} else {
						$conf.confirmNotifi ('success', "Cập nhật nhân viên thành công !!!")
					}
					
				} else {
					$scope.data.errors = data.errors;
				}

			});
		}
	}

	$scope.actions.listUser();

});
