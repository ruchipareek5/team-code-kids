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
                                {name:"document",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html"  },
                                {name:"remarks",displayName: 'Grievance Remarks', cellTemplate: "/views/cellTemplate/aicte_remarks.html"},
                                {name:"comment",displayName:'Comment',cellTemplate:"/views/cellTemplate/aicte_comment.html"}
                                        ],
                
                                
                             };


//Grievance


                             $scope.grievance_search=[
                                {
                                    "grievance_id":"1",
                                    "Grievance_type":"1",
                                    "assigned_committee":"1",
                                    "data_of_issue":"1",
                                    "employed":"1",
                                    "eta":"1",
                                    "status":"1",
                                    "action_taken_on":"1",
                                    "action":"1",
                                    "attachment":"1",

                             }];
                             
                
                        $scope.grievance_search = {
                            data:$scope.grievance_search,
                            enableGridMenus:false,
                            enableSorting: false,
                            enableFiltering:false,
                            enableCellEditing:false,
                            enableColumnMenus: false,
                            enableHorizontalScrollbar:0,
                            enableVerticalScrollbar:0,
                            totalItems: $scope.grievance_search.length,
                            paginationPageSize: $scope.numRows,
                            minRowsToShow: $scope.grievance_search.length < $scope.numRows ? $scope.grievance_search : $scope.numRows,
                            enablePaginationControls: false,

                    columnDefs: [
                                { name : "grievance_id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html' },
                                { name:"Grievance_type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html '},
                                { name:"assigned_committee" ,displayName: 'Assigned Committee',  cellTemplate: '/views/cellTemplate/cell.html'},
                                {name :"data_of_issue" ,displayName: 'Date of Issue' ,cellTemplate: '/views/cellTemplate/cell.html' },
                                {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html '},
                                {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html '},
                                {name:"attachment",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html"  },
                                
                                        ],
                
                                
                    };
                    $scope.university_data=[];
                    $scope.manage_ombudsman = {
                        data:$scope.university_data,
                        enableGridMenus:false,
                        enableSorting: false,
                        enableFiltering:false,
                        enableCellEditing:false,
                        enableColumnMenus: false,
                        enableHorizontalScrollbar:0,
                        enableVerticalScrollbar:0,
                        totalItems: $scope.university_data.length,
                        paginationPageSize: $scope.numRows,
                        minRowsToShow: $scope.university_data.length < $scope.numRows ? $scope.university_data : $scope.numRows,
                        enablePaginationControls: false,
            
                columnDefs: [
                            { name : "application_id",displayName: 'Applicant name', cellTemplate: '/views/cellTemplate/cell.html' },
                            { name:"university" ,displayName: 'University', cellTemplate: '/views/cellTemplate/cell.html '},
                            { name:"university_code" ,displayName: 'University Code',  cellTemplate: '/views/cellTemplate/cell.html'},
                            {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html '},
                            {name:"attachment",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html "  },
                            {name:"action",displayName: 'Action',cellTemplate: "/views/cellTemplate/aicte_ombuds_action.html"  },
                                
                                    ],
            
                            
                };
                
                
                $scope.history = {
                    data:$scope.university_data,
                    enableGridMenus:false,
                    enableSorting: false,
                    enableFiltering:false,
                    enableCellEditing:false,
                    enableColumnMenus: false,
                    enableHorizontalScrollbar:0,
                    enableVerticalScrollbar:0,
                    totalItems: $scope.university_data.length,
                    paginationPageSize: $scope.numRows,
                    minRowsToShow: $scope.university_data.length < $scope.numRows ? $scope.university_data : $scope.numRows,
                    enablePaginationControls: false,
        
            columnDefs: [
                        { name : "application_id",displayName: 'Applicant name', cellTemplate: '/views/cellTemplate/cell.html' },
                        { name:"university" ,displayName: 'University', cellTemplate: '/views/cellTemplate/cell.html '},
                        { name:"university_code" ,displayName: 'University Code',  cellTemplate: '/views/cellTemplate/cell.html'},
                        {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html '},
                        {name:"attachment",displayName: 'Attachment',cellTemplate: "<div class='ui-grid-cell-contents cell div-click'><img src='assets/images/attachment.png' height=16 width=16' value='{{COL_FIELD CUSTOM_FILTERS}}'></div> "  },
                        {name:"action",displayName: 'Action',cellTemplate: "<div class='ui-grid-cell-contents cell div-click'><img src='assets/images/attachment.png' height=16 width=16' value='{{COL_FIELD CUSTOM_FILTERS}}'></div>  "  },
                            
                                ],
        
                        
            };
                
            $scope.university_search_data=[];
            $scope.university_search = {
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
                    { name : "university_code",displayName: 'University Code', cellTemplate: '/views/cellTemplate/cell.html' },
                    { name:"university" ,displayName: 'University', cellTemplate: '/views/cellTemplate/cell.html '},
                    { name:"university_type" ,displayName: 'university_type',  cellTemplate: '/views/cellTemplate/cell.html'},
                    {name:"ombudsman" ,displayName: 'Ombudsman', cellTemplate: '/views/cellTemplate/cell.html '},
                    {name:"total_grievance",displayName: 'Total Grievance',cellTemplate: '/views/cellTemplate/cell.html '  },
                    {name:"pending_grievance",displayName: 'Pending Grievance',cellTemplate: '/views/cellTemplate/cell.html '  },
                    {name:"ongoing_grievance",displayName: 'Ongoing Grievance',cellTemplate: '/views/cellTemplate/cell.html '  },
                       
                            ],
    
                    
        };


    
                
   
                
}

