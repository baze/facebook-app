'use strict';

module.exports = function($rootScope, $window, $http) {

    return {
        saveToDatabase: function () {
            var data = $rootScope.user;

            $http.post($window.myApp.url + '/users', data).
                success(function (data, status, headers, config) {
                    //console.log("success");
                    //console.log(data);
                }).
                error(function (data, status, headers, config) {
                    //console.log("error");
                    //console.log(data);
                });

        }
    }

};