
<head>
    <title>AICTE Grievances</title>
</head>


<div class="container">
      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">Open Grievance</h5>
                <div class="table ">
                <div id="grid1" ui-grid="open_grievance" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="open_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="open_grievance.totalItems" items-per-page="open_grievance.paginationPageSize" ng-model="open_grievance.paginationCurrentPage"></pagination>
      </div>
                </div>
          </div>
      </div>



      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">College Wise Grievance</h5>
              
                <div class="table div-form">
                <form>
                <label style="color:#5A5A5A;font-size:1em;display: inline;">Select College</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select ng-model="collegeName" required="required">
                    <option value="">Select</option>
                    <option ng-repeat= "y in colleges" value={{y.name}} >{{y.name}}</option>
                </select>
                </form>

                <br>
            
                <div id="grid1" ui-grid="college_grievance" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="college_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="college_grievance.totalItems" items-per-page="college_grievance.paginationPageSize" ng-model="college_grievance.paginationCurrentPage"></pagination>
      </div>
                </div>
          </div>
      </div>


      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">State Wise Grievance</h5>
              
                <div class="table div-form">
                <form>
                <label style="color:#5A5A5A;font-size:1em;display: inline;">Select State</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select ng-model="stateName" required="required">
                    <option value="">Select</option>
                    <option ng-repeat= "y in states" value={{y.name}} >{{y.name}}</option>
                </select>
                </form>

                <br>
            
                <div id="grid1" ui-grid="state_grievance" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="state_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="state_grievance.totalItems" items-per-page="state_grievance.paginationPageSize" ng-model="state_grievance.paginationCurrentPage"></pagination>
      </div>
                </div>
          </div>
      </div>


      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">University Wise Grievance</h5>
              
                <div class="table div-form">
                <form>
                <label style="color:#5A5A5A;font-size:1em;display: inline;">Select University</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select ng-model="universityName" required="required">
                    <option value="">Select</option>
                    <option ng-repeat= "y in university" value={{y.name}} >{{y.name}}</option>
                </select>
                </form>

                <br>
            
                <div id="grid1" ui-grid="university_grievance" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="university_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="university_grievance.totalItems" items-per-page="university_grievance.paginationPageSize" ng-model="university_grievance.paginationCurrentPage"></pagination>
      </div>
                </div>
          </div>
      </div>








    
</div>