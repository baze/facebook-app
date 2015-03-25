'use strict';

module.exports = function ($rootScope) {

    return {
        restrict: 'A',
        scope: {
        },
        replace: true,
        link: function (scope, elem, attrs) {

            elem.bind('click', function () {
                console.log(this);
            });

        }
    }

};