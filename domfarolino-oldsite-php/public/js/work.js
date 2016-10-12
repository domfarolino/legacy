var work = angular.module('work', ['ngRoute', 'ngAnimate']);

work.config(function($routeProvider){
	// Dynamic Web Routing https://thinkster.io/egghead/routeparams-api/
	$routeProvider
	.when('/', {

	})
	.when('/1', {

	})
	.when('/2', {
		
	})
	.when('/3', {
		
	})
	.when('/posts/:id', {
		templateUrl: function(params){return '/public/js/blog'+params.id+'.html'},
		controller: 'BlogController'
	})
	.otherwise({
		rerouteTo: '/'
	})
});

//Why am I writing it this way? I am using Angular to simulate a restful API until the basic PHP 'mvc'
//version of my site is done. When it is I will begin structured github development version of my site with Python + Flask Restful API
//to sit behind all of the AngularJS front end work.

work.controller("BlogController", function($scope, $routeParams){
	$scope.showPost = function(id){
		location.href="#/posts/"+id;
	};
	$scope.posts = [
		{
			id: 1,
			title: "Patterns and Stages of Coding and Web Development",
			post: "This is a great post",
			content: "This is my content for the 'Stages of Web Development' post"
		},
		{
			id: 2,
			title: "Subconscious Presets: Questioning and Creativity",
			post: "This is a great post",
			content: "This is my content for the second post!"
		},
		{
			id: 3,
			title: "Algorithm Analysis",
			post: "This is a great post",
			content: "This is my content for the third post!"
		}
	];

});

work.controller("MenuController", function($scope){
	$scope.reroute = function(id){
		location.href=id;
	};

	$scope.blogSite = 'blog/';
	$scope.home= 'http://www.domfarolino.com';
});

work.controller("ProjectController", function($scope){
	$scope.reroute = function(id){
		location.href="#/"+id;
	};

	$scope.projects = [
		{
			title: "VentureApp",
			description: "Web Application made for a venture capitalist. The application allows users to manage their purchases and refinance their previous loans.",
			type: "Web Application",
			date: "1/8/2015",
			poster: "public/img/project1.jpg",
			id: 1
		},
		{
			title: "VentureApp",
			description: "Web Application made for a venture capitalist. The application allows users to manage their purchases and refinance their previous loans.",
			type: "Web Application",
			date: "1/8/2015",
			poster: "public/img/project2.jpg",
			id: 2
		},
		{
			title: "VentureApp",
			description: "Web Application made for a venture capitalist. The application allows users to manage their purchases and refinance their previous loans.",
			type: "Web Application",
			date: "1/8/2015",
			poster: "public/img/project3.jpg",
			id: 3
		}
	];
});

work.controller("ProjectView", function($scope){
	
});