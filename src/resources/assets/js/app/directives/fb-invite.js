'use strict';

module.exports = function($rootScope, invitationService) {

    return {
        restrict: 'EA',
        scope: {
            label: '@',
            message: '@',
            class: '@'
        },
        replace: true,
        template: '<button class="btn btn-primary" ng-disabled="initialized"><i class="fa fa-share"></i> {{ label || "Invite Friends" }}</button>',
        link: function (scope, elem, attrs) {

            $rootScope.$watch('initialized', function () {
                scope.initialized = !$rootScope.initialized;
            });

            elem.bind('click', function () {
                invitationService.invite(scope.message);
            });

        }
    }

};