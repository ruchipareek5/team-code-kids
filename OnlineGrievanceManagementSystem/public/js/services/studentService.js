var grievancesystem=angular.module('grievancesystem');

grievancesystem.service('studentService',function ($http,API_URL) {
	
	this.searchGrievance=function (searchId) {
		var url=API_URL+'grievanceSearch/'+searchId;
		return $http.get(url);

	}

	this.getGrievance=function (type) {
		var url = API_URL + '/grievance/student/'+type;
		return $http.get(url);

	}

	this.action_grievance = function(data)
	{
		
        console.log(data.action);
		var request = {
                'method': 'POST',
                'url': API_URL+"grievances/updateStatus",
                'data': data,
            };
     
            return $http(request)
	}
	
});