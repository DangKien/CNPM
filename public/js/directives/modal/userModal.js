ngApp.directive('userModal', function ($apply, $userService) {
	var templateUrl = SiteUrl + '/modal/userModal';

	var link = function (scope) {
			scope.actions = {
				insertUser: function () {
					var avatar = $('input[name *= "avatar" ]')[0].files[0];
					var birthday = moment($('input[name *= "birthday" ]').val(), 'DD/MM/YYYY').format("YYYY-MM-DD");
					var params = $userService.data (scope.data.params.name, scope.data.params.account, 
						scope.data.params.gender, birthday ,scope.data.params.phone, scope.data.params.address,
						scope.data.params.email, scope.data.params.job, avatar, scope.data.params.status
						);
					$userService.action.insertUser(params).then(function (resp) {

						scope.onSave({data: true, conf: "insert"});

					}, function (error) {
						scope.onSave({data: error.data, conf: "insert"});
					});

				},


				updateUser: function (id) {
					var avatar = $('input[name *= "avatar" ]')[0].files[0];
					birthday = $('input[name *= "birthday" ]').val();
					var birthday = moment($('input[name *= "birthday" ]').val(), 'DD/MM/YYYY').format("YYYY-MM-DD");
					console.log(birthday);
					var params = $userService.data (scope.data.params.name, scope.data.params.account, 
						scope.data.params.gender, birthday ,scope.data.params.phone, scope.data.params.address,
						scope.data.params.email, scope.data.params.job, avatar, scope.data.params.status
						);
					$userService.action.updateUser(id, params).then(function (resp) {
						scope.onSave({data: true, conf: "update"});
					}, function (error) {
						scope.onSave({data: error.data, conf: "update"});
					});
				},

				save: function () {
					if (scope.data.idUser) {
						scope.actions.updateUser(scope.data.idUser);
					} else {
						scope.actions.insertUser();
					}
				},
		}

	}

	return {
		restrict: 'E',
		scope: {
			data : "=data",
			onSave : "&userSave" 
		},
		link: link,
		templateUrl: templateUrl,
	}

	
});