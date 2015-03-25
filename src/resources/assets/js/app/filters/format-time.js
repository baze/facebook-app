'use strict';

module.exports = function () {
    return function (time) {

        if (typeof time !== 'undefined') {
            var hours = Math.floor(time);
            var timeString = time.toString();

            var minuteSuffix = timeString.indexOf('.5') != -1 ? ':30' : ':00';

            return hours + minuteSuffix;
        }
    }
};