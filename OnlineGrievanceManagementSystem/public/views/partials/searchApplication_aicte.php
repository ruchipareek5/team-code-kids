
<head>
    <title></title>

</head>

 <div class="container">
      <div class="row">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">Search Grievance</h5>
                
                     
                <div class="col-md-12 col-lg-12 div-form table ">
                          <form ng-submit='searchGrievance(grievanceFilter,searchKeyword)'>
                          <label style="color:#5A5A5A;font-size:1em;display: inline;">Select</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <select ng-model="grievanceFilter" name="grievanceFilter" id="grievanceFilter" required="required">
                          <option value="">Select</option>
                          <option value="1">Grievance Id</option>
                          <option value="2">Student Id</option>
                          <option value="3">College Id</option>
                          <option value="4">Grievance Type</option>
                          </select>
                          
                     <input type="text" name="searchKeyword" id="searchKeyword" ng-model="searchKeyword" placeholder="Enter id" >
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <button type="Submit" class="btn button-submit">Search&nbsp;&nbsp;&nbsp;<img src="assets/icons/search.png" height="24" width="24"></button></form>
                        <br>
                        <br>
                      <div id="grid1" ui-grid="grievance_search_result" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="grievance_search_result.totalItems > numRows">
              <pagination class="pagination-sm" total-items="grievance_search_result.totalItems" items-per-page="grievance_search_result.paginationPageSize" ng-model="grievance_search_result.paginationCurrentPage"></pagination>
      </div>
                    </div>
                
                 
          </div>
      </div>
      



    </div>