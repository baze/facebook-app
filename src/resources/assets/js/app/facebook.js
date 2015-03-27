'use strict';

var MobileDetect = require('mobile-detect');

module.exports = function ($rootScope, $window, authService) {

    $rootScope.user = {};
    $rootScope.initialized = false;

    authService.setPermissions($window.myApp.permissions);

    function NotInFacebookFrame() {
        return top === self;
    }

    function ReferrerIsFacebookApp() {
        if (document.referrer) {
            return document.referrer.indexOf("apps.facebook.com") != -1;
        }
        return false;
    }

    if (NotInFacebookFrame() || ReferrerIsFacebookApp()) {
        var md = new MobileDetect($window.navigator.userAgent);

        if (!md.mobile() && $window.myApp.pageId && $window.myApp.redirectToPageTab) {
            //console.log("redirect");
            top.location.href = 'https://www.facebook.com/' + $window.myApp.pageId + '/?sk=app_' + $window.myApp.appId;
        }
    }

    $window.fbAsyncInit = function () {
        // Executed when the SDK is loaded

        $rootScope.$apply(function () {
            $rootScope.FB = FB;
        });

        FB.init({
            appId: $window.myApp.appId, // App ID
            channelUrl: $window.myApp.channelUrl, // Channel File
            status: true, // check login status
            cookie: true, // enable cookies to allow the server to access the session
            xfbml: true,  // parse XFBML
            version: 'v2.2'
        });

        FB.Canvas.setAutoGrow();
        FB.Canvas.scrollTo(0, 0);

        var container = document.getElementsByTagName('body')[0];
        setTimeout(function () {
            FB.Canvas.setSize({height: container.clientHeight});
        }, 91); // Paul's favourite number

        $rootScope.$emit('initialized', true);

        $rootScope.$apply(function () {
            $rootScope.initialized = true;
        });

        FB.Event.subscribe('edge.create', function (response) {
            top.location.reload();
        });

        authService.getLoginStatus();
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/de_DE/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

};