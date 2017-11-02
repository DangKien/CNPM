ngApp.controller('newCtrl', function ($scope, $apply, $newService, $conf, $cateService) {
    
	$scope.data = {
		idNew: "",
		params: {},
		listNews: {},
		pageNew: {},
		allListCate:{},
		nameCate: [],

	}; 
	$scope.filter = {};

	$scope.actions = {

		changePage: function (page) {
			$scope.data.pageNew.currentPage = page;
			$scope.actions.listUser();
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

		listNew : function () {
			//lay du lieu tim kiem va page
			var title         = $scope.filter.title;
			var cate         = $scope.filter.cate;
			var current_page = $scope.data.pageNew.currentPage;
			var params       = $newService.filter(title, cate, current_page, 10);
			//thuc hien tim kiem
			$newService.action.listNew(params).then(function (resp) {
				$scope.data.listNews = resp.data.data;
				$scope.data.pageNew  = resp.data;
			  }, function (error) {
			  	console.log(error);
			  });
		},

		showModal: function (idNew) {
			$scope.data.idNew = idNew;
			$('#form-new').parsley().reset();
			if ($scope.data.idNew) {
				$newService.action.editNew($scope.data.idNew).then(function (resp) {
					$scope.data.params = resp.data;
				}, function (error) {

				});
				$scope.data.title = "Cập nhật tin tức";
			} else {
				$scope.data.params = {};
				$scope.data.title = "Thêm mới tin tức";
			}
			$('#new').modal('show');
		},

		saveNew: function (data) {
			$scope.actions.listNew();
			$scope.actions.allListCate();
			if (data == true) {
				if ($scope.data.idNew) {
					$conf.confirmNotifi('success', 'Cập nhật tin thành công');
				} else {
					$conf.confirmNotifi('success', 'Thêm mới tin thành công');
				}
				$('#new').modal('hide');
			}else {
				

			}
		},
		deleteNew: function (idNew) {
			$newService.action.deleteNew(idNew).then(function (resp) {
				$conf.confirmNotifi('success', 'Xóa tin thành công');
			}, function (error) {
				$conf.confirmNotifi('error', 'Xóa tin thất bại', "fa fa-ban");
			});
			$scope.actions.listNew();
			$scope.actions.allListCate();
		}

	}

	$scope.actions.listNew();
	$scope.actions.allListCate();

});
