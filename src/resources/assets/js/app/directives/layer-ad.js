'use strict';

var $ = require('jquery');
require('bootstrap');

module.exports = function ($rootScope) {

    return {
        restrict: 'EA',
        scope: {
            title: '@',
            body: '@',
            page: '@'
        },
        replace: true,
        templateUrl: './tpl/layer-ad.html',
        link: function (scope, elem, attrs) {

            $rootScope.$on('receivedLikes', function (event, data) {

                if ( ! scope.userIsFanOfPage()) {
                    $(elem).modal();
                }

            });

            scope.userIsFanOfPage = function() {

                if ( !$rootScope.user.likes) {
                    return false;
                }

                for (var i = 0; i < $rootScope.user.likes.data.length; i++) {
                    if ($rootScope.user.likes.data[i].id == scope.page) {
                        return true;
                    }
                }

                return false;
            };

            //elem.bind('click', function () {
            //    invitationService.invite(scope.message);
            //});

        }
    }

};