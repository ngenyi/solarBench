angular.module('starter')
.controller('registerCtrl',['$scope','$log','registerFcty',function(sc , lg , registerFcty){

  sc.signup = function(data)
  {
    lg.log(data);
    lg.log("Register pending..");

    var promise = registerFcty.registerUser(data);
  }

}]);
