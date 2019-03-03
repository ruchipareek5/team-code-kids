// Controller for principal
var grievancesystem= angular.module('grievancesystem');
grievancesystem.controller('vendorController',vendorController);



 function vendorController($scope,$http,appService,vendorService,API_URL,$location) {
   
       // lodge grievance starts

        $scope.errors = "";
        var formData = new FormData();
        
        $scope.addCommentAttachementAPI = function (comment) {
            var request = {
                method: 'POST',
                url: API_URL+"grievance/addComment",
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
                    $scope.selected_file='';
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
                formData.append('attachment', value);
                formData.append('grievance_id',$scope.comment.gid);
                formData.append('message',$scope.comment.message)

            });
        };
    //  lodge grievance ends


  $scope.page='dashboard_vendor';


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

    $scope.department_list=[{}];

$http.get('/principal/committee').then(function(success){
        $scope.department_list=success.data.message;
        console.log($scope.department_list);
    },function(error){
        $scope.department_list=[{}];
    });
    
  //load grievance panel
     $scope.total = 0;
    $scope.pending = 0;
    $scope.escalated = 0;
    $scope.satisfied = 0;

    $scope.loadGrievanceStatistics=function(){
        $http.get(API_URL+"principal/chart/statistics/total").then(function(response){
                $scope.total = response.data.message[0].total;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"principal/chart/statistics/escalated").then(function(response){
                $scope.escalated = response.data.message[0].count;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"principal/chart/statistics/pending").then(function(response){
                $scope.pending = response.data.message[0].count;
            },function(errorResponse){
                console.log(errorResponse);
            });
         $http.get(API_URL+"principal/chart/statistics/satisfied").then(function(response){
                $scope.satisfied = response.data.message[0].count;
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
              $scope.purchase_request_data =new Array();
              $scope.delivered_request_data =new Array();
              $scope.loadAllGrievance=function(){
                      $scope.purchase_request_data =new Array();
                      $scope.delivered_request_data =new Array();
                  vendorService.getGrievance('Sent for purchase').then(function(success)
                   {   
                          $scope.purchase_request_data = success.data.message;

                          $scope.purchase_request.data = $scope.purchase_request_data;
                      }, function(error){

                    });

                  vendorService.getGrievance('delivered').then(function(success)
                   {   
                     $scope.delivered_request_data = success.data.message;
                     //console.log(success.data.message)
                       $scope.delivered_request.data = $scope.delivered_request_data;

                      }, function(error){

                    });                
          }
          $scope.loadAllGrievance();

          // grievance ends
               
               
                $scope.numRows = 3;
                $scope.pageSize=7;
               
                $scope.purchase_request = {
                   data:$scope.purchase_request_data,
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
                           { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
                           { name:"description" ,displayName: 'Description', cellTemplate: '/views/cellTemplate/cell.html',width:"22%"},
                           {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html",width:"12%"  },
                           {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html',width:"12%"},
                           {name:"connects", displayName: 'Connects' ,cellTemplate: '/views/cellTemplate/vendor_connects.html',width:"20%"},
                           {name:"action",displayName: 'Delivered',cellTemplate: "/views/cellTemplate/vendor_take_action.html",width:"10%"  },
                           
                       ],
               
                           
                        };
               
                        $scope.delivered_request = {
                           data:$scope.delivered_request_data,
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
                       { name : "id", cellTemplate: '/views/cellTemplate/cell.html',headerCellTemplate: '<div class="">Grievance <br>ID </div>',width:"10%"},
                       { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html',width:"10%"},
                       { name:"description" ,displayName: 'Description', cellTemplate: '/views/cellTemplate/cell.html',width:"27%"},
                       {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html",width:"10%"  },
                       {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html',width:"13%"},
                       {name:"connect",displayName: 'Connect',cellTemplate: "/views/cellTemplate/principal_connects.html",width:"20%"  },

                       {name:"vendor_attachment",displayName: 'Invoice',cellTemplate: "/views/cellTemplate/Invoice_attachment.html",width:"10%"  },
                       
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
                       paginationPageSize: $scope.pageSize,
                       minRowsToShow: $scope.numRows,
                       enablePaginationControls: false,
               
               
               columnDefs: [
                           { name : "id",displayName: 'Grievance ID', cellTemplate: '/views/cellTemplate/cell.html' },
                           { name:"student_details" ,displayName: 'Student Details', cellTemplate: '/views/cellTemplate/student_details.html '},
                           { name:"type" ,displayName: 'Grievance Type', cellTemplate: '/views/cellTemplate/cell.html '},
                           {name :"description" ,displayName: 'Description' ,cellTemplate: '/views/cellTemplate/cell.html', },
                           {name :"department_id" ,displayName: 'Committee' ,cellTemplate: '/views/cellTemplate/cell.html',  },
                           {name :"created_at" ,displayName: 'Date of Issue' ,cellTemplate: '/views/cellTemplate/cell.html' },
                           {name:"eta", displayName: 'ETA' ,cellTemplate: '/views/cellTemplate/cell.html '},
               
                           {name:"documents",displayName: 'Attachment',cellTemplate: "/views/cellTemplate/attachment.html"  },
                           {name:"status" ,displayName: 'Status', cellTemplate: '/views/cellTemplate/cell.html '},
                           
                                   ],
               
                                
               };
                   
               //Search Grievance   
                $scope.searchId='';
                $scope.grievance_search_data=new Array();
                $scope.searchGrievance =  function(searchId){
                    $scope.grievance_search_data=new Array();
                    vendorService.searchGrievance(searchId).then(function(success){
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
               
               
         //take action
                $scope.approval;
                    // approval 
                    $scope.deliveredStart = function (id) {
                        if(id){
                            $scope.approval=1;
                            $scope.addCommentAttachment(id);
                        }        
                    }
                    $scope.addComment=function(id){
                        $('#commentModal-container').addClass('visible');        
                        
                        $scope.comment.gid=id;
                    }
                    $scope.addCommentAttachment=function(id){
                        $('#commentAttachmentModal-container').addClass('visible');        
                        
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
                            if ($scope.approval==1) {
                                console.log($scope.approval)
                                $scope.approval=0;
                                vendorService.approvedGrant($scope.comment.gid).then(function(success){
                                    $scope.loadAllGrievance();
                                     appService.showAlert("success",success.data.message);

                                },function(error){
                                    appService.showAlert('error',error.data.message );
                                }
                                );

                            }
                            else
                            appService.showAlert('success',success.data.message);

                        },
                        function(error){
                            appService.showAlert('error',error.data.message)

                        });
                        
                        
                    } 
                     $scope.viewRemarks=function(id){
                    $scope.comment_history_data=new Array();
                    
                      var url = API_URL+'grievance/remarks/'+id;
                      $http.get(url).then(function(success){

                        $('#modal-container').addClass('visible');
                        console.log(success.data.message);
                        $scope.comment_history.data=[];
                            $scope.comment_history_data=success.data.message;
                            $scope.comment_history.data=$scope.comment_history_data;

                      },
                      function(error){
                            $scope.comment_history.data=new Array();
                             appService.showAlert('error',error.data.message);

                      });
                    }

//Delivered function



       
   
                
}