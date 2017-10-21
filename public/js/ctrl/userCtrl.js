ngApp.controller('userCtrl', function ($scope, $apply, $userService, $conf) {
    
	$scope.data = {
		idUser: {},
		params: {},
		listUsers: {},

	}; 
	$scope.actions = {
		listUser : function () {
			$userService.action.listUser().then(function (resp) {
				$scope.data.listUsers = resp.data;
			  }, function (error) {
			  	console.log(error);

			  });
		},

		deleteUser: function (id) {
			$userService.action.deleteUser(id).then(function (resp) {
				console.log(resp);
			  }, function (error) {
			  	console.log(error);
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
				
				$scope.data.title = "Thêm mới nhân viên";
			}
			$('#user').modal('show');
		},


		saveUser: function (data, conf) {
			$apply(function () {
				if (data) {
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
