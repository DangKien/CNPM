ngApp.controller('newCtrl', function ($scope, $apply, $newService, $conf, $cateService) {
    
	$scope.data = {
		idNew: {},
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
				console.log($scope.data.allListCate)
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

	}

	$scope.actions.listNew();
	$scope.actions.allListCate();

});
