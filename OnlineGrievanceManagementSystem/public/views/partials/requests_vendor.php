

<head>
    <title>Vendor Requests</title>
</head>


<div class="container">
      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">To Buy List</h5>
                <div class="table grid">
                <div id="grid1" ui-grid="purchase_request" ui-grid-auto-resize ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="purchase_request.totalItems > numRows">
              <pagination class="pagination-sm" total-items="purchase_request.totalItems" items-per-page="purchase_request.paginationPageSize" ng-model="purchase_request.paginationCurrentPage"></pagination>
      </div>
                </div>
          </div>
      </div>

      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">Delivered List</h5>
                <div class="table grid">
                <div id="grid1" ui-grid="delivered_request" ui-grid-auto-resize ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="delivered_request.totalItems > numRows">
              <pagination class="pagination-sm" total-items="delivered_request.totalItems" items-per-page="delivered_request.paginationPageSize" ng-model="delivered_request.paginationCurrentPage"></pagination>
      </div>
                </div>
          </div>
      </div>
    
</div>