var grievancesystem=angular.module('grievancesystem');

grievancesystem.service('studentService',function ($http,API_URL) {
	
	this.searchGrievance=function (searchId) {
		var url=API_URL+'grievaceSearch/'+searchId;
		return $http.get(url);

	}

	this.open_grievances=function () {
		var url = API_URL + 'grievances/index';
		return $http.post(url);

	}


	
});