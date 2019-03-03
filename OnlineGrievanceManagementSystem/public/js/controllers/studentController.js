
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
    $scope.username='';
    $http.get('/user/getUserName').then(function(success){
        $scope.username=success.data.message;
    },function(error){
        $scope.username='username';
    });

    $scope.college_name='';
    $http.get('/users/fetchCollege').then(function(success){
        $scope.college_name=success.data.message;
    },function(error){
        $scope.college_name='College';
    });
 	$scope.page='dashboard_student';
   
    $scope.grievanceagainst=[{"category":"Admission Cell"},{"category":"Accounts Department"},
    {"category":"Training and Placement cell"},
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
             $scope.grievance_search.data=new Array();  
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
         $http.get(API_URL+"grievance/addressed").then(function(response){
                $scope.satisfied = response.data.value;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"grievance/open").then(function(response){
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
        $scope.grievance.subCategory='';
        $scope.grievance.timeSlot='';
        $scope.errors = "";
        $scope.hostel=false;

        // subcategory
        $scope.grievanceSubcategory=[{}];
         $scope.academicsSubcategory=[{"category":"Admission"},{"category":"Scholarship"},{"category":"Marksheet"},{"category":"Others"}];
         $scope.hostelSubcategory=[{"category":"Electrical"},{"category":"Maintainace"},{"category":"WiFi"},{"category":"Others"}
        ];

        $scope.grievanceTimeslot=[{"category":"8AM to 10AM"},{"category":"1PM to 5PM"},
        {"category":"6PM to 8PM"}];
        $scope.grievanceChange = function(){
            if($scope.grievance.type=='Hostel'){
                $scope.hostel=true;
                $scope.grievanceSubcategory=$scope.hostelSubcategory;

            }else{
                $scope.hostel=false;

            }
            if($scope.grievance.type=='Admission Cell'){
                $scope.grievanceSubcategory=$scope.academicsSubcategory;
            }
            console.log($scope.grievance.type);
        }

        var formData = new FormData();
        
        $scope.lodgeGrievance = function () {
             formData.append('type',$scope.grievance.type);
            formData.append('detail',$scope.grievance.detail);
            formData.append('subCategory',$scope.grievance.subCategory);
            formData.append('timeSlot',$scope.grievance.timeSlot);
            console.log($scope.grievance.timeSlot);
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
                    $scope.grievance.subCategory='';
                    $scope.grievance.timeSlot='';
                    $scope.hostel=false;
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


    $scope.faq =[{ 
                    "ques":"Can I open grievance web portal in any browser?",
                    "ans": "Yes. You can open grievance Web Portal in any Web Browser."
                    },
                    {
                        "ques":"How can I lodge a grievance?",
                         "ans":"In dashboard tab you can find a form to lodge the grievance."
                    },
                    { 
                        "ques":"When I try to login with Institute's Credentials, error message 'Invalid username and password' is displayed. What should I do?",
                        "ans": "Recheck  the  login  credentials(Case  sensitive).  Confirm  whether  someone  else  has logged  in  with  the  same  credentials"+
                        "(Please  notethat  per  user  only    sessions  are allowed.  Hence,  if  someone  tries  for  session  then  again  invalid  user  name "+
                        "and password message  will  popup). If  no  session  is  live  and  still  getting  an  invalid username and password message then contact your principal."},
                    { 
                        "ques":"What happens when I lodge the grievance? ",
                         "ans": "The grievance is acknowledged online. A unique grievance id is given to each grievance."
                    },
                    { 
                        "ques":"What happen to grievance when it  get unaddress within estimated time of action? ",
                        "ans": "The grievance which remains unaddress within estimated time of action will be explicitly escalated to higher authority."
                    },
                    { 
                        "ques":"How do I know when grievance is addressed?",
                         "ans": "You will see addressed grievance in history table in my grievance column."
                    },
                    {
                        "ques": "How to reset password?",
                        "ans": "You can contact your principal or head of student welfare to reset the password."
                    },
                    {
                        "ques": "What if I am  not satisfied with the addressed grievance?",
                        "ans":"You can reopen the grievance by clicking on reopen button in action column of addressed table."
                    }
                    

                    
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
        $scope.pageSize = 7;
       $scope.loadAllGrievance();

        
     $scope.open_grievance = {
        data:$scope.open_grievance_data,
            enableGridMenus:false,
            enableSorting: false,
            enableFiltering:false,
            enableCellEditing:false,
            enableColumnMenus: false,
            enableHorizontalScrollbar:1,
            enableVerticalScrollbar:0,
            paginationPageSize: $scope.pageSize,
            minRowsToShow: $scope.numRows,
            enablePaginationControls: false,



            columnDefs: [
                { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
                {name :"created_at" ,displayName: 'Lodge on' ,cellTemplate: '/views/cellTemplate/cell.html', width: "12%"},
                { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
                { name:"description" ,displayName: 'Description', cellTemplate: '/views/cellTemplate/cell.html',width:"40%"},
                { name:"sub_category" ,displayName: 'Sub Category', cellTemplate: '/views/cellTemplate/cellSubcategory.html',width:"15%"},
                { name:"timeslot" ,displayName: 'Time Slot', cellTemplate: '/views/cellTemplate/cellTimeslot.html',width:"15%"},
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
                enableHorizontalScrollbar:1,
                enableVerticalScrollbar:0,
                paginationPageSize: $scope.pageSize,
                minRowsToShow: $scope.numRows,
                enablePaginationControls: false,


    
        columnDefs: [
                    { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html', width:"12%"},
                    { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html ', width:"12%"},
                    {name :"description" ,displayName: 'Description' ,cellTemplate: '/views/cellTemplate/cell.html', width:"15%" },
                    { name:"sub_category" ,displayName: 'Sub Category', cellTemplate: '/views/cellTemplate/cellSubcategory.html',width:"15%"},
                    { name:"timeslot" ,displayName: 'Time Slot', cellTemplate: '/views/cellTemplate/cellTimeslot.html',width:"15%"},
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
            enableHorizontalScrollbar:1,
            enableVerticalScrollbar:0,
            paginationPageSize: $scope.pageSize,
            minRowsToShow: $scope.numRows,
            enablePaginationControls: false,



    columnDefs: [
        { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html', width:"10%"},
        { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html ', width:"12%"},
        {name :"description" ,displayName: 'Description' ,cellTemplate: '/views/cellTemplate/cell.html', width:"15%" },
        { name:"sub_category" ,displayName: 'Sub Category', cellTemplate: '/views/cellTemplate/cellSubcategory.html',width:"15%"},
        { name:"timeslot" ,displayName: 'Time Slot', cellTemplate: '/views/cellTemplate/cellTimeslot.html',width:"15%"},
        {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html", width:"9%"  },
        {name:"updated_at", displayName: 'Date of Complettion' ,cellTemplate: '/views/cellTemplate/cell.html ', width:"12%"},
        { name:"action" ,displayName: 'Actions',  cellTemplate: '/views/cellTemplate/student_action.html', width:"30%"},
        {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html ', width:"12%"},

                
                        ],

               
    };


   // $scope.grievance_search_data = [{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},{"id":"1"},];
        $scope.grievance_search = {
            data:$scope.grievance_search_data,
            enableGridMenus:false,
            enableSorting: false,
            enableFiltering:false,
            enableCellEditing:false,
            enableColumnMenus: false,
            enableHorizontalScrollbar:0,
            enableVerticalScrollbar:0,
            totalItems: $scope.grievance_search_data.length,
            paginationPageSize: $scope.pageSize,
            minRowsToShow: $scope.grievance_search_data.length < $scope.pageSize ? $scope.grievance_search_data : $scope.pageSize,
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
