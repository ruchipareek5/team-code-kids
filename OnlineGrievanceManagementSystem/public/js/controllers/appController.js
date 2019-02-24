

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
		}else if (response.data == "committee member") {
			$location.path('/committee');
		}else if (response.data == "principal") {
			$location.path('/principal');
		}else if (response.data == "ombudsman") {
			$location.path('/ombudsman');
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
    $scope.comment_numRows=10;

     $scope.comment_history = {
        data:$scope.open_grievance_data,
        enableGridMenus:false,
        enableSorting: false,
        enableFiltering:false,
        enableCellEditing:false,
        enableColumnMenus: false,
        enableHorizontalScrollbar:0,
        enableVerticalScrollbar:0,
        paginationPageSize: $scope.numRows,
        minRowsToShow: $scope.numRows,
        enablePaginationControls: false,
		
		  columnDefs: [
            { name : "grievance_id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html',width:"20%"},
            {name :"updated_at" ,displayName: 'Date' ,cellTemplate: '/views/cellTemplate/cell.html', width: "20%"},
            { name:"message" ,displayName: 'Comment', cellTemplate: '/views/cellTemplate/cell.html',width:"40%"},
            {name:"sender_id", displayName: 'Commented By' ,cellTemplate: '/views/cellTemplate/cell.html',width:"20%"},
            
        ],

            
         };
    $scope.comment_history_data=new Array();

    $scope.viewRemarks=function(id){
		
    	var url = API_URL+'grievance/remarks/'+id;
    	$http.get(url).then(function(success){

    		$('#modal-container').addClass('visible');
    		console.log(success.data.message);
    		$scope.comment_history.data=success.data.message;
    	},
    	function(error){
            $scope.grievance_search.data=new Array();
             appService.showAlert('error',error.data.message);

    	});
    }

    // grievance remakrs starts


	// comment add starts
	$scope.comment={};
	$scope.addComment=function(id){
			$('#commentModal-container').addClass('visible');
		
		$scope.comment.gid=id;
	}

	$scope.addCommentAPI=function(comment){
		
		$('#commentModal-container').removeClass('visible');
		var formData = new FormData();
		 formData.append('grievance_id',comment.gid);
         formData.append('message', comment.message);
		 var request = {
                method: 'POST',
                url: API_URL+"grievance/addComment",
                data: formData,
                headers: {
                    'Content-Type': undefined
                }
            };
    	$http(request).then(function(success){
    		appService.showAlert('success',success.data.message);

    	},
    	function(error){
    		appService.showAlert('error',error.data.message)

    	});
		
    	
	}
	
	$scope.view_student_details=function(id)
	{
		alert(id);
	}

});

