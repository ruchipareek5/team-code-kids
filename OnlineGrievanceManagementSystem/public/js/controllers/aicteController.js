 // Controller for AICTE user
var grievancesystem= angular.module('grievancesystem');
grievancesystem.controller('aicteController',aicteController);


 function aicteController($scope,$http,appService,aicteService,API_URL,$location) {
   
 	$scope.page='dashboard_aicte';
   $scope.username='';
    $http.get('/user/getUserName').then(function(success){
        $scope.username=success.data.message;
    },function(error){
        $scope.username='AICTE';
    });

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

        //How many grievances are pending for the university /college

        //Total number of institutes affiliated by AICTE
        $http.get(API_URL+"/aicte/getNumberOfInstitutesAffiliated").then(function(response){
            $scope.totalAffiliated = response.data;
        }, function(errorResponse){
            console.log(errorResponse);
        });
        //Total number of grievance reported
        $http.get(API_URL+"/aicte/getNumberOfGrievanceReported").then(function(response){
            $scope.totalReported = response.data;
        }, function(errorResponse){
            console.log(errorResponse);
        });

        //Total number of grievance addressd
        $http.get(API_URL+"/aicte/getNumberOfGrievanceAddressed").then(function(response){
            $scope.totalAddressed = response.data;
        },function(errorResponse){
            console.log(errorResponse);
        });

        //Total number of grievance delayed
        $http.get(API_URL+"/aicte/getNumberOfGrievanceDelayed").then(function(response){
            $scope.totalDelayed= response.data;
        },function(errorResponse){
            console.log(errorResponse);
        });

        //total number of grievance reopened
        $http.get("/aicte/getNumberOfGrievanceReOpened").then(function(response){
            $scope.totalReopened = response.data;
        },function(errorResponse){
            console.log(errorResponse);
        });

        //total number of grievance inaction
        $http.get("/aicte/getNumberOfGrievanceInAction").then(function(response){
            $scope.totalInaction = response.data;
        },function(errorResponse){
            console.log(errorResponse);
        });

        


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
            //open grievance
                $scope.open_grievance_data=new Array();
                $scope.major_grievance_data=new Array();

                aicteService.getGrievance().then(function(success)
                 {   
                        $scope.open_grievance_data = success.data.message;
                        $scope.open_grievance.data = $scope.open_grievance_data;
                    }, function(error){

                  });

                // major grievances
                aicteService.getMajorGrievance().then(function(success)
                 {   
                        $scope.major_grievance_data = success.data.message;
                        $scope.major_grievance.data = $scope.major_grievance_data;
                    }, function(error){

                  });



        $scope.numRows = 7;
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
                minRowsToShow: $scope.numRows,
                enablePaginationControls: false,
                

                columnDefs: [
                    { name : "id",displayNameName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html' , width:"10%"},
                    { name:"committee_student_details" ,displayName: 'Student Details',  cellTemplate: '/views/cellTemplate/student_details.html', width:"11%"},
                    { name:"college_id" ,displayName: 'College ID',  cellTemplate: '/views/cellTemplate/cell.html', width:"10%"},
                    {name :"type" ,displayName: 'Grievance Type' ,cellTemplate: '/views/cellTemplate/cell.html' , width:"11%"},
                    {name:"created_at", displayName: 'Data of Issue' ,cellTemplate: '/views/cellTemplate/cell.html ', width:"11%"},
                    {name:"eta" ,displayName: 'ETA', cellTemplate: '/views/cellTemplate/cell.html ', width:"11%"},
                    {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html", width:"11%"  },
                    {name:"connect",displayName: 'Connect',cellTemplate: "/views/cellTemplate/aicte_connect.html", width:"25%" },
                ],
    
                    
                 };

                 $scope.major_grievance = {
            data:$scope.major_grievance_data,
                enableGridMenus:false,
                enableSorting: false,
                enableFiltering:false,
                enableCellEditing:false,
                enableColumnMenus: false,
                enableHorizontalScrollbar:0,
                enableVerticalScrollbar:0,
                totalItems: $scope.major_grievance_data.length,
                paginationPageSize: $scope.numRows,
                minRowsToShow: $scope.numRows,
                enablePaginationControls: false,
                

                columnDefs: [
                    { name : "id",displayNameName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html' , width:"10%"},
                    { name:"committee_student_details" ,displayName: 'Student Details',  cellTemplate: '/views/cellTemplate/student_details.html', width:"11%"},
                    { name:"college_id" ,displayName: 'College ID',  cellTemplate: '/views/cellTemplate/cell.html', width:"10%"},
                    {name :"type" ,displayName: 'Grievance Type' ,cellTemplate: '/views/cellTemplate/cell.html' , width:"11%"},
                    {name:"created_at", displayName: 'Data of Issue' ,cellTemplate: '/views/cellTemplate/cell.html ', width:"11%"},
                    {name:"eta" ,displayName: 'ETA', cellTemplate: '/views/cellTemplate/cell.html ', width:"11%"},
                    {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html", width:"11%"  },
                    {name:"connect",displayName: 'Connect',cellTemplate: "/views/cellTemplate/aicte_connect.html", width:"25%" },
                ],
    
                    
                 };


//Grievance
//Grievance Search

                        $scope.grievance_search_data =[];
                        $scope.searchGrievance = function(grievanceFilter,searchKeyword){

                        aicteService.searchGrievance(grievanceFilter,searchKeyword).then(function(success){
                            $scope.grievance_search_result.data=new Array();
                            $scope.grievance_search_data = new Array();
                             $scope.grievance_search_data=success.data.message;  
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
                                { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html', width:"11%"  },
                                { name:"university_id" ,displayName: 'University Id', cellTemplate: '/views/cellTemplate/cell.html ', width:"11%" },
                                { name:"college_id" ,displayName: 'College Id',  cellTemplate: '/views/cellTemplate/cell.html', width:"11%" },
                                {name :"type" ,displayName: 'Grievance Type' ,cellTemplate: '/views/cellTemplate/cell.html', width:"11%"  },
                                {name :"created_at" ,displayName: 'Date of Issue' ,cellTemplate: '/views/cellTemplate/cell.html', width:"11%"  },
                                {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html '},
                                {name:"documents" ,displayName: 'Attachment', cellTemplate: '/views/cellTemplate/attachment.html ', width:"11%" },
                                {name:"comment",displayName: 'Comments',cellTemplate: "/views/cellTemplate/aicte_connect.html" , width:"23%" },
                                
                                        ],
                
                                
                    };
        
//Grievance Search

//university_search
                    
            $scope.university_search=function(university_id)
            {
                aicteService.university_search(university_id).then(function(success){
                    $scope.university_search_result.data=new Array();
                     $scope.university_search_data=success.data.message;   
                     $scope.university_search_result.data=$scope.university_search_data;             
                    },
                    function(error){
                        $scope.university_search_result.data=new Array();
                         appService.showAlert('error',error.data.message);
                    });
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
                    {name:"omudsman_contact" ,displayName: 'Contact Number', cellTemplate: '/views/cellTemplate/cell.html '},
                    {name:"email",displayName: 'Email id',cellTemplate: '/views/cellTemplate/cell.html '  },
                    {name:"open_grievances",displayName: 'Open Grievances',cellTemplate: '/views/cellTemplate/cell.html '  },
 
                            ],
    
                    
        };
//institute search

                $scope.institute_search=function(institute_id)
                {
                    aicteService.institute_search(institute_id).then(function(success){
                    $scope.institute_search_result.data=new Array();
                     $scope.institute_search_data=success.data.message;  
                     $scope.institute_search_result.data=$scope.institute_search_data;             
                    },
                    function(error){
                        $scope.institute_search_result.data=new Array();
                         appService.showAlert('error',error.data.message);
                    });
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
                    { name : "college_id",displayName: 'Institute Code', cellTemplate: '/views/cellTemplate/cell.html' },
                    { name:"college_name" ,displayName: 'Institute', cellTemplate: '/views/cellTemplate/cell.html '},
                    { name:"pricipal_name" ,displayName: 'Principal',  cellTemplate: '/views/cellTemplate/cell.html'},
                    {name:"principal_contact" ,displayName: 'Contact Number', cellTemplate: '/views/cellTemplate/cell.html '},
                    {name:"email",displayName: 'Email Id',cellTemplate: '/views/cellTemplate/cell.html '  },
                    {name:"open_grievances",displayName: 'Open Grievances',cellTemplate: '/views/cellTemplate/cell.html '  },
  
                            ],
    
                    
        };

//institute search

//Open Grievance
            $scope.colleges = [{"name":"CVRCE"},{"name":"Techno India"}];
            $scope.states = [
                
                {"name":"Andhra Pradesh"},
              {"name":"Arunachal Pradesh"},
              {"name":"Assam"},
              {"name":"Bihar"},
              {"name":"Chhattisgarh"},
              {"name":"Goa"},
              {"name":"Gujarat"},
              {"name":"Haryana"},
              {"name":"Himachal Pradesh"},
              {"name":"Jammu and Kashmir"},
              {"name":"Jharkhand"},
              {"name":"Karnataka"},
              {"name":"Kerala"},
              {"name":"Madhya Pradesh"},
              {"name":"Maharashtra"},
              {"name":"Manipur"},
              {"name":"Meghalaya"},
              {"name":"Mizoram"},
              {"name":"Nagaland"},
              {"name":"Odisha"},
              {"name":"Punjab"},
              {"name":"Rajasthan"},
              {"name":"Sikkim"},
              {"name":"Tamil Nadu"},
              {"name":"Telangana"},
              {"name":"Tripura"},
              {"name":"Uttar Pradesh"},
              {"name":"Uttarakhand"},
              {"name":"West Bengal"},];
            
                
            
            $scope.university = [{"name":"bput"},{"name":"wbut"}];
            $scope.college_grievance_data =new Array();
            $scope.state_grievance_data =new Array();
            $scope.university_grievance_data =new Array();

            $scope.collegeName='';

            $('#selectCollegeWise').on('change',function(){
                var selectVal = $('#selectCollegeWise').val();
                $scope.collegeWiseGrievance(selectVal);
                alert(selectVal);
                
            });

             $scope.collegeWiseGrievance= function(selectVal){
                alert(selectVal);
             }

            $scope.loadOpenGrievance=function(){
                    $scope.college_grievance_data =new Array();
                    $scope.state_grievance_data =new Array();
                    $scope.university_grievance_data =new Array();
                

              
        }


       // $scope.pageSize_grievance = 7;
       //$scope.loadOpenGrievance();

        
     $scope.college_grievance = {
        data:$scope.college_grievance_data,
            enableGridMenus:false,
            enableSorting: false,
            enableFiltering:false,
            enableCellEditing:false,
            enableColumnMenus: false,
            enableHorizontalScrollbar:0,
            enableVerticalScrollbar:0,
            paginationPageSize:  $scope.numRows,
            minRowsToShow:  $scope.numRows,
            enablePaginationControls: false,



            columnDefs: [
                
                { name : "id",displayNameName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html' , width:"11%"},
                { name:"committee_student_details" ,displayName: 'Student Details',  cellTemplate: '/views/cellTemplate/student_details.html', width:"11%"},
                { name:"college_name" ,displayName: 'College Name',  cellTemplate: '/views/cellTemplate/cell.html', width:"11%"},
                {name :"type" ,displayName: 'Grievance Type' ,cellTemplate: '/views/cellTemplate/cell.html' , width:"11%"},
                {name:"created_at", displayName: 'Data of Issue' ,cellTemplate: '/views/cellTemplate/cell.html ', width:"11%"},
                {name:"eta" ,displayName: 'ETA', cellTemplate: '/views/cellTemplate/cell.html ', width:"11%"},
                {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html", width:"11%"  },
                {name:"connect",displayName: 'Connect',cellTemplate: "/views/cellTemplate/aicte_connect.html", width:"23%" },
                
            ],

                
             };

             $scope.state_grievance = {
                data:$scope.state_grievance_data,
                enableGridMenus:false,
                enableSorting: false,
                enableFiltering:false,
                enableCellEditing:false,
                enableColumnMenus: false,
                enableHorizontalScrollbar:0,
                enableVerticalScrollbar:0,
                paginationPageSize:  $scope.numRows,
                minRowsToShow:  $scope.numRows,
                enablePaginationControls: false,


    
        columnDefs: [
            { name : "id",displayNameName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html' , width:"11%"},
            { name:"committee_student_details" ,displayName: 'Student Details',  cellTemplate: '/views/cellTemplate/student_details.html', width:"11%"},
            { name:"college_name" ,displayName: 'College name',  cellTemplate: '/views/cellTemplate/cell.html', width:"11%"},
            {name :"type" ,displayName: 'Grievance Type' ,cellTemplate: '/views/cellTemplate/cell.html' , width:"11%"},
            {name:"created_at", displayName: 'Data of Issue' ,cellTemplate: '/views/cellTemplate/cell.html ', width:"11%"},
            {name:"eta" ,displayName: 'ETA', cellTemplate: '/views/cellTemplate/cell.html ', width:"11%"},
            {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html", width:"11%"  },
            {name:"connect",displayName: 'Connect',cellTemplate: "/views/cellTemplate/aicte_connect.html", width:"23%" },
                            ],
    
                   
        };

        $scope.university_grievance = {
            data:$scope.university_grievance_data,
            enableGridMenus:false,
            enableSorting: false,
            enableFiltering:false,
            enableCellEditing:false,
            enableColumnMenus: false,
            enableHorizontalScrollbar:0,
            enableVerticalScrollbar:0,
            paginationPageSize:  $scope.numRows,
            minRowsToShow:  $scope.numRows,
            enablePaginationControls: false,



    columnDefs: [
        { name : "id",displayNameName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html' , width:"11%"},
        { name:"committee_student_details" ,displayName: 'Student Details',  cellTemplate: '/views/cellTemplate/student_details.html', width:"11%"},
        { name:"college_name" ,displayName: 'College name',  cellTemplate: '/views/cellTemplate/cell.html', width:"11%"},
        {name :"type" ,displayName: 'Grievance Type' ,cellTemplate: '/views/cellTemplate/cell.html' , width:"11%"},
        {name:"created_at", displayName: 'Data of Issue' ,cellTemplate: '/views/cellTemplate/cell.html ', width:"11%"},
        {name:"eta" ,displayName: 'ETA', cellTemplate: '/views/cellTemplate/cell.html ', width:"11%"},
        {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html", width:"11%"  },
        {name:"connect",displayName: 'Connect',cellTemplate: "/views/cellTemplate/aicte_connect.html", width:"23%" },

                
                        ],

               
    };




    $scope.getHistory = function()
    {   $scope.add_user_data = new Array();

        aicteService.getUpdateHistory().then(
            function(success)
            {
                $scope.add_user_data = success.data.message;
               // console.log(success.data.message);
                $scope.add_user.data = $scope.add_user_data;

            },
            function(error)
            {
                appService.alert('error',error.data.message);
            }
            
        )
    };

    $scope.getHistory();
    // $scope.add_user_data=[{"file_name":"Omudsman.csv",
    //                         "file_type":"Ombudsman",
    //                         "file_date":"03/03/2019",
    //                         "upload_by":"kamal@aicte.in",
    //                         "documents":"1"}];
    $scope.add_user = {
        data:$scope.add_user_data,
            enableGridMenus:false,
            enableSorting: false,
            enableFiltering:false,
            enableCellEditing:false,
            enableColumnMenus: false,
            enableHorizontalScrollbar:0,
            enableVerticalScrollbar:0,
            totalItems: $scope.add_user_data.length,
            paginationPageSize: $scope.numRows,
            minRowsToShow: $scope.numRows,
            enablePaginationControls: false,
            

            columnDefs: [
                { name : "filename",displayNameName: 'File Name', cellTemplate: '/views/cellTemplate/cell.html' , width:"25%"},
                { name:"type" ,displayName: 'File Type',  cellTemplate: '/views/cellTemplate/cell.html', width:"25%"},
                { name:"date" ,displayName: 'File Date',  cellTemplate: '/views/cellTemplate/cell.html', width:"25%"},
                {name :"uploaded_by" ,displayName: 'Upload By' ,cellTemplate: '/views/cellTemplate/cell.html' , width:"25%"},
                
                
            ],

                
             };


//User Grievance
                
$scope.errors = "";
var formData = new FormData();
$scope.file={};
$scope.role_type = '';
$scope.uploadExcel = function (role_type) {
    formData.append('type',role_type);
    console.log(role_type);
    var request = {
        method: 'POST',
        url: API_URL+"/aicte/registerUser",
        data: formData,
        headers: {
            'Content-Type': undefined
        }
    };



    $http(request)
        .then(function success(e) {
            appService.showAlert('success',e.data.message);
            $scope.files = e.data.files;
            $scope.errors = [];
            $scope.selected_file='';

            var fileElement = angular.element('#attachment');
            fileElement.value = '';
            $scope.getHistory();
            
        }, function error(e) {
            $scope.errors = e.data.errors;
        });
};

$scope.setTheFiles = function ($files) {
    angular.forEach($files, function (value, key) {


        formData.append('file', value);


    });
};



                
}

