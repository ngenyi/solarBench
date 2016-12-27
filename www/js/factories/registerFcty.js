angular.module('starter')
.factory('registerFcty',['$http','$log','$q', function($http,$log,$q){

  return {
    registerUser : function(data)
    {
      return $http({
              method:"POST",
              url:"http://127.0.0.1/solarBench/www/api/registerClients.php",
              data:{
                username: data.username,
                email: data.email,
                password: data.password
              }
      }).then(function(response){
          return response;

      },function(response){
            return $q.reject(response.data);
      })
    }
  };

}])
