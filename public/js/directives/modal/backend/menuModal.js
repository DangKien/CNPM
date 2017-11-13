ngApp.directive('menuMoal', function($apply, $menuService){
	templateUrl = SiteUrl + '/modal/menuModal';

	var link = function (scope) {
		scope.dataParams = function () {
			var week   = scope.data.params.week;
			var month  = scope.data.params.month;
			var year   = scope.data.params.year;
			var cateId = scope.data.params.cateId;
			var image  = scope.data.params.image;
			var params = $menuService.data(week, month, year, cateId, image);

			return params;
		};

		scope.actions = {

			insertMenu : function () {
				var params = scope.dataParams();
				$menuService.action.insertMenu(params).then( function (resp) {
						if (resp) {
							scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},

			updateMenu: function (idMenu) {
				var params = scope.dataParams();
				$menuService.action.updateMenu(idMenu, params).then( function (resp) {
						if (resp) {
						scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},

			saveMenu: function () {
				if (!scope.data.idMenu) {
					if ($(scope.menuForm).parsley().validate())
					{
						scope.actions.insertMenu();
					}
				}else {
					if ($(scope.menuForm).parsley().validate())
					{
						scope.actions.updateMenu(scope.data.idMenu);
					}
				}
			}
		}


	}
	return {
		name: '',
		scope: {
			data: '=data',
			onSave: '&menuSave',
			menuModal: "=domMenuModal",
			menuForm: "=domMenuForm",
		},
		restrict: 'E',
		templateUrl: templateUrl,
		link:link,
	};
});