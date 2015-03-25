'use strict';

require('angular');
//require('angular-animate');
//var Hammer = require('hammerjs');
//require('angular-hammer');

//var app = angular.module('myApp', ['ngAnimate']);
var app = angular.module('myApp', []);
app.run(['$rootScope', '$window', 'authService', require('./facebook')]);
require('./bootstrap')(app);