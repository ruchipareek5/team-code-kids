 // Controller for AICTE user
var grievancesystem= angular.module('grievancesystem');
grievancesystem.controller('aicteController',aicteController);


 function aicteController($scope,$http,appService,aicteService,API_URL) {
 	$scope.page='dashboard_aicte';

 	$scope.total_grievances = 38989;
 	$scope.pending_grievance = 189;
    $scope.satisfied_grievance = 400;
    $scope.ongoing_grievance = 380;

 	$scope.total_grievance_date = "Yesterday : 02:30 PM"
    $scope.pending_grievance_date = "5th Jan, 19 : 02:30 PM"
    $scope.satisfied_grievance_date = "25th Nov, 18 : 03:00 PM"
    $scope.ongoing_grievance_date = "Today : 12:00 PM"

        

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
                aicteService.getGrievance().then(function(success)
                 {   
                        $scope.open_grievance_data = success.data.message;
                        $scope.open_grievance.data = $scope.open_grievance_data;
                    }, function(error)
                 {

                  });



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
                                { name : "id",displayNameName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html' },
                                { name:"student_id" ,displayName: 'Student Id', cellTemplate: '/views/cellTemplate/cell.html '},
                                { name:"college_id" ,displayName: 'College ID',  cellTemplate: '/views/cellTemplate/cell.html'},
                                {name :"type" ,displayName: 'Grievance Type' ,cellTemplate: '/views/cellTemplate/cell.html' },
                                {name:"created_at", displayName: 'Data of Issue' ,cellTemplate: '/views/cellTemplate/cell.html '},
                                {name:"eta" ,displayName: 'ETA', cellTemplate: '/views/cellTemplate/cell.html '},
                                {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html"  },
                                {name:"remarks",displayName: 'Grievance Remarks', cellTemplate: "/views/cellTemplate/aicte_remarks.html"},
                                {name:"comment",displayName:'Comment',cellTemplate:"/views/cellTemplate/aicte_comment.html"}
                                        ],
                
                                
                             };


//Grievance
//Grievance Search

                        $scope.grievance_search_data=[]
                        $scope.searchGrievance = function(grievanceFilter,searchKeyword){

                        aicteService.searchGrievance(grievanceFilter,searchKeyword);

                        } ;
                        

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
                                { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html' },
                                { name:"student_id" ,displayName: 'Student Id', cellTemplate: '/views/cellTemplate/cell.html '},
                                { name:"college_id" ,displayName: 'College Id',  cellTemplate: '/views/cellTemplate/cell.html'},
                                {name :"type" ,displayName: 'Grievance Type' ,cellTemplate: '/views/cellTemplate/cell.html' },
                                {name :"created_at" ,displayName: 'Date of Issue' ,cellTemplate: '/views/cellTemplate/cell.html' },
                                {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html '},
                                {name:"documents" ,displayName: 'Attachment', cellTemplate: '/views/cellTemplate/attachment.html '},
                                {name:"remarks",displayName: 'Grievance Remarks',cellTemplate: "/views/cellTemplate/aicte_remarks.html"  },
                                
                                        ],
                
                                
                    };
        
//Grievance Search

//university_search
                    
            $scope.university_search=function(university_id)
            {
                    alert(university_id)
            };
            $scope.university_search_data=[];

            $scope.university_search_result = {
                data:$scope.university_search_data,
                enableGridMenus:false,
                enableSorting: false,
                enableFiltering:false,
                enableCellEditing:false,
                enableColumnMenus: false,
                enableHorizontalScrollbar:0,
                enableVerticalScrollbar:0,
                totalItems: $scope.university_search_data.length,
                paginationPageSize: $scope.numRows,
                minRowsToShow: $scope.university_search_data.length < $scope.numRows ? $scope.university_search_data : $scope.numRows,
                enablePaginationControls: false,

    
        columnDefs: [
                    { name : "university_id",displayName: 'University Code', cellTemplate: '/views/cellTemplate/cell.html' },
                    { name:"university_name" ,displayName: 'University', cellTemplate: '/views/cellTemplate/cell.html '},
                    { name:"ombudsman_name" ,displayName: 'Ombudsman Name',  cellTemplate: '/views/cellTemplate/cell.html'},
                    {name:"ombudsman_contact" ,displayName: 'Contact Number', cellTemplate: '/views/cellTemplate/cell.html '},
                    {name:"ombudsman_email",displayName: 'Email id',cellTemplate: '/views/cellTemplate/cell.html '  },
                    {name:"open_grievance",displayName: 'Open Grievances',cellTemplate: '/views/cellTemplate/cell.html '  },
 
                            ],
    
                    
        };
//institute search

                $scope.institute_search=function(university_id)
                {
                         alert(institute_id)
                };
        $scope.institute_search_data=[];
            $scope.institute_search_result = {
                data:$scope.institute_search_data,
                enableGridMenus:false,
                enableSorting: false,
                enableFiltering:false,
                enableCellEditing:false,
                enableColumnMenus: false,
                enableHorizontalScrollbar:0,
                enableVerticalScrollbar:0,
                totalItems: $scope.institute_search_data.length,
                paginationPageSize: $scope.numRows,
                minRowsToShow: $scope.institute_search_data.length < $scope.numRows ? $scope.institute_search_data : $scope.numRows,
                enablePaginationControls: false,

    
        columnDefs: [
                    { name : "institute_id",displayName: 'Institute Code', cellTemplate: '/views/cellTemplate/cell.html' },
                    { name:"institute_name" ,displayName: 'Institute', cellTemplate: '/views/cellTemplate/cell.html '},
                    { name:"principal_name" ,displayName: 'Principal',  cellTemplate: '/views/cellTemplate/cell.html'},
                    {name:"principal_contact" ,displayName: 'Contact Number', cellTemplate: '/views/cellTemplate/cell.html '},
                    {name:"principal_email",displayName: 'Email Id',cellTemplate: '/views/cellTemplate/cell.html '  },
                    {name:"open_grievances",displayName: 'Open Grievances',cellTemplate: '/views/cellTemplate/cell.html '  },
  
                            ],
    
                    
        };

//institute search

    
                
   
                
}

