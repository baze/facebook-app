'use strict';

module.exports = function($rootScope, authService) {

    return {
        restrict: 'EA',
        scope: {
            label: '@',
            redirect: '@'
        },
        template: '<button class="btn btn-primary" ng-disabled="initialized">{{ label || "Login" }}</button>',
        link: function (scope, elem, attrs) {

            $rootScope.$watch('initialized', function() {
                scope.initialized = !$rootScope.initialized;
            });

            elem.bind('click', function () {
                authService.login(scope.redirect || false);
            });

        }
    }

};