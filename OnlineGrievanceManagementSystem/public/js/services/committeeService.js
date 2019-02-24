var grievancesystem=angular.module('grievancesystem');

grievancesystem.service('committeeService',function ($http,API_URL) {
	


	this.getGrievance=function (type) {
		var url = API_URL + 'committee/grievances/'+type;
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

	this.takeAction = function(gid)
	{
		var formData = new FormData();
		formData.append('id',gid);
		var request = {
                'method': 'POST',
                'url': API_URL+"committee/takeAction",
                'data': formData,
                headers: {
                    'Content-Type': undefined
                }
            };
     
            return $http(request);
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