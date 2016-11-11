angular.module('starter')
.controller('registerCtrl',['$scope','$log',function(sc , lg){

  sc.signup = function(data)
  {
    lg.log(data);
    lg.log("Register pending..");
  }

}]);
