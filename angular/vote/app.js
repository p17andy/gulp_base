var app = angular.module('vote', []);

app.controller('MainCtrl', function($scope) {
	
	$scope.upVote = function (vote) {
		if($scope.down == 'down'){$scope.down = '';}
		$scope.up='up';
		$scope.vote++;		
	}
		
	$scope.downVote = function (vote) {
		$scope.vote--;
		if($scope.vote < 0){$scope.vote = 0;}
		
		$scope.down='down';
		if($scope.up == 'up'){$scope.up = '';}
	}
	
	$scope.vote = 0;
	
	var countervote = $scope.vote;
	
	
	
	
});
