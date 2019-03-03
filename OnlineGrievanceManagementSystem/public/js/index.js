// Creating angular module and injecting dependency

var baseUrl = 'http://127.0.0.1:8000/';
  // var baseUrl = 'https://www.aictegrams.com/';


var grievancesystem = angular.module('grievancesystem',['ngRoute',
														'ui.grid',
														'ui.grid.autoResize',
														'ui.grid.cellNav',
														'ui.bootstrap',
														'ui.grid.pagination',
														'ngCookies']);

angular.module('grievancesystem').constant('API_URL',baseUrl);
/*
var grievancesystem = angular.module('grievancesystem',['ngRoute',
														'ui.grid',
														'ui.grid.edit',
														'ui.grid.cellNav',
														'ui.grid.autoResize',
														'ui.bootstrap',
														'ui.grid.pagination']);
*/

grievancesystem.config(function ($routeProvider) {
	
	$routeProvider.when('/',{
		templateUrl:'/views/templates/homeTemplate.php',
		controller:'appController'
	})
	.when('/login',{
		templateUrl:'/views/templates/login.php',
		controller:'appController'
	})
	.when('/aicte',{
		templateUrl:'/views/templates/aicteTemplate.php',
		controller:'aicteController'
	})
	.when('/ombudsman',{
		templateUrl:'/views/templates/ombudsmanTemplate.php',
		controller:'ombudsmanController'
	})
	.when('/principal',{
		templateUrl:'/views/templates/principalTemplate.php',
		controller:'principalController'
	})
	.when('/committee',{
		templateUrl:'/views/templates/committeeTemplate.php',
		controller:'committeeController'
	})
	.when('/student',{
		templateUrl:'/views/templates/studentTemplate.php',
		controller:'studentController'
	})
	.when('/vendor',{
		templateUrl:'/views/templates/vendorTemplate.php',
		controller:'vendorController'
	})		
	.otherwise({
		redirectTo:'/'
	})
});

