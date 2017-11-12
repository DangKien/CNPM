ngApp.controller('menuCtrl', function ($apply, $menuService, $scope, changStatus, $conf) {
	$scope.domMenuModal;
	$scope.domMenuForm;
	$scope.data = {
		weeks: [
			{ name: "Tuần 1", value: "1"},
			{ name: "Tuần 2", value: "2"},
			{ name: "Tuần 3", value: "3"},
			{ name: "Tuần 4", value: "4"},
		],

		months: [
			{ name: "Tháng 1", value: "1"},
			{ name: "Tháng 2", value: "2"},
			{ name: "Tháng 3", value: "3"},
			{ name: "Tháng 4", value: "4"},
			{ name: "Tháng 5", value: "5"},
			{ name: "Tháng 6", value: "6"},
			{ name: "Tháng 7", value: "7"},
			{ name: "Tháng 8", value: "8"},
			{ name: "Tháng 9", value: "9"},
			{ name: "Tháng 10", value: "10"},
			{ name: "Tháng 11", value: "11"},
			{ name: "Tháng 12", value: "12"},
		],
		listMenu: {},
		params: {},
		filter: {},
		title: "",
		idMenu: '',
		pageMenu: {},
		errors:{},
		listCateMenu:{},
		
	};
	
		

	$scope.actions = {

		changePage: function (page) {
			console.log(page);
			$scope.data.pageMenu.page = page;
			$scope.actions.listMenu();
		},

		// Danh sach loai tin
		listMenu: function () {
			var params = $menuService.filter($scope.data.pageMenu.page, 10);
			$menuService.action.listMenu().then(function (resp) {
				$scope.data.listMenu = resp.data.data;
				$scope.data.pageMenu = resp.data;
			}, function (error) {
				console.log(error);
			});
		},

		listCateMenu: function () {
			$menuService.action.listCateMenu().then(function (resp) {
				$scope.data.listCateMenu = resp.data;
				$scope.data.params.cateId= resp.data[0].id;
			}, function (error) {
				console.log(error);
			});
		},

		showModalMenu: function (idMenu) {
			$($scope.domMenuModal).modal('show');
			$scope.data.errors = {};
			$scope.data.params.week = $scope.data.weeks[0].value;
			$scope.data.params.month = $scope.data.months[0].value;
			$($scope.domMenuForm).parsley().reset();
			$scope.data.title = "Thêm mới thực đơn";
			$scope.data.idMenu = idMenu;
			if (idMenu) {
				$menuService.action.editMenu(idMenu).then (function (resp) {
					$scope.data.params = resp.data;
					$scope.data.params.cateId = resp.data.cate_menu;
					console.log($scope.data.params.cateId);
				}, function (error) {
					console.log(error);
				});
				$scope.data.title = "Cập nhật thực đơn";
			}
				
			
		},

		saveModalMenu: function (data) {
			if (data == true) {
				$($scope.domMenuModal).modal('hide');
				$scope.actions.listMenu();
				if (!$scope.data.idMenu) {
					$conf.confirmNotifi('success', 'Thêm mới thực đơn thành công');
				} else {
					$conf.confirmNotifi('success', 'Cập nhật thành công');
				}
			} else {
				$scope.data.errors = data.errors;
			}
		},

		deleteMenu: function (idMenu) {
			$conf.confirmDelete ('small', 'Bạn muốn xóa ảnh này?', function (respon) {
				if (respon == true){
					$menuService.action.deleteMenu(idMenu).then(function (resp){
							$conf.confirmNotifi('success', 'Xóa thực đơn thành công');
							$scope.actions.listMenu();
					}, function (error) {
						$conf.confirmNotifi('error', 'Xóa thực đơn thất bại', "fa fa-ban");
					});
				}
			});	
		}

	};
	$scope.actions.listMenu();
	$scope.actions.listCateMenu();
});
