ngApp.controller('videoCtrl', function ($apply, $rootScope, $scope, $videoService) {
	$scope.data = {
		listVideo: {},
		pageVideo: {},
	};

	$scope.actions = {
		changePage: function (page) {
			$scope.data.pageVideo.current_page = page;
			$scope.actions.listVideo();
		},

		listVideo: function () {
			$videoService.action.listVideo({page: $scope.data.pageVideo.current_page}).then(function (resp) {
				$scope.data.listVideo = resp.data.data;
				$scope.data.pageVideo = resp.data;
			}, function (error) {
				
			});
		},
			
	}
	$scope.actions.listVideo();

});

ngApp.controller('videoDetailCtrl', function ($apply, $rootScope, $scope, $videoService, $sce) {
	$scope.data = {
		videoDetail: {},
	};

	$scope.actions = {
		videoDetail: function () {
			$videoService.action.videoDetail(idVideo).then(function (resp) {
				$scope.data.videoDetail = resp.data;
				$scope.data.videoDetail.url_video =  $sce.trustAsResourceUrl('https://www.youtube.com/embed/' + $scope.data.videoDetail.video_ytb_id);
				console.log($scope.data.videoDetail);
			}, function (error) {
				
			});
		},
			
	}
	$scope.actions.videoDetail();

});