
<head>
    <title>Principal Grievances</title>
</head>


<div class="container">
      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">Seeking Approvals</h5>
                <div class="table grid">
                <div id="grid1" ui-grid="seek_grievance" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="seek_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="seek_grievance.totalItems" items-per-page="seek_grievance.paginationPageSize" ng-model="seek_grievance.paginationCurrentPage"></pagination>
      </div>
                </div>
          </div>
      </div>

      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">Escalated Grievance</h5>
                <div class="table grid">
                <div id="grid1" ui-grid="escalated_grievance" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="escalated_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="escalated_grievance.totalItems" items-per-page="escalated_grievance.paginationPageSize" ng-model="escalated_grievance.paginationCurrentPage"></pagination>
      </div>
                </div>
          </div>
      </div>

      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">Resolved Grievance</h5>
                <div class="table grid">
                <div id="grid1" ui-grid="resolved_grievance" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="resolved_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="resolved_grievance.totalItems" items-per-page="resolved_grievance.paginationPageSize" ng-model="resolved_grievance.paginationCurrentPage"></pagination>
      </div>
                </div>
          </div>
      </div>



    
</div>