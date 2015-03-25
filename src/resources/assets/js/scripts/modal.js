'use strict';

var $ = require('jquery');
require('bootstrap');

module.exports = function () {
    $('.flash-modal').modal();
    $('#flash-overlay-modal').modal();
};