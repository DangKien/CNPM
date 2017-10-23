ngApp.controller('cateCtrl', function ($apply, $cateService, $scope, changStatus, $conf) {
	$scope.data = {
		listCate: {},
		params: {
			status: 1,
			cate_id: 0,
		},
		filter: {},
		nameCate:[],
		title: "",
		idCate: '',
		pageCate: {},
		allListCate:{},
	};

	$scope.actions = {

		changePage: function (page) {
			$scope.data.pageCate.current_page = page;
			$scope.actions.listCate();
		},

		// Danh sach loai tin
		listCate: function () {
			var name   = $scope.data.filter.name;
			var status = $('#statusFilter').val();
			var current_page =  $scope.data.pageCate.current_page;
			var params = $cateService.filter (name, status, current_page , 10);
			$cateService.action.listCate(params).then(function (resp) {
				$scope.data.listCate = resp.data.data;
				$scope.data.pageCate = resp.data;
				changStatus.change($scope.data.listCate);
				$scope.actions.changeNameCate($scope.data.listCate, $scope.data.allListCate);
			}, function (error) {
				console.log(error);
			});
		},


		allListCate: function () {
			var params = $cateService.filter('', '', '', 0);
			$cateService.action.allListCate(params).then(function (resp) {
				$scope.data.allListCate = resp.data;
				$scope.actions.menuBarLevel($scope.data.allListCate);
			}, function (error) {
				console.log(error);
			});
		},

		menuBarLevel: function (data, parent = 0, str = " -- ") {
			angular.forEach(data, function(item, key) {
				if (item.cate_id == parent) {
					$scope.data.nameCate.push({'name': str + item.name + str, id: item.id});
					$scope.actions.menuBarLevel(data, item.id, str + " -- ");    
				} 
			});
		},

		// chuyen id loai tin cha thanh ten tieng viet
		changeNameCate: function (listCate, allListCate) {
			$apply(function() {
				angular.forEach(listCate, function(item, key){
				if (item.cate_id != 0) {
					var cate_id = item.cate_id;
					angular.forEach(allListCate, function(value, key1){
						if (cate_id === value.id) {
							listCate[key].cate_id = value.name;
						}
					});
					} else {
						listCate[key].cate_id = "";
					}
				});
			});
		},

		deleteCate: function (idCate) {
			$conf.confirmDelete ('small', 'Bạn muốn xóa loại tin này?', function (resp) {
				if (resp == true){
					$cateService.action.deleteCate(idCate).then(function (resp) {
						if (resp) {
							$scope.actions.listCate();
							$scope.actions.allListCate();
							$conf.confirmNotifi('success', 'Xóa loại tin thành công!!!');
						}
					}, function (error) {
							$conf.confirmNotifi('error', 'Xóa loại tin thất bại!!!', "fa fa-ban");
					});
				}
			});
			
		},

		showModal: function (idCate) {
			$scope.data.idCate = idCate;
			$('#cate').modal('show');
			$('#form-cate').parsley().reset();
			if (!idCate) {
				
				$scope.data.params = {
					status: 1,
					cate_id: 0,
				};
				$scope.data.title = "Thêm mới loại tin";
			} else {

				$cateService.action.editCate(idCate).then (function (resp) {
					$scope.data.params = resp.data;
					
				}, function (error) {
					console.log(error);
				});
				$scope.data.title = "Cập nhật loại tin";
			}
		},

		save: function (data, conf) {
			if (data == true) {
				if (conf == "insert") {
					$conf.confirmNotifi('success', 'Thêm mới thành công!!!');
				}
				else if (conf == "update") {
					$conf.confirmNotifi('success', 'Cập nhật thành công!!!');			
				}
				$apply(function () {
					$scope.actions.allListCate();
					$scope.actions.listCate();
					$('#cate').modal('hide');
				});
				
			} else {
				if (conf == "insert") {
					console.log(data);
				}
				else if (conf == "update") {
					console.log(data);
				}
			}
		},
	};
	$scope.actions.allListCate();
	$scope.actions.listCate();
	

});