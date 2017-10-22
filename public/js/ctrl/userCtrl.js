ngApp.controller('userCtrl', function ($scope, $apply, $userService, $conf) {
    
	$scope.data = {
		idUser: {},
		params: {},
		listUsers: {},
		filter: {},

	}; 
	$scope.actions = {
		listUser : function () {
			var name   = $scope.data.filter.name;
			var phone  = $scope.data.filter.phone;
			var email  = $scope.data.filter.email;
			var status = $('#statusFilter').val();

			var params = $userService.filter(name, phone, email, status);
			$userService.action.listUser(params).then(function (resp) {
				$scope.data.listUsers = resp.data.data;
			  }, function (error) {
			  	console.log(error);

			  });
		},

		deleteUser: function (id) {
			$conf.confirmDelete ('small', 'Bạn muốn xóa loại tin này?', function (resp) {
				if (resp == true) {
					$userService.action.deleteUser(id).then(function (resp) {
						$conf.confirmNotifi('success', 'Xóa loại tin thành công!!!');
					  }, function (error) {
					  	$conf.confirmNotifi('error', 'Xóa loại tin thất bại!!!', "fa fa-ban");
					  });
				}
			});
			
		},	


		showModal: function (idUser) {
			$scope.data.idUser = idUser;
			if (idUser) {
				$scope.data.title = "Cập nhật thông tin nhân viên";
				$userService.action.editUser(idUser).then(function (resp) {
					$scope.data.params = resp.data;
					$scope.data.params.birthday = moment($scope.data.params.birthday,'YYYY-MM-DD').format('DD-MM-YYYY');
					console.log($scope.data.params.birthday);
			  }, function (error) {
			  	console.log(error);
			  });
			} else {

				$scope.data.params = {};
				$apply(function () {
					$scope.data.params.gender = "MALE";
				});
				$scope.data.title = "Thêm mới nhân viên";
			}
			$('#user').modal('show');
		},


		saveUser: function (data, conf) {
			$apply(function () {
				if (data == true) {
					if (conf == "insert") {
						$conf.confirmNotifi ('success', "Thêm mới nhân viên thành công !!!")
					} else if (conf == "update") {
						$conf.confirmNotifi ('success', "Cập nhật nhân viên thành công !!!")
					}
					$scope.actions.listUser();
					$('#user').modal('hide');
				} else {
					if (conf == "insert") {
						$conf.confirmNotifi ('error', "Thêm mới nhân viên thất bại !!!", 'fa fa-ban')
					} else if (conf == "update") {
						$conf.confirmNotifi ('error', "Cập nhật nhân viên thật bại !!!", 'fa fa-ban')
					}
				}

			});
			

		}
	}

	$scope.actions.listUser();

});
