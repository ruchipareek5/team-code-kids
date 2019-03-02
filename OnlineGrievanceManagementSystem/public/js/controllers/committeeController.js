  // Controller for AICTE user
var grievancesystem= angular.module('grievancesystem');
grievancesystem.controller('committeeController',committeeController);


 function committeeController($scope,$http,appService,committeeService,API_URL,$location) {
   
 	$scope.page='dashboard_committee';

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



 	//load grievance panel
     $scope.total = 0;
    $scope.open = 0;
    $scope.escalated = 0;
    $scope.addressed = 0;

    $scope.loadGrievanceStatistics=function(){
        $http.get(API_URL+"committee/statistics/total").then(function(response){
                $scope.total = response.data.value;
            },function(errorResponse){
                console.log(errorResponse);
            });
        $http.get(API_URL+"committee/statistics/pending").then(function(response){
                $scope.open = response.data.value;
            },function(errorResponse){
                console.log(errorResponse);
            });
        $http.get(API_URL+"committee/statistics/escalated").then(function(response){
                $scope.escalated = response.data.value;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"committee/statistics/satisfied").then(function(response){
                $scope.addressed = response.data.value;
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

 ///View Grievance
          $scope.open_grievance_data =new Array();
        $scope.in_action_grievance_data =new Array();
        $scope.resolved_grievance_data =new Array();
        $scope.loadAllGrievance=function(){
                $scope.open_grievance_data =new Array();
                $scope.in_action_grievance_data =new Array();
                $scope.resolved_grievance_data =new Array();
            committeeService.getGrievance('new').then(function(success)
             {   
                    $scope.open_grievance_data = success.data.message;
                    $scope.open_grievance.data = $scope.open_grievance_data;
                }, function(error){

              });

            committeeService.getGrievance('inaction').then(function(success)
             {   
               $scope.in_action_grievance_data = success.data.message;
                 $scope.in_action_grievance.data = $scope.in_action_grievance_data;

                }, function(error){

              });

            committeeService.getGrievance('addressed').then(function(success)
             {   
               $scope.resolved_grievance_data = success.data.message;
                 $scope.resolved_grievance.data = $scope.resolved_grievance_data;

                }, function(error)                 {

              });

          
    }
    $scope.loadAllGrievance();

    // grievance ends


 $scope.numRows = 3;
 $scope.pageSize = 7;

 $scope.open_grievance = {
    data:$scope.open_grievance_data,
        enableGridMenus:false,
        enableSorting: false,
        enableFiltering:false,
        enableCellEditing:false,
        enableColumnMenus: false,
        enableHorizontalScrollbar:0,
        enableVerticalScrollbar:0,
        paginationPageSize: $scope.pageSize,
        minRowsToShow: $scope.numRows,
        enablePaginationControls: false,



        columnDefs: [
            { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
            {name :"student_details" ,displayName: 'Student Details' ,cellTemplate: '/views/cellTemplate/student_details.html', width: "10%"},
            { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
            { name:"description" ,displayName: 'Description', cellTemplate: '/views/cellTemplate/cell.html',width:"30%"},
            {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html",width:"12%"  },
            {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
            {name:"action",displayName: 'Action',cellTemplate: "/views/cellTemplate/committee_take_action.html",width:"12%"  },
            
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
            paginationPageSize: $scope.pageSize,
            minRowsToShow: $scope.numRows,
            enablePaginationControls: false,



    columnDefs: [
        { name : "id", cellTemplate: '/views/cellTemplate/cell.html',headerCellTemplate: '<div class="">Grievance <br>ID </div>',width:"7%"},
        {name :"student_details", headerCellTemplate: '<div class="">Student <br>Details </div>',cellTemplate: '/views/cellTemplate/student_details.html', width: "7%"},
        { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html',width:"10%"},
        { name:"description" ,displayName: 'Description', cellTemplate: '/views/cellTemplate/cell.html',width:"15%"},
        {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html",width:"7%"  },
        {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html',width:"10%"},
        {name:"connect",displayName: 'Connect',cellTemplate: "/views/cellTemplate/committee_connect.html",width:"21%"  },
        {name:"action",displayName: 'Action',cellTemplate: "/views/cellTemplate/committee_action.html",width:"16%"  },
        {name:"authority",displayName: 'Authority',cellTemplate: "/views/cellTemplate/authorityCell.html",width:"7%"  },
        
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
        paginationPageSize: $scope.pageSize,
        minRowsToShow: $scope.numRows,
        enablePaginationControls: false,



columnDefs: [
    { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
    {name :"student_details" ,displayName: 'Student Details' ,cellTemplate: '/views/cellTemplate/student_details.html', width: "10%"},
    { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
    { name:"description" ,displayName: 'Description', cellTemplate: '/views/cellTemplate/cell.html',width:"20%"},
    {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html",width:"12%"  },
    {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
    {name:"updated_at",displayName: 'Closing Date',cellTemplate: "/views/cellTemplate/cell.html",width:"12%"  },
    {name:"delayed_status",displayName: 'Closing Status',cellTemplate: "/views/cellTemplate/closureCell.html",width:"10%"  },
          
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
        totalItems: $scope.grievance_search_data.length,
        paginationPageSize: $scope.pageSize,
        minRowsToShow: $scope.grievance_search_data.length < $scope.pageSize ? $scope.grievance_search_data : $scope.pageSize,
        enablePaginationControls: false,


columnDefs: [
            { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html' },
            { name:"student_details" ,displayName: 'Student Details', cellTemplate: '/views/cellTemplate/student_details.html '},
            { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html '},
            {name :"description" ,displayName: 'Description' ,cellTemplate: '/views/cellTemplate/cell.html', width:"15%" },

            {name :"created_at" ,displayName: 'Date of Issue' ,cellTemplate: '/views/cellTemplate/cell.html' },
            {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html '},


            {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html"  },
            {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html '},
            
                    ],

                 
};
    
//Search Grievance              
   

//action
$scope.action = function(gid)
{
    committeeService.takeAction(gid).then(function(success)
    {
        $scope.loadAllGrievance();
        $scope.loadGrievanceStatistics();
         appService.showAlert("success",success.data.message);

    },
    function(error)
    {
        appService.showAlert('error',error.data.message );
    }
    );
}
//action

// sfa function is in appController

    //addressed
    $scope.markAddressed = function(gid)
    {
        committeeService.markAddressed(gid).then(function(success){
            $scope.loadAllGrievance();
             appService.showAlert("success",success.data.message);

        },function(error){
            appService.showAlert('error',error.data.message );
        }
        );
    }

       // grievance search starts
    $scope.searchId='';
    $scope.grievance_search_data=new Array();
    $scope.searchGrievance =  function(searchId){
        $scope.grievance_search_data=new Array();
        committeeService.searchGrievance(searchId).then(function(success){
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

    $scope.sfa;
    // sfa 
    $scope.sfaStart = function (id) {
        if(id){
            $scope.sfa=1;
            $scope.addComment(id);
        }        
    }
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
            if ($scope.sfa==1) {
                console.log($scope.sfa)
                $scope.sfa=0;
                committeeService.seekForApproval($scope.comment.gid).then(function(success){
                    $scope.loadAllGrievance();
                     appService.showAlert("success",success.data.message);

                },function(error){
                    appService.showAlert('error',error.data.message );
                }
                );

            }
            appService.showAlert('success',success.data.message);

        },
        function(error){
            appService.showAlert('error',error.data.message)

        });
        
        
    }   
}

// closing of controller
