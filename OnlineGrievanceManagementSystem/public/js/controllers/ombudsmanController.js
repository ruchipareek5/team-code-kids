// Controller for ombudsman
var grievancesystem= angular.module('grievancesystem');
grievancesystem.controller('ombudsmanController',ombudsmanController);


 function ombudsmanController($scope,$http,appService,ombudsmanService,API_URL,$location) {
$scope.page='dashboard_ombudsman';
    $scope.username='ombudsman Name';
    $scope.university_name='BPUT';

 	//load grievance panel
     $scope.total = 0;
    $scope.open = 0;
    $scope.escalated = 0;
    $scope.addressed = 0;

    $scope.loadGrievanceStatistics=function(){
        $http.get(API_URL+"grievance/ombudsman/statistics/total").then(function(response){
                $scope.total = response.data.message;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"grievance/ombudsman/statistics/addressed").then(function(response){
                $scope.addressed = response.data.message;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"grievance/ombudsman/statistics/open").then(function(response){
                $scope.open = response.data.message;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"grievance/ombudsman/statistics/escalated").then(function(response){
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
    //grievance
                $scope.open_grievance_data=new Array()
                ombudsmanService.getGrievance().then(function(success)
                 {   
                        $scope.open_grievance_data = success.data.message;
                        $scope.open_grievance.data = $scope.open_grievance_data;
                    }, function(error)
                 {

                  });


         ///View Grievance
              $scope.open_grievance_data =new Array();
              $scope.loadAllGrievance=function(){
                      $scope.open_grievance_data =new Array();
                  ombudsmanService.getGrievance('seeking').then(function(success)
                   {   
                          $scope.open_grievance_data = success.data.message;
                          $scope.open_grievance.data = $scope.open_grievance_data;
                      }, function(error){

                    });                
          }
          $scope.loadAllGrievance();

          // grievance ends
               
               
        $scope.numRows = 15;
        
         $scope.open_grievance = {
            data:$scope.open_grievance_data,
                enableGridMenus:false,
                enableSorting: false,
                enableFiltering:false,
                enableCellEditing:false,
                enableColumnMenus: false,
                enableHorizontalScrollbar:0,
                enableVerticalScrollbar:0,
                totalItems: $scope.open_grievance_data.length,
                paginationPageSize: $scope.numRows,
                minRowsToShow: $scope.open_grievance_data.length < $scope.numRows ? $scope.open_grievance_data : $scope.numRows,
                enablePaginationControls: false,
                

                columnDefs: [
                    { name : "id",displayNameName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html', width:"10%"},
                    { name:"student_id" ,displayName: 'Student Id', cellTemplate: '/views/cellTemplate/cell.html ', width:"11%"},
                    { name:"college_id" ,displayName: 'College ID',  cellTemplate: '/views/cellTemplate/cell.html', width:"11%"},
                    {name :"type" ,displayName: 'Grievance Type' ,cellTemplate: '/views/cellTemplate/cell.html' , width:"12%"},
                    {name:"created_at", displayName: 'Data of Issue' ,cellTemplate: '/views/cellTemplate/cell.html ', width:"13%"},
                    {name:"eta" ,displayName: 'ETA', cellTemplate: '/views/cellTemplate/cell.html ', width:"13%"},
                    {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html" , width:"10%" },
                    {name:"connect",displayName: 'Connect', cellTemplate: "/views/cellTemplate/ombudsman_connect.html", width:"20%"},
                    
                            ],
    
                    
                 };


              //Grievance
              //Grievance Search

                        $scope.grievance_search_data =[];
                        $scope.searchGrievance = function(grievanceFilter,searchKeyword){

                        ombudsmanService.searchGrievance(grievanceFilter,searchKeyword).then(function(success){
                            $scope.grievance_search_result.data=new Array();
                             $scope.grievance_search_data=success.data.message;  
                             console.log(success.data.message);  
                             $scope.grievance_search_result.data=$scope.grievance_search_data;             
                            },
                            function(error){
                                $scope.grievance_search_result.data=new Array();
                                 appService.showAlert('error','Result Not Found');
                            });

                    };
            
                        $scope.grievance_search_result = {
                            data:$scope.grievance_search_data,
                            enableGridMenus:false,
                            enableSorting: false,
                            enableFiltering:false,
                            enableCellEditing:false,
                            enableColumnMenus: false,
                            enableHorizontalScrollbar:0,
                            enableVerticalScrollbar:0,
                            totalItems: $scope.grievance_search_data.length,
                            paginationPageSize: $scope.numRows,
                            minRowsToShow: $scope.grievance_search_data.length < $scope.numRows ? $scope.grievance_search_data : $scope.numRows,
                            enablePaginationControls: false,

                    columnDefs: [
                                { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html', width:"12.5%" },
                                { name:"college_id" ,displayName: 'College Id',  cellTemplate: '/views/cellTemplate/cell.html', width:"12.5%"},
                                {name :"type" ,displayName: 'Grievance Type' ,cellTemplate: '/views/cellTemplate/cell.html' , width:"12.5%"},
                                {name :"created_at" ,displayName: 'Date of Issue' ,cellTemplate: '/views/cellTemplate/cell.html', width:"12.5%" },
                                {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html ', width:"12.5%"},
                                {name:"documents" ,displayName: 'Attachment', cellTemplate: '/views/cellTemplate/attachment.html ', width:"12.5%"},
                                {name:"comments",displayName: 'Comments',cellTemplate: "/views/cellTemplate/ombudsman_connects.html", },
                                
                                        ],
                
                                
                    };
        
//Grievance Search
// $scope.open_grievance_data = [
//     {
//         "id":"1",
//         "student_details":"1",
//         "type":"1",
//         "description":"1",
//         "documents":"1",
//         "eta":"1",
//         "action":1
//     },
   
// ];
// $scope.in_action_grievance_data = [
//    {
//        "id":"1",
//        "student_details":"1",
//        "type":"1",
//        "description":"1",
//        "documents":"1",
//        "eta":"1",
//        "action":1
//    },
  
// ];

// $scope.resolved_grievance_data = [
//    {
//        "id":"1",
//        "student_details":"1",
//        "type":"1",
//        "description":"1",
//        "documents":"1",
//        "eta":"1",
//        "closing_date":"1",
//        "closing_status":"1",
       
//    },
  
// ];



$scope.numRows = 3;

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
           {name :"student_details" ,displayName: 'Student details' ,cellTemplate: '/views/cellTemplate/student_details.html', width: "13%"},
           { name:"college_id" ,displayName: 'College ID',  cellTemplate: '/views/cellTemplate/cell.html',width:"10%"},
           { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
           {name :"created_at" ,displayName: 'Date of Issue' ,cellTemplate: '/views/cellTemplate/cell.html' ,width:"13%"},
            {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html',width:"10%"},
           {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html",width:"10%"  },
           {name:"connect",displayName: 'Connect',cellTemplate: "/views/cellTemplate/ombudsman_connects.html",width:"20%"  },

       ],

           
        };


//view Grievance

//grievance search

   $scope.grievance_search_data=[{"comments":1}];
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
           { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
           { name:"college_id" ,displayName: 'College Id', cellTemplate: '/views/cellTemplate/cell.html ',width:"14%"},
           { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html ',width:"14%"},
       
           {name :"created_at" ,displayName: 'Date of Issue' ,cellTemplate: '/views/cellTemplate/cell.html',width:"14%" },
           {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html ', width:"14%"},


           {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html" ,width:"12%" },
           {name:"comments" ,displayName: 'Comments', cellTemplate: '/views/cellTemplate/ombudsman_connects.html ', width:"20%"},
           
                   ],

                
};
   
//Search Grievance              


    
                
   
                
}

