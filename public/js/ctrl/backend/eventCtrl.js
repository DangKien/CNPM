ngApp.controller('eventCtrl', function ($apply, $eventService, $scope, changStatus, $conf) {
	$scope.eventForm;
	$scope.eventModal;
	$scope.data = {
		listEvent: {},
		title: '',
		idEvent: '',
		params: {},
		pageEvent: {},
	};

	$scope.actions = {
		changePage: function (page) {
			$scope.data.pageEvent.current_page = page;
			$scope.actions.listEvent();
		},
		listEvent: function () {
			$eventService.action.listEvent({page:$scope.data.pageEvent.current_page}).then(function (resp) {
				$scope.data.listEvent = resp.data.data;
				$scope.data.pageEvent = resp.data;
			}, function (error) {
				
			});
		},

		showEventModal: function (idEvent) {
			$scope.data.idEvent = idEvent;
			$scope.data.errors  = {};
			$scope.data.params  = {};
			$($scope.eventModal).modal('show');

			if (!idEvent) {
				$scope.data.title = "Thêm mới sự kiện";
			} else {
				$eventService.action.editEvent(idEvent).then(function (resp) {
					$scope.data.params = resp.data;
				}, function (error) {
					
				});
				$scope.data.title = "Cập nhật sự kiện";
			}
			
		},

		saveEvent: function (data) {
			if (data == true) {
				$($scope.eventModal).modal('hide');
				$scope.actions.listEvent();
				if (!$scope.data.idEvent) {
					$conf.confirmNotifi ('success', "Thêm mới sự kiện thành công")
				} else {
					$conf.confirmNotifi ('success', "Cập nhật sự kiện thành công")
				}
				
			} else {
				$scope.data.errors = data;
			}
		},

		deleteEvent: function (idEvent) {
			$conf.confirmDelete ('small', 'Bạn muốn xóa sự kiện này?', function (resp) {
				if (resp == true){
					$eventService.action.deleteEvent(idEvent).then(function (resp) {
						if (resp) {
							$scope.actions.listEvent();
							$conf.confirmNotifi('success', 'Xóa sự kiện thành công');
						}
					}, function (error) {
							$conf.confirmNotifi('error', 'Xóa sự kiện thất bại', "fa fa-ban");
					});
				}
			});
		}
		
	}

	$scope.actions.listEvent();
	

});