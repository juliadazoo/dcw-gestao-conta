app.config(function($routeProvider) {
    $routeProvider.when('/', {
        templateUrl: 'templates/feed.html',
        controller: 'FeedController'
    }).when('/users', {
        templateUrl: 'templates/users.html',
        controller: 'UsersController'
    });
});
