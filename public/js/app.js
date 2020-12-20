(function(){

	angular.module("app", ['ui.bootstrap','ngRoute', 'ngAnimate', 'ngFileUpload', 'ngSanitize']);

})()

;

(function () {
    'use strict';

    angular.module('app').config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
        var routes, setRoutes;
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        });

        var routes = [
            ':folder/:file/:param',
            ':folder/:file/',
            ':file'
        ];

        setRoutes = function(route) {
            var url = '/' + route;
            var config = {
                templateUrl: function(params) {
                    if (params.folder && params.file && params.param)
                    {
                        return '/view/' + params.folder + '/' + params.file + '/' + params.param;
                    }
                    else if (params.folder && params.file)
                    {
                        return '/view/' + params.folder + '/' + params.file;
                    }
                    else if(params.file)
                    {
                        return '/view/' + params.file;
                    }
                }
            };
            
            $routeProvider.when(url, config);
            return $routeProvider;
        };

        routes.forEach(function(route) {
            return setRoutes(route);
        });

        $routeProvider.when('/', {templateUrl: '/view/catalog'});
    }]); 
})()

;

(function(){

	angular.module("app")
		.controller("MainCtrl", ['$scope', 'request', '$timeout', '$route', '$location', MainCtrl]);

		function MainCtrl($scope, request, $timeout, $route, $location)
		{
            $scope.roles = [];
            
			$scope.signout = function()
            {
                request.send("/auth/signout", {}, function(){
                    $timeout(function(){
                        window.location.reload();
                    }, 1000);
                });
            }

            $scope.get_roles = function()
            {
                request.send("/auth/get_roles", {}, function(data){
                    $scope.roles = data;
                });
            }

            $scope.isActive = function (viewLocation) { 
                return viewLocation === $location.path();
            };
		}

})();