ngApp.controller('newCtrl', function ($scope, $apply, $newService, $conf, $cateService) {
    $scope.domNewModal;
    $scope.domNewForm;
    $scope.domSeeMore;
	$scope.data = {
		idNew: "",
		params: {},
		listNews: {},
		pageNew: {},
		allListCate:{},
		nameCate: [],
		seeMore:{},
		errors: {},

	}; 
	$scope.filter = {};

	$scope.actions = {

		changePage: function (page) {
			$scope.data.pageNew.current_page = page;
			$scope.actions.listNew();
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

		seeMore: function (idNew) {
			$($scope.domSeeMore).modal('show');
			$newService.action.editNew(idNew).then(function (resp) {
					$scope.data.seeMore = resp.data;
				}, function (error) {
			});
		},

		listNew : function () {
			//lay du lieu tim kiem va page
			var title         = $scope.filter.title;
			var cateId         = $scope.filter.cateId;
			var current_page = $scope.data.pageNew.current_page;
			var params       = $newService.filter(title, cateId, current_page, 10);
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
			$scope.data.errors = {};
			$('input[name*="fileImg"]').val('');
			$($scope.domNewForm).parsley().reset();
			$($scope.domNewModal).modal('show');
			if ($scope.data.idNew) {
				$newService.action.editNew($scope.data.idNew).then(function (resp) {
					$scope.data.params = resp.data;
					$('.image-support').attr('src', SiteUrl + "/storage/" + $scope.data.params.image)
				}, function (error) {
				});
				$scope.data.title = "Cập nhật tin tức";
			} else {
				$scope.data.params = {};
				$('.image-support').attr('src', ' ');
				$scope.data.title = "Thêm mới tin tức";
			}
			
		},

		saveNew: function (data) {		
			if (data == true) {
				if ($scope.data.idNew) {
					$conf.confirmNotifi('success', 'Cập nhật tin thành công');
				} else {
					$conf.confirmNotifi('success', 'Thêm mới tin thành công');
				}
				$scope.actions.listNew();
				$($scope.domNewModal).modal('hide');
			}else {
				$scope.data.errors = data.errors;

			}
		},

		deleteNew: function (idNew) {
			$conf.confirmDelete ('small', 'Bạn muốn xóa ảnh này?', function (respon) {
				if (respon == true){
					$newService.action.deleteNew(idNew).then(function (resp) {
						$conf.confirmNotifi('success', 'Xóa tin thành công');
						$scope.actions.listNew();
						$scope.actions.allListCate();
					}, function (error) {
						$conf.confirmNotifi('error', 'Xóa tin thất bại', "fa fa-ban");
					});
				}
			});	
			
			
		}

	}

	$scope.actions.listNew();
	$scope.actions.allListCate();

});
