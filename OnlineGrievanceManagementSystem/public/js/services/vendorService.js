var grievancesystem=angular.module('grievancesystem');

grievancesystem.service('vendorService',function ($http,API_URL) {
	


	this.getGrievance=function (type) {
		var url = API_URL + 'vendor/getGrievances/'+type;
		return $http.get(url);

		}
		
	this.searchGrievance=function (searchId) {
		var url=API_URL+'principal/grievance/'+searchId;
		return $http.get(url);

	}

	this.institute_search=function(institute_id){
		var url =API_URL + 'grievance/aicte/importantinfo/institute/'+ institute_id;
		return $http.get(url);
	}

	this.university_search=function(university_id){
		var url =API_URL + 'grievance/aicte/importantinfo/university/'+ university_id;
		return $http.get(url);
	}

	this.approvedGrant = function(gid){
		var formData = new FormData();
           formData.append('id',gid);
           var request = {
                      method: 'POST',
                      url: API_URL+"principal/grantApproval",
                      data: formData,
                      headers: {
                          'Content-Type': undefined
                      }
                  };
                  console.log(gid);
          return $http(request)
	}
	
});

			