var mainApp=angular.module("mainApp",['ngRoute']);
//<--------------- configure route ----------------->
mainApp.config(['$routeProvider',function($routeProvider){
    $routeProvider.
    when('/',{
        templateUrl:'login.html',
        controller:'loginController'
       
    }).
    when('/login',{
        templateUrl:'login.html',
         controller:'loginController'
    }).
    when('/register',{
        templateUrl:'registration.html',
        controller:'registerController'
    }).
    when('/home',{
        templateUrl:'Home.html',
        controller:'homecontroller'
    }).
    when('/logout',{
        templateUrl:'login.html',
        controller:'loginController'
    }).
    otherwise({
        redirectTo:'/',
        controller:'loginController'
    })
}]);

//<--------------- Login Controller ----------------->
mainApp.controller('loginController',function($scope,$http){
    
    $scope.loginData =function(){
        $rootScope=$scope.username;
        if($scope.username == null || $scope.password== null ){
            alert("Please complete the required field");
           
        }else{
          
            $http({
                method:"POST",
                url:"../Backend/Login.php",
                data:{username: $scope.username, password: $scope.password}
            }) .then(function(response){
                //make field empty  
                $scope.username = "";
                $scope.password = "";
                $scope.alertMsg = true;
                console.log(response.data)
                if(response.data.error!="")
                {
                  console.log(response.data.error)
                 $scope.alertMessage = response.data.error;
                }
                else
                {
                    window.location.hash='#!/home';
                }
            });	
           
        } 
    }
});


//<--------------- Register Controller ----------------->

mainApp.controller('registerController',function($scope,$http){
    $scope.submitData= function(){
        if($scope.username == null || $scope.password == null ){
            alert("Please complete the required field");
        }
        else
        {
          
            $http({
                method:"POST",
                url:"../Backend/Register.php", 
                data:{username: $scope.username, password: $scope.password},
               })
            .then(function(response){
                //make field empty
                $scope.username = "";
                $scope.password = "";
                $scope.alertMsg = true;
                
                if( response.data.error!="")
                {
                $scope.alertMessage = response.data.error;
                }
                else
                {
                 $scope.alertMessage = response.data.message; 
                }
            });	
          
        }

    }

   
});
//<--------------- Home Controller ----------------->

mainApp.controller('homecontroller',function($scope,$http){

$scope.message= $rootScope;

});


