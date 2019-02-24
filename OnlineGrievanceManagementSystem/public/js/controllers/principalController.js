// Controller for principal
var grievancesystem= angular.module('grievancesystem');
grievancesystem.controller('principalController',principalController);


 function principalController($scope,$http,appService,principalService,API_URL,$location) {
   
 	$scope.page='dashboard_principal';
    $scope.username='principal Name';
    $scope.college_name='CV Raman College of Engineering';

 	//load grievance panel
     $scope.total = 0;
    $scope.pending = 0;
    $scope.escalated = 0;
    $scope.resolved = 0;

    $scope.loadGrievanceStatistics=function(){
        $http.get(API_URL+"grievance/aicte/statistics/total").then(function(response){
                $scope.total = response.data.message;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"grievance/aicte/statistics/resolved").then(function(response){
                $scope.resolved = response.data.message;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"grievance/aicte/statistics/pending").then(function(response){
                $scope.pending = response.data.message;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"grievance/aicte/statistics/escalated").then(function(response){
                $scope.escalated = response.data.message;
            },function(errorResponse){
                console.log(errorResponse);
            });
    }
    $scope.loadGrievanceStatistics();
    // grievance statistics ends

        

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
                $scope.seek_grievance_data = [
                    {
                        "id":"1",
                        "student_details":"1",
                        "type":"1",
                        "description":"1",
                        "documents":"1",
                        "eta":"1",
                        "action":"1"
                    },
                    {
                        "id":"1",
                        "student_details":"1",
                        "type":"1",
                        "description":"1",
                        "documents":"1",
                        "eta":"1",
                        "action":"0"
                    },
                   
                ];
                $scope.escalated_grievance_data = [
                   {
                       "id":"1",
                       "student_details":"1",
                       "type":"1",
                       "description":"1",
                       "documents":"1",
                       "eta":"1",
                       "action":1
                   },
                  
               ];
               
               $scope.resolved_grievance_data = [
                   {
                       "id":"1",
                       "student_details":"1",
                       "type":"1",
                       "description":"1",
                       "documents":"1",
                       "eta":"1",
                       "closing_date":"1",
                       "closing_status":"1",
                       
                   },
                  
               ];
               
               
               
                $scope.numRows = 3;
               
                $scope.seek_grievance = {
                   data:$scope.seek_grievance_data,
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
                           {name :"student_details" ,displayName: 'Student Details' ,cellTemplate: '/views/cellTemplate/committee_student_details.html', width: "10%"},
                           { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
                           { name:"description" ,displayName: 'Description', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
                           {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html",width:"12%"  },
                           {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
                           {name:"connects", displayName: 'Connects' ,cellTemplate: '/views/cellTemplate/principal_connects.html',width:"20%"},
                           {name:"action",displayName: 'Action',cellTemplate: "/views/cellTemplate/principal_take_action.html",width:"10%"  },
                           
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
                       { name : "id", cellTemplate: '/views/cellTemplate/cell.html',headerCellTemplate: '<div class="">Grievance <br>ID </div>',width:"10%"},
                       {name :"student_details", headerCellTemplate: '<div class="">Student <br>Details </div>',cellTemplate: '/views/cellTemplate/committee_student_details.html', width: "10%"},
                       { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html',width:"10%"},
                       { name:"description" ,displayName: 'Description', cellTemplate: '/views/cellTemplate/cell.html',width:"17%"},
                       {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html",width:"10%"  },
                       {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html',width:"13%"},
                       {name:"connect",displayName: 'Connect',cellTemplate: "/views/cellTemplate/principal_connects.html",width:"20%"  },

                       {name:"status",displayName: 'Status',cellTemplate: "/views/cellTemplate/cell.html",width:"10%"  },
                       
                   ],     
               
                              
                   };
               
                   $scope.resolved_grievance = {
                       data:$scope.resolved_grievance_data,
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
                   {name :"student_details" ,displayName: 'Student Details' ,cellTemplate: '/views/cellTemplate/committee_student_details.html', width: "10%"},
                   { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
                   { name:"description" ,displayName: 'Description', cellTemplate: '/views/cellTemplate/cell.html',width:"20%"},
                   {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html",width:"12%"  },
                   {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
                   {name:"closing_date",displayName: 'Closing Date',cellTemplate: "/views/cellTemplate/cell.html",width:"12%"  },
                   {name:"closure_status",displayName: 'Closure Status',cellTemplate: "/views/cellTemplate/cell.html",width:"10%"  },
                         
                                   ],
               
                          
               };
               
               //view Grievance
               
               //grievance search
                   $scope.grievance_search_data=[];
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
                           { name:"student_details" ,displayName: 'Student Details', cellTemplate: '/views/cellTemplate/committee_student_details.html '},
                           { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html '},
                           {name :"description" ,displayName: 'Description' ,cellTemplate: '/views/cellTemplate/cell.html', },
                           {name :"committee" ,displayName: 'Committee' ,cellTemplate: '/views/cellTemplate/cell.html',  },
                           {name :"created_at" ,displayName: 'Date of Issue' ,cellTemplate: '/views/cellTemplate/cell.html' },
                           {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html '},
               
               
                           {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html"  },
                           {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html '},
                           
                                   ],
               
                                
               };
                   
               //Search Grievance     
               
               
               //take action

               $scope.takeAction = function(id)
               {

               }
                
   
                
}

