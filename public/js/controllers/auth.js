(function(){

	angular.module("app")
		.controller("AuthCtrl", ['$scope', '$location', '$timeout', 'request', 'Upload', 'logger', AuthCtrl]);

	function AuthCtrl($scope, $location, $timeout, request, Upload, logger)
	{
		$scope.signin = function()
		{
			if ($scope.form_signin.$valid)
			{
				request.send("/auth/signin", { 
					users_email : $scope.email,
					password : $scope.password,
					remember_me : $scope.remember_me ? true : false
				}, function(data){
					if (data)
					{
						$timeout(function(){
							window.location.reload();
						}, 1000);
					}
				});
			}
		}

		$scope.signup = function()
		{
			if ($scope.form_signup.$valid )
			{

				request.send("/auth/signup", 
					{
						email : $scope.email,
						first_name : $scope.first_name,
						last_name : $scope.last_name,
						role : $scope.role
					}, 
					function(response){
						if (response.data)
						{
							$timeout(function(){
							 	$location.path("/");
							}, 1000);
						}
					});
			}
		}

		$scope.accept = function()
		{
			var setgments = window.location.href.split('/');
			request.send("/auth/accept", 
			{
				password : $scope.password,
				url : setgments[setgments.length - 1]
			}, function(response){
				if (response.data)
				{
					$timeout(function(){
					 	$location.path("/");
					}, 1000);
				}
			});
		}
	}
})()

;