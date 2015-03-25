'use strict';

var $ = require('jquery');
require('bootstrap');

module.exports = function ($rootScope, $window, userService) {
    return {
        permissions: [],

        getLoginStatus: function () {
            var _self = this;

            FB.getLoginStatus(function (response) {
                if (response.authResponse) {
                    //fbUserId = response.authResponse.userID;
                    //token = response.authResponse.accessToken;
                    _self.getUserInfo();
                }
                else {
                    _self.login();
                }
            }, true);
        },

        getUserInfo: function () {
            var _self = this;

            FB.api('/me', function (response) {
                $rootScope.$apply(function () {
                    $rootScope.user = _self.user = response;
                });

                userService.saveToDatabase();
            });

            FB.api('/me/likes', function (response) {
                $rootScope.$apply(function () {
                    $rootScope.user.likes = response;
                    $rootScope.$emit('receivedLikes', 'foo');
                });
            });
        },

        login: function (refreshPage) {
            var _self = this;

            FB.login(function (response) {
                if (response.authResponse) {
                    //console.log('Welcome!  Fetching your information.... ');
                    FB.api('/me', function (response) {
                        //console.log('Good to see you, ' + response.name + '.');
                    });
                    _self.getUserInfo();

                    if (refreshPage) {
                        $window.location.reload();
                    }
                } else {
                    $('.modal-auth').modal();
                    //$('.modal-auth').on('hidden.bs.modal', function (e) {
                    //    _self.login(true);
                    //});
                    //console.log('User cancelled login or did not fully authorize.');
                }
            }, {scope: _self.permissions.join(",")});
        },

        logout: function () {
            var _self = this;

            FB.logout(function (response) {
                $rootScope.$apply(function () {
                    $rootScope.user = _self.user = {};
                });
            });
        },

        setPermissions: function (permissions) {
            this.permissions = permissions.split(",");
        },

        promptForPermissions: function (permissions) {
            var _self = this;

            FB.login(function (response) {
                _self.getUserInfo();
            }, {scope: permissions.join(',')});
        },

        promptForPermission: function (permission) {
            var _self = this;

            FB.login(function (response) {
                _self.getUserInfo();
            }, {scope: permission});
        }

    };
};