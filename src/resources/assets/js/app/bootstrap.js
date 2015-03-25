'use strict';

module.exports = function(app) {
	// Controllers
	app.controller('AppController', require('./controllers/app-controller'));
	// Directives
	app.directive('fbInvite', require('./directives/fb-invite'));
	app.directive('fbLogin', require('./directives/fb-login'));
	app.directive('layerAd', require('./directives/layer-ad'));
	app.directive('reservationTable', require('./directives/reservation-table'));
	// Filters
	app.filter('formatHours', require('./filters/format-hours'));
	app.filter('formatTime', require('./filters/format-time'));
	app.filter('getById', require('./filters/get-by-id'));
	app.filter('getByProperty', require('./filters/get-by-property'));
	// Services
	app.service('authService', require('./services/auth-service'));
	app.service('invitationService', require('./services/invitation-service'));
	app.service('userService', require('./services/user-service'));
};