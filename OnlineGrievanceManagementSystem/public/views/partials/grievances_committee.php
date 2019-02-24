
<head>
    <title>Principal Grievances</title>
</head>


<div class="container">
      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">New Grievance</h5>
                <div class="table grid">
                <div id="grid1" ui-grid="open_grievance" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="open_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="open_grievance.totalItems" items-per-page="open_grievance.paginationPageSize" ng-model="open_grievance.paginationCurrentPage"></pagination>
      </div>
                </div>
          </div>
      </div>

      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">In Action Grievance</h5>
                <div class="table grid">
                <div id="grid1" ui-grid="in_action_grievance" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="in_action_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="in_action_grievance.totalItems" items-per-page="in_action_grievance.paginationPageSize" ng-model="in_action_grievance.paginationCurrentPage"></pagination>
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