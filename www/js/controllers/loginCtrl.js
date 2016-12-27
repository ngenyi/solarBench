angular.module('starter')
.controller('loginCtrl',['$scope','$log','loginFcty',function(sc , lg , loginFcty){

  sc.login = function(user)
  {
     lg.log(user);
     lg.log("Login pending...");

     var promise = loginFcty.loginUser(user);
  }

}]);
