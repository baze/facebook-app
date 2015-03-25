'use strict';

module.exports = function ($rootScope, $window, $http) {
    return {
        invite: function (message) {
            FB.ui({
                method: 'apprequests',
                message: message || '+++ PLEASE SUPPLY A MESSAGE! +++'
            }, function (response) {
                if (response && response.request && response.to) {
                    var user_ids = [];

                    angular.forEach(response.to, function(value, key) {
                        user_ids.push(value);
                    });

                    var data = {
                        to: user_ids,
                        request_id: response.request
                    };

                    $http.post($window.myApp.url + '/invitations', data).
                        success(function (data, status, headers, config) {
                            //console.log("success");
                            //console.log(data);
                        }).
                        error(function (data, status, headers, config) {
                            //console.log("error");
                            //console.log(data);
                        });

                } else {
                    // Canceled sending the request
                }
            });
        }
    };
};