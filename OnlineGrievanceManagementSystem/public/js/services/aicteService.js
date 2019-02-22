var grievancesystem=angular.module('grievancesystem');

grievancesystem.service('aicteService',function ($http,API_URL) {
	


	this.getGrievance=function () {
		var url = API_URL + 'aicte/grievances';
		return $http.get(url);

		}
		
	this.searchGrievance=function(t,d) {
		var url = API_URL + 'aicte/grievanceSearch';
		return $http({
		    'url': url, 
		    method: "GET",
		    params: {
		    	'type': t,
		    	'data':d
		    }
		 	});
		}
	
});