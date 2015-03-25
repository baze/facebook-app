'use strict';

module.exports = function () {
    return function (time) {

        var hourSuffix = ' Stunden';

        if (typeof time !== 'undefined') {
            console.log(time);

            if (time == 1) {
                hourSuffix = ' Stunde';
            }

            return time + hourSuffix;
        }

    }
};