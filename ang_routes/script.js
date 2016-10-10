// Create the route module and name it routeApp
var app = angular.module("routeApp", ["ngRoute"]);
// Config the routes
app.config(function ($routeProvider){
    $routeProvider
         // route for the home page
        .when('/', {
            templateUrl: 'pages/home.html',
            controller: 'mainController'
        })
        // route for the about page
        .when('/about',{
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
        });
});
// Create the controllers for the different pages below
// home page controller
    // Create a message to display in the view
app.controller('mainController', function($scope){
    $scope.message = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
});
// about page controller
    // Create a message to display in the view
app.controller('aboutController', function ($scope) {
    $scope.message = 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.';
});
// contact page controller
    // Create a message to display in the view
app.controller('contactController', function ($scope) {
    $scope.message = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)";
});