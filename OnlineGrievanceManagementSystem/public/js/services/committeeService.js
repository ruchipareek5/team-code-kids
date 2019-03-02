var grievancesystem=angular.module('grievancesystem');

grievancesystem.service('committeeService',function ($http,API_URL) {
	


	this.getGrievance=function (type) {
		var url = API_URL + 'committee/grievances/'+type;
		return $http.get(url);

		}
		
	this.searchGrievance=function (searchId) {
		var url=API_URL+'committee/grievanceSearch/'+searchId;
		return $http.get(url);

	}
	this.seekForApproval = function(gid){
		var formData = new FormData();
		formData.append('id',gid);
		var request = {
                'method': 'POST',
                'url': API_URL+"/committee/sfa",
                'data': formData,
                headers: {
                    'Content-Type': undefined
                }
            };
     
            return $http(request);
	}

	this.sendForPurchase = function(gid){
		var formData = new FormData();
		formData.append('id',gid);
		var request = {
                'method': 'POST',
                'url': API_URL+"/committee/sfp",
                'data': formData,
                headers: {
                    'Content-Type': undefined
                }
            };
     
            return $http(request);
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

	this.markAddressed = function(gid){
		var formData = new FormData();
		formData.append('id',gid);
		var request = {
                'method': 'POST',
                'url': API_URL+"committee/markAddressed",
                'data': formData,
                headers: {
                    'Content-Type': undefined
                }
            };
     
            return $http(request);
	}
	
});