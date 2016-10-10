// Create the route module and name it routeApp
var app = angular.module("routeApp", "ngRoute");
// Config the routes
app.config(function ($routeProvider){
    $routeProvider
         // route for the home page
        .when('/', {
            templateUrl: 'pages/home.html',
            controller: 'homeController'
        })
        // route for the about page
        .when('/about.html',{
            templateUrl: 'pages/about.html',
            controller: 'aboutController'
        })
        // route for the contact page
        .when('/contact',{
            templateUrl: 'pages/contact.html',
            controller: 'contactController'
        })
        .otherwise({
            redirectTo: '/'
        })
});
// Create the controllers for the different pages below

// home page controller
    // Create a message to display in the view
app.controller('homeController', function($scope){
    $scope.message = 'This is our home page.';
});

// about page controller
    // Create a message to display in the view
app.controller('aboutController', function ($scope) {
    $scope.message = 'We are a small company';
});
// contact page controller
    // Create a message to display in the view
app.controller('contactController', function ($scope) {
    $scope.message = 'Here is our contact information.';
});