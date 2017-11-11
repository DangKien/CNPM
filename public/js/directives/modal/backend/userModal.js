ngApp.directive('userModal', function ($apply, $userService) {
	var templateUrl = SiteUrl + '/modal/userModal';

	var link = function (scope) {
			scope.actions = {
				insertUser: function () {
					var avatar   = scope.data.params.image;
					var birthday = moment($('input[name *= "birthday" ]').val(), 'DD/MM/YYYY').format("YYYY-MM-DD");
					var params = $userService.data (scope.data.params.name, scope.data.params.account, 
						scope.data.params.gender, birthday ,scope.data.params.phone, scope.data.params.address,
						scope.data.params.email, scope.data.params.job, avatar, scope.data.params.status
						);
					$userService.action.insertUser(params).then(function (resp) {
						scope.onSave({data: true});
					}, function (error) {
						scope.onSave({data: error.data});
					});

				},


				updateUser: function (id) {
					var avatar   = scope.data.params.image;
					birthday     = $('input[name *= "birthday" ]').val();
					var birthday = moment($('input[name *= "birthday" ]').val(), 'DD/MM/YYYY').format("YYYY-MM-DD");
					var params = $userService.data (scope.data.params.name, scope.data.params.account, 
						scope.data.params.gender, birthday ,scope.data.params.phone, scope.data.params.address,
						scope.data.params.email, scope.data.params.job, avatar, scope.data.params.status
						);
					$userService.action.updateUser(id, params).then(function (resp) {
						scope.onSave({data: true});
					}, function (error) {
						scope.onSave({data: error.data});
					});
				},

				save: function () {
					if (scope.data.idUser) {
						if ($(scope.userForm).parsley().validate()) {
							scope.actions.updateUser(scope.data.idUser);
						}
					} else {
						if ($(scope.userForm).parsley().validate()) {
							scope.actions.insertUser();
						}
					}
				},
		}

	}

	return {
		restrict: 'E',
		scope: {
			data : "=data",
			onSave : "&userSave",
			userModal: "=domUserModal",
			userForm: "=domUserForm", 
		},
		link: link,
		templateUrl: templateUrl,
	}

	
});