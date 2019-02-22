
<head>
    <title></title>

</head>

 <div class="container">
      <div class="row">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">Search University</h5>
                
                     
                <div class="col-md-12 col-lg-12 div-form table ">
                 <form ng-submit="university_search(university_search_id)">
                          <label style="color:#5A5A5A;font-size:1.5em;display: inline;">Enter University Code</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                     <input type="text" name="search" id="search" ng-model="university_search_id" placeholder="Enter University id" required >
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <button type='Submit' class="btn button-submit">Submit&nbsp;&nbsp;&nbsp;<img src="assets/icons/search.png" height="24" width="24"></button>
                </form>
                        <br>
                        <br>
                      <div id="grid1" ui-grid="university_search_result" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="university_search_result.totalItems > numRows">
              <pagination class="pagination-sm" total-items="university_search_result.totalItems" items-per-page="university_search_result.paginationPageSize" ng-model="university_search_result.paginationCurrentPage"></pagination>
      </div>
                    </div>
                
                 
          </div>
        
      </div>
      <div class="row">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">Search Institute</h5>
                
                     
                <div class="col-md-12 col-lg-12 div-form table ">
                 <form ng-submit="institute_search(institute_search_id)">
                          <label style="color:#5A5A5A;font-size:1.5em;display: inline;">Enter Institute Code</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                     <input type="text" name="search" id="search" ng-model="institute_search_id" placeholder="Enter Institute id"  required>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <button type="Submit" class="btn button-submit">Submit&nbsp;&nbsp;&nbsp;<img src="assets/icons/search.png" height="24" width="24"></button></form>
                        <br>
                        <br>
                      <div id="grid1" ui-grid="institute_search_result" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="institute_search_result.totalItems > numRows">
              <pagination class="pagination-sm" total-items="institute_search_result.totalItems" items-per-page="institute_search_result.paginationPageSize" ng-model="institute_search_result.paginationCurrentPage"></pagination>
      </div>
                    </div>
                
                 
          </div>
        
      </div>
      



    </div>