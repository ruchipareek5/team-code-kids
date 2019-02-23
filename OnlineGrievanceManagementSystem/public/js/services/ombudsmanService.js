var grievancesystem=angular.module('grievancesystem');

grievancesystem.service('ombudsmanService',function ($http,API_URL) {

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

	this.institute_search=function(institute_id){
		var url =API_URL + 'grievance/aicte/importantinfo/institute/'+ institute_id;
		return $http.get(url);
	}

	this.university_search=function(university_id){
		var url =API_URL + 'grievance/aicte/importantinfo/university/'+ university_id;
		return $http.get(url);
	}
	
});