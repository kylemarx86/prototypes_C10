var app = angular.module('sgtApp', []);

app.provider('sgtData', function(){
    //Create a variable to hold this
    var thisProvider = this;
    //Create a variable to hold your api key but set it to an empty string
    thisProvider.api_key = '';
    //Create a variable to hold the API url but set it to an empty string
    thisProvider.api_url = '';

    //Add the necessary services to the function parameter list
    thisProvider.$get = function($http, $q, $log){
        //return an object that contains a function to call the API and get the student data
        //Refer to the prototype instructions for more help
        return {
            call_api: function(){
                var data = "api_key=" + api_key;
                // var data = {
                //     'api_key': api_key
                // }
                // var dataStr = $.param(data);
                var defer = $q.defer();
                $http({
                    url: api_url,
                    method: 'post',
                    data: data,
                    headers: {'Content-Type':'application/x-www-form-urlencoded'}
                })
                .then(function(response){   //success handler
                    defer.resolve(response);
                },function (response) {     //error handler
                    defer.reject("Error Error Error", $log.error(response));
                });
                return defer.promise;
            }
        };
    };
});

//Config your provider here to set the api_key and the api_url
app.config(function(sgtDataProvider){
    api_key = 'z9KW32X6Ky';
    api_url = 'http://s-apis.learningfuze.com/sgt/get';
});

//Include your service in the function parameter list along with any other services you may want to use
app.controller('ioController', function(sgtData, $log){
    //Create a variable to hold this, DO NOT use the same name you used in your provider
    var thisController = this;
    //Add an empty data object to your controller, make sure to call it 'data'
    thisController.data = {};         //messed up i think

    //Add a function called getData to your controller to call the SGT API
    //Refer to the prototype instructions for more help
    thisController.getData = function () {
        $log.log('i clicked');
        sgtData.call_api().then(
            function (response) {
                thisController.data = response.data;
                $log.log(thisController.data);
            },function (response) {
                $log.error("You messed up somewhere, or the server is down. Either way something's not right");
        });
    }

});