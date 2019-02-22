var grievancesystem=angular.module('grievancesystem');

grievancesystem.service('aicteService',function ($http,API_URL) {
	


	this.getGrievance=function () {
		var url = API_URL + 'aicte/grievances';
		return $http.get(url);

    }
    
    


	
});