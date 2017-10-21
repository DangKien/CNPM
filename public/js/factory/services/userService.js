ngApp.factory('$userService', function ($http, $httpParamSerializer) {
    var $service = {
        action: {},
        data: {},
        fillter: {},
    };
    $service.data = function ($name, $account, $gender,
        $birthday, $phone, $address, $email, $job, $avatar, $status
        ) {
        var params = new FormData();
        params.append('name', $name);
        params.append('account', $account);
        params.append('gender', $gender);
        params.append('birthday', $birthday);
        params.append('phone', $phone);
        params.append('address', $address);
        params.append('email', $email);
        params.append('job', $job);
        params.append('avatar', $avatar);
        params.append('status', $status);


        return params;
        
    };

    $service.action.listUser = function () {
        var url = SiteUrl + "/rest/user";
        return $http.get(url);
    };
    
    $service.action.insertUser = function (data) {
        var config = {
                headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
                },
            };
        var url = SiteUrl + "/rest/user";
        return $http.post(url, data, config);
    };
    
    $service.action.editUser = function (id) {
        var url = SiteUrl + "/rest/user/" + id;
        return $http.get(url);
    };
    
    $service.action.updateUser = function (id, data) {
        var config = {
                headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
                },
            };
        var url = SiteUrl + "/rest/user-update/" + id;
        return $http.post(url, data, config);
    };
    
    $service.action.deleteUser = function (id) {
        var url = SiteUrl + "/rest/user/" + id;
        return $http.delete(url);
    };
    
    
    return $service;
});