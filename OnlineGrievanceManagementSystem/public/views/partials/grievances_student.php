<head>
    <title>Document</title>
</head>

<div class="container">
      <div class="row">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">Raised/Reopen Grievance</h5>
                <div class="table sub-grid">
                <div id="grid1" ui-grid="open_grievance"  ui-grid-pagination="" ui-grid-cellNav ui-grid-auto-resize  class="sub-grid"></div>
                <div class="text-center page" ng-show="open_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="open_grievance.totalItems" items-per-page="open_grievance.paginationPageSize" ng-model="open_grievance.paginationCurrentPage"></pagination>
      </div>
                </div>
          </div>
      </div>

      <div class="row">
            <div class="col-lg-12 col-md-12 open-grievance ">
                <h5 class="grievance-heading">In Action Grievance</h5>
                  <div class="table sub-grid">
                  	<div id="grid1" ui-grid="in_action_grievance" ui-grid-pagination="" ui-grid-cellNav ui-grid-auto-resize  class="sub-grid"></div>
                      <div class="text-center page" ng-show="in_action_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="in_action_grievance.totalItems" items-per-page="in_action_grievance.paginationPageSize" ng-model="in_action_grievance.paginationCurrentPage"></pagination>
      </div>
                  </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 open-grievance ">
                <h5 class="grievance-heading">Addressed Grievances</h5>
                  <div class="table sub-grid">
                  <div id="grid1" ui-grid="addressed_grievance" ui-grid-pagination="" ui-grid-cellNav ui-grid-auto-resize  class="sub-grid"></div>
                  <div class="text-center page" ng-show="addressed_grievance.totalItems > numRows">
              <pagination class="pagination-sm" total-items="addressed_grievance.totalItems" items-per-page="addressed_grievance.paginationPageSize" ng-model="addressed_grievance.paginationCurrentPage"></pagination>
      </div>
                  </div>
            </div>
        </div>
</div>