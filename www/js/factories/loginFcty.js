angular.module('starter')
.factory('loginFcty',['$http','$log','$q',function($http,$log,$q){
    return {
      loginUser : function(data)
      {
        return $http({
                method:"POST",
                url:"http://127.0.0.1/solarBench/www/api/loginClients.php",
                data:{
                  email:data.email,
                  password:data.password
                }
        }).then(function(response){
              console.log(response);
              return response;
        },function(response){
              console.log("Wrong");
              return $q.reject(response.data);
        })
      }
    };
}])
