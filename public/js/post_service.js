myApp.factory('GetPostsService', ['$http', function($http){
    return{
        get:function () {
            return $http.get('api/posts');
        }
    }
}]);