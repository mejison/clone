(function(){

	angular.module("app")
		.controller("AdminCtrl", ['$scope', '$location', '$timeout', 'request', 'Upload', 'logger', AdminCtrl]);

	function AdminCtrl($scope, $location, $timeout, request, Upload, logger)
	{
		$scope.users = [];
		$scope.customer = {};

		$scope.get_users = function()
		{
			request.send('/users/get_all', {}, function(response){
				$scope.users = response;
			});
		}

		$scope.count = function(transaction, type)
		{
			var amount = 0;
			for(var t in transaction)
			{
				if (transaction[t].type == type)
				{
					amount += transaction[t].amount * 1;
				}
				
			}
			return amount;
		}

		$scope.send = function(id)
		{
			request.send('/users/send', {id : id}, function(response){
				$scope.get_users();
			});
		}

		$scope.delete = function(id)
		{
			request.send('/users/delete', {'id' : id}, function(response){
				$scope.get_users();
			});
		}

		$scope.add_customer = function()
		{
			
			if ($scope.add_customer_admin.$valid )
			{
				request.send("/auth/signup", $scope.customer, function(response){
					$scope.get_users();
				});
			}
			
		}
	}
})();