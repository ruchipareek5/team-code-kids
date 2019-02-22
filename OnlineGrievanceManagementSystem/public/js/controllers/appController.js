

// Controller for grievancesystem i.e., main controller
grievancesystem.controller('appController',function($scope,$http,$location,API_URL,$cookies,$window,appService){
	$scope.page_tab='login';
	$scope.login = {};
	$http.defaults.headers.common.Authorization = $cookies.get('Auth');

	$scope.doLoginAttempt =  function(){
	$http.defaults.headers.common.Authorization = "Basic " + btoa([$scope.login.email, $scope.login.password].join(':'));
	$http.post(API_URL + "login", $scope.login).then(function(response){
		if (response.data == "aicte") {
			$location.path('/aicte');
		}else if (response.data == "student") {
			$location.path('/student');
		}else {
			alert('Template Not Available');
		}
		
	},function(errorResponse){
		if (errorResponse.data.message) {
			alert(errorResponse.data.message);
		}else
		alert('Sorry! username password doesnot match');

	});
	
	};
	
	$scope.doLogin = function(){
		$scope.authHeader = "Basic " + btoa([$scope.login.email, $scope.login.password].join(':'));
		$cookies.put('Auth',$scope.authHeader);
		$scope.doLoginAttempt();
	}

	$scope.logout = function(){
			$cookies.put('Auth',null);
			$location.path('/');
	}

	 // grievances action starts
    $scope.downloadAttachment=function(path){

       var url = API_URL+'grievance/download/'+path;
       $window.open(url);
    }
    // grievances action ends

    // grievance remakrs starts
    $scope.remarkMessage='';
    $scope.viewRemarks=function(id){
		
    	var url = API_URL+'grievance/remarks/'+id;
    	$http.get(url).then(function(success){
    		$scope.remarkMessage=success.data.message;
    		$('#modal-conatiner').addClass('visible');
    	},
    	function(error){

    	});
    }

    // grievance remakrs starts


	// comment add starts
	$scope.addComment=function(id,commentMsg){
		
		// var url = API_URL+'aicte/addComment';
		var formData = new FormData();
		 formData.append('id',id);
         formData.append('message', commentMsg);
		 var request = {
                method: 'POST',
                url: API_URL+"aicte/addComment",
                data: formData,
                headers: {
                    'Content-Type': undefined
                }
            };
    	$http(request).then(function(success){
    		appService.showAlert('success',success.data.message)

    	},
    	function(error){
    		appService.showAlert('error',error.data.message)

    	});
		
    	
    }

});

