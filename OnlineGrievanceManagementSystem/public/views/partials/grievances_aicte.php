
<head>
    <title>AICTE Grievances</title>
</head>


<div class="container">
      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">Major Grievance</h5>
                <div class="table ">
                <div id="grid1" ui-grid="major_grievance" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="major_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="major_grievance.totalItems" items-per-page="major_grievance.paginationPageSize" ng-model="major_grievance.paginationCurrentPage"></pagination>
      </div>
                </div>
          </div>
      </div>

      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">Escalated Grievances</h5>
                <div class="table ">
                <div id="grid1" ui-grid="open_grievance" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="open_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="open_grievance.totalItems" items-per-page="open_grievance.paginationPageSize" ng-model="open_grievance.paginationCurrentPage"></pagination>
      </div>
                </div>
          </div>
      </div>
 
</div>