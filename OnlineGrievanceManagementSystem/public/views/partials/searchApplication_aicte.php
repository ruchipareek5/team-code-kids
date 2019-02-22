
<head>
    <title></title>

</head>

 <div class="container">
      <div class="row">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">Search Grievance</h5>
                
                     
                <div class="col-md-12 col-lg-12 div-form table ">
                 
                          <label style="color:#5A5A5A;font-size:1em;display: inline;">Select</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <select ng-model="ids.type" required="required">
                          <option value="">Select</option>
                          <option ng-repeat= "y in ids" value={{y.ids}} >{{y.ids}}</option>
                          </select>
                    
                     <input type="text" name="search" id="search" ng-model="search" placeholder="Enter grievance id" >
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <button class="btn button-submit">Search&nbsp;&nbsp;&nbsp;<img src="assets/icons/search.png" height="24" width="24"></button>
                        <br>
                        <br>
                      <div id="grid1" ui-grid="grievance_search" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="grievance_search.totalItems > numRows">
              <pagination class="pagination-sm" total-items="grievance_search.totalItems" items-per-page="grievance_search.paginationPageSize" ng-model="grievance_search.paginationCurrentPage"></pagination>
      </div>
                    </div>
                
                 
          </div>
      </div>
      



    </div>