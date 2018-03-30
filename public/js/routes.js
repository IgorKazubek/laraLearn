var myApp = angular.module('app', ['ngRoute']);

myApp.config(function($routeProvider){

    $routeProvider.when('/',{
        controller:'home',
        templateUrl:'../../views/main.html'
    }).when('/posts',{
        controller:'posts',
        templateUrl:'../../views/posts/posts.html'
    }).when('/about',{
        controller:'about',
        templateUrl:'../../views/about.html'
    }).when('/create',{
        controller:'newPost',
        templateUrl:'../../views/posts/create.html'
    }).when('/show_post/:postId',{
        controller:'showPost',
        templateUrl:'../../views/posts/show_post.html'
    });

});

myApp.factory('GetPostsService', ['$http', function($http, CSRF_TOKEN) {
    return {
        getPosts: function () {
            return $http.get('api/posts');
        },
        createPost: function (post) {
            var newPost = {
                title: post.title,
                body: post.body
            }
            return $http.post('api/create', newPost );
        },
        showPost:function (id) {
            return $http.get('api/post/' + id);
        }
    }
}]);


myApp.controller('about', ['$scope', function($scope) {
    $scope.greeting = 'This is page about this blog!';
}]);

myApp.controller('posts', ['$scope', 'GetPostsService', function($scope, GetPostsService) {

    $scope.posts = [];
    $scope.currentPost = {};

    GetPostsService.getPosts().then(function(res) {
        $scope.posts = res.data;
    });

}]);

myApp.controller('home', function ($scope) {
    
});

myApp.controller('showPost', [ '$scope', '$routeParams', 'GetPostsService', function($scope, $routeParams, GetPostsService){

    $scope.currentPost = {};

    GetPostsService.showPost($routeParams.postId).then(function (res) {
        $scope.currentPost = res.data;
    })

}]);

myApp.controller('newPost', [ '$scope', 'GetPostsService', function ($scope, GetPostsService) {
    $scope.newPostData = {
        'title': "New title",
        'body': 'New body'
    };

    $scope.addNewPost = function (){
        alert(111);
        GetPostsService.createPost($scope.newPostData).then(function(){
            alert('New post successfully created');
        });
    }
}]);


