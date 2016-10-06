var app = angular.module('myApp',[]);
app.controller('formController', function($http, $log) {
    var self = this;
    // var data = null;
    this.artistName = null;
    this.compile_url = function (searchCriteria) {
        return 'https://itunes.apple.com/search?term=' + searchCriteria + '&callback=JSON_CALLBACK';
    }
    this.convertMillisToMinAndSecs = function(time){
        var formattedTime = '';
        var sec = Math.floor(time / 1000);
        var min = Math.floor(sec / 60);
        sec = sec - min * 60;
        if(sec < 10)
            sec = '0' + sec;
        formattedTime = min + ':' + sec;
        return formattedTime;
    }
    this.retrieveData = function(){
        $http({
            url: self.compile_url(self.artistName),
            method: 'jsonp',
            cache: false
        })
        .then(
            function (response) {     //success method
                $log.log(response);
                // $log.log(response.data.results);
                self.songs = response.data.results;
            },
            function (response) {     //error method
                $log.error(response);
            }
        );
    }
});