ngApp.factory('$conf', function(){
	var service = {};

	//type: loai succes, error
	//message: tin nhan
	//icon: fa fa-...
	//
	service.confirmNotifi = function (type, message, icon ,container , timeOut){
		    icon = icon || 'fa fa-check';
		    container = container || 'floating';
		    timeOut = timeOut || 3000;
		    $.niftyNoty({
		                type: type,
		                icon : icon,
		                message :  message,
		                container : container ,
		                timer : timeOut
		            });
			};


	return service;
})