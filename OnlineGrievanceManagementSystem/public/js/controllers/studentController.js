
// Controller for student
var grievancesystem= angular.module('grievancesystem');

// directive for uploading document while lodging grievance

grievancesystem.directive('ngFiles', ['$parse', function ($parse) {
 
    function file_links(scope, element, attrs) {
        var onChange = $parse(attrs.ngFiles);
        element.on('change', function (event) {
            onChange(scope, {$files: event.target.files});
        });
    }
 
    return {
        link: file_links
    }
}]);

grievancesystem.controller('studentController',studentController);


 function studentController($scope,$http,appService,studentService,API_URL) {
 	$scope.page='dashboard_student';
   
    $scope.grievanceagainst=[{"category":"Admission Cell"},{"category":"Accounts Department"},
    {"category":"Placement & training cell"},
    {"category":"Security"},{"category":"Hostel"},{"category":"Ragging"},{"category":"Canteen"},
    {"category":"Transport"}];
        
    // grievance search starts
    $scope.searchId='';
    $scope.grievance_search_data=new Array();
    $scope.searchGrievance =  function(searchId){
        $scope.grievance_search_data=new Array();
    studentService.searchGrievance(searchId).then(function(success){
            
            console.log(success.data.message);
            $scope.grievance_search_data=success.data.message;
             $scope.grievance_search.data=[];  
            $scope.grievance_search.data.push($scope.grievance_search_data);
        },
        function(error){
            $scope.grievance_search.data=new Array();
             appService.showAlert('error',error.data.message);

        });
    
    };
    //  grievance search ends

    // grievance statistics
                $scope.total = 0;
                $scope.satisfied = 0;
                $scope.pending = 0;
                $scope.escalated = 0;

    $scope.loadGrievanceStatistics=function(){
        $http.get(API_URL+"grievance/total").then(function(response){
                $scope.total = response.data.value;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"grievance/satisfied").then(function(response){
                $scope.satisfied = response.data.value;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"grievance/pending").then(function(response){
                $scope.pending = response.data.value;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"grievance/escalated").then(function(response){
                $scope.escalated = response.data.value;
            },function(errorResponse){
                console.log(errorResponse);
            });
    }
    $scope.loadGrievanceStatistics();
    // grievance statistics ends



    // lodge grievance starts

        $scope.grievance = {};
        $scope.errors = "";
        var formData = new FormData();
        
        $scope.lodgeGrievance = function () {
             formData.append('type',$scope.grievance.type);
            formData.append('detail',$scope.grievance.detail);
            var request = {
                method: 'POST',
                url: API_URL+"grievances",
                data: formData,
                headers: {
                    'Content-Type': undefined
                }
            };
     
            $http(request)
                .then(function success(e) {
                    appService.showAlert('success',e.data.message +" having an ID "+ e.data.id);
                    $scope.files = e.data.files;
                    $scope.errors = [];
                    $scope.grievance = {};
                    $scope.grievance.selected_file='';
                    $scope.loadAllGrievance();
                    $scope.loadGrievanceStatistics();
                    var fileElement = angular.element('#attachment');
                    fileElement.value = '';
                }, function error(e) {
                    $scope.errors = e.data.errors;
                });
        };
     
        $scope.setTheFiles = function ($files) {
            angular.forEach($files, function (value, key) {
                formData.append('type',$scope.grievance.type);
                formData.append('detail',$scope.grievance.detail);
                formData.append('attachment', value);

            });
        };
    //  lodge grievance ends


    $scope.faq =[{ "ques":"how to file grievance? How we will know it is resolved",
                    "ans": "You will be notified when it will solved"},
                    { "ques":"how to file grievance? ",
                    "ans": "You will be notified when it will solved. This is test"},
                    { "ques":"how to file grievance? ",
                    "ans": "You will be notified when it will solved. This is test"},
                    { "ques":"how to file grievance? How we will know it is resolved",
                    "ans": "You will be notified when it will solved"},
                    { "ques":"how to file grievance? How we will know it is resolved",
                    "ans": "You will be notified when it will solved"},

                    
                ];

        //My grievance starts

             $scope.open_grievance_data =new Array();
            $scope.in_action_grievance_data =new Array();
            $scope.addressed_grievance_data =new Array();
            $scope.loadAllGrievance=function(){
                    $scope.open_grievance_data =new Array();
                    $scope.in_action_grievance_data =new Array();
                    $scope.addressed_grievance_data =new Array();
                studentService.getGrievance('open').then(function(success)
                 {   
                        $scope.open_grievance_data = success.data.message;
                        $scope.open_grievance.data = $scope.open_grievance_data;
                    }, function(error){

                  });

                studentService.getGrievance('inaction').then(function(success)
                 {   
                   $scope.in_action_grievance_data = success.data.message;
                     $scope.in_action_grievance.data = $scope.in_action_grievance_data;

                    }, function(error){

                  });

                studentService.getGrievance('addressed').then(function(success)
                 {   
                   $scope.addressed_grievance_data = success.data.message;
                     $scope.addressed_grievance.data = $scope.addressed_grievance_data;

                    }, function(error)                 {

                  });

              
        }

        // grievance ends

        $scope.numRows = 3;
        $scope.loadAllGrievance();
   
     $scope.open_grievance = {
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
                { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
                {name :"created_at" ,displayName: 'Lodge on' ,cellTemplate: '/views/cellTemplate/cell.html', width: "10%"},
                { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
                { name:"description" ,displayName: 'Description', cellTemplate: '/views/cellTemplate/cell.html',width:"40%"},
                {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
                {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html",width:"12%"  },
                
            ],

                
             };

             $scope.in_action_grievance = {
                data:$scope.in_action_grievance_data,
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
                    { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html', width:"12%"},
                    { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html ', width:"12%"},
                    {name :"description" ,displayName: 'Description' ,cellTemplate: '/views/cellTemplate/cell.html', width:"15%" },
                    {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html", width:"12%"  },
                    {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html ', width:"12%"},
                    { name:"comments" ,displayName: 'Comments',  cellTemplate: '/views/cellTemplate/student_comments.html', width:"25%"},
                    {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html ', width:"12%"},
                            ],
    
                   
        };

        $scope.addressed_grievance = {
            data:$scope.addressed_grievance_data,
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
        { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html', width:"10%"},
        { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html ', width:"12%"},
        {name :"description" ,displayName: 'Description' ,cellTemplate: '/views/cellTemplate/cell.html', width:"15%" },
        {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html", width:"9%"  },
        {name:"completed_at", displayName: 'Date of Complettion' ,cellTemplate: '/views/cellTemplate/cell.html ', width:"12%"},
        { name:"action" ,displayName: 'Actions',  cellTemplate: '/views/cellTemplate/student_action.html', width:"30%"},
        {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html ', width:"12%"},

                
                        ],

               
    };

        $scope.grievance_search = {
            data:$scope.grievance_search_data,
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
                { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html' },
                { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html '},
                {name :"description" ,displayName: 'Description' ,cellTemplate: '/views/cellTemplate/cell.html', width:"15%" },
                { name:"assigned_committee" ,displayName: 'Assigned Committee',  cellTemplate: '/views/cellTemplate/cell.html'},
                {name :"created_at" ,displayName: 'Date of Issue' ,cellTemplate: '/views/cellTemplate/cell.html' },
                {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html '},
                {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html '},
                {name:"comments" ,displayName: 'Comments',  cellTemplate: '/views/cellTemplate/student_search_comments.html'},
                {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html"  },
                
                        ],

                     
    };

    $scope.actionChangeStatus = function(gid)
    {
        

         studentService.action_grievance(gid).then(
            function(success)
            {
                $scope.loadAllGrievance();
                $scope.loadGrievanceStatistics();
                 appService.showAlert("success",success.data.message);

            },
            function(error)
            {
                appService.showAlert('error',error.data.message );
            }
        )
    }




};
