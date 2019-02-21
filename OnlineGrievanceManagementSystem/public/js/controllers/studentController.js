
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
    
    $scope.total_grievance_date = "Yesterday 02:30PM"
    $scope.pending_grievance_date = "Today 03:00PM"
    $scope.satisfied_grievance_date = "25 Nov 05:30PM"
    $scope.ongoing_grievance_date = "Yesterday 02:30PM"

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
            $scope.grievance_search.data=new Array();
            $scope.grievance_search_data=success.data.message;
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

    $scope.lodgeGrievanceStatistics=function(){
        $http.get(API_URL+"grievance/total").then(function(response){
                $scope.total = response.data.value;
                console.log($scope.total);
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"grievance/satisfied").then(function(response){
                $scope.satisfied = response.data.value;
                console.log($scope.satisfied);
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"grievance/pending").then(function(response){
                $scope.pending = response.data.value;
                console.log($scope.pending);
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"grievance/escalated").then(function(response){
                $scope.escalated = response.data.value;
                console.log($scope.escalated);
            },function(errorResponse){
                console.log(errorResponse);
            });
    }
    $scope.lodgeGrievanceStatistics();
    // grievance statistics ends



    // lodge grievance starts

        $scope.grievance = {};
        $scope.errors = "";
        var formData = new FormData();
        
        $scope.lodgeGrievance = function () {
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
                    $scope.lodgeGrievanceStatistics();
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
            $scope.escalated_grievance_data =new Array();
            $scope.grievance_resolved_data =new Array();
            $scope.loadAllGrievance=function(){
                    $scope.open_grievance_data =new Array();
                    $scope.grievance_data =new Array();
                    $scope.grievance_resolved_data =new Array();
                studentService.getGrievance('pending').then(function(success)
                 {   
                        $scope.open_grievance_data = success.data.message;
                        $scope.open_grievance.data = $scope.open_grievance_data;
                    }, function(error)
                 {

                  });

                studentService.getGrievance('escalated').then(function(success)
                 {   
                   $scope.escalated_grievance_data = success.data.message;
                     $scope.escalated_grievance.data = $scope.escalated_grievance_data;

                    }, function(error)
                 {

                  });

                studentService.getGrievance('resolved').then(function(success)
                 {   
                   $scope.grievance_resolved_data = success.data.message;
                     $scope.grievance_resolved.data = $scope.grievance_resolved_data;

                    }, function(error)
                 {

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
                { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html' },
                { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html'},
                { name:"assigned_committee" ,displayName: 'Assigned Committee',  cellTemplate: '/views/cellTemplate/cell.html'},
                {name :"created_at" ,displayName: 'Date of Issue' ,cellTemplate: '/views/cellTemplate/cell.html' },
                {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html'},
                {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html '},
                {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html"  },
                { name:"remarks" ,displayName: 'Remarks',  cellTemplate: '/views/cellTemplate/student_remarks.html'},
                {name:"action",displayName: 'Action', cellTemplate: "/views/cellTemplate/student_action.html"},
                        ],

                
             };

             $scope.escalated_grievance = {
                data:$scope.escalated_grievance_data,
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
                    { name:"assigned_committee" ,displayName: 'Assigned Committee',  cellTemplate: '/views/cellTemplate/cell.html'},
                    {name :"created_at" ,displayName: 'Escalated On' ,cellTemplate: '/views/cellTemplate/cell.html' },
                    {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html '},
                    {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html '},
                    {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html"  },
                    { name:"remarks" ,displayName: 'Remarks',  cellTemplate: '/views/cellTemplate/student_remarks.html'},
                            ],
    
                   
        };

        $scope.grievance_resolved = {
            data:$scope.grievance_resolved_data,
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
                { name:"assigned_committee" ,displayName: 'Assigned Committee',  cellTemplate: '/views/cellTemplate/cell.html'},
                {name :"created_at" ,displayName: 'Escalated On' ,cellTemplate: '/views/cellTemplate/cell.html' },
                {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html '},
                {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html '},
                {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html"  },
                { name:"remarks" ,displayName: 'Remarks',  cellTemplate: '/views/cellTemplate/student_remarks.html'},

                
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
            minRowsToShow: 1,
            enablePaginationControls: false,


    columnDefs: [
                { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html' },
                { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html '},
                { name:"assigned_committee" ,displayName: 'Assigned Committee',  cellTemplate: '/views/cellTemplate/cell.html'},
                {name :"created_at" ,displayName: 'Date of Issue' ,cellTemplate: '/views/cellTemplate/cell.html' },
                {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html '},
                {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html '},
                {name:"remarks" ,displayName: 'Remarks',  cellTemplate: '/views/cellTemplate/student_remarks.html'},
                {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html"  },
                
                        ],

                
    };

    $scope.action = function(gid,action)
    {
        
        $scope.data={
            "id":gid,
            "action":action
        };
         studentService.action_grievance($scope.data).then(
            function(success)
            {
                $scope.loadAllGrievance();
                $scope.lodgeGrievanceStatistics();
                alert("success "+success.data.message+" "+$scope.data.id);

            },
            function(error)
            {
                appService.showAlert('error',error.data.message );
            }
        )
    }




};
