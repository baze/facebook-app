'use strict';

module.exports = function($routeProvider) {
    $routeProvider
        .when('/about', {templateUrl: 'tpl/master.html', controller: 'AboutController'})
        .otherwise({redirectTo: '/home', templateUrl: 'tpl/master.html', controller: 'HomeController'});
};