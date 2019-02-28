
<head>
    <title>FAQ </title>
</head>
  <div class="container">
      <div class="row row_gap">
        <div class="col-lg-12 col-md-12">
          <h4 id="faq-head">Frequently Asked Question(FAQs)</h4>
        </div>
      </div>

      <div class="row" >
        <div class="col-12 div-faq ">
              <div class="div-ques">
                <h5>What is the total number of Grievances reported to AICTE till date?</h5>
              </div>
              <div class="btn add" ng-click="show=!show"><img src="assets/icons/add.png" height="24" width="24" ></div>
              <div ng-show="show">
              </br>
                {{totalReported}}
              </div>

              <div class="div-ques">
                <h5>What is the total number of grievances addressed out of raised?</h5>
              </div>
              <div class="btn add" ng-click="show=!show"><img src="assets/icons/add.png" height="24" width="24" ></div>
              <div ng-show="show">
              </br>
                {{totalAddressed}}
              </div>
              <div class="div-ques">
                <h5>What is the total number of grievances which did not get addressed on time?</h5>
              </div>
              <div class="btn add" ng-click="show=!show"><img src="assets/icons/add.png" height="24" width="24" ></div>
              <div ng-show="show">
              </br>
                {{totalDelayed}}
              </div>

              <div class="div-ques">
                <h5>What is the total number of grievances which got reopen?</h5>
              </div>
              <div class="btn add" ng-click="show=!show"><img src="assets/icons/add.png" height="24" width="24" ></div>
              <div ng-show="show">
              </br>
                {{totalReopened}}
              </div>

              <div class="div-ques">
                <h5>What is the total number of grievances on which are in-progress?</h5>
              </div>
              <div class="btn add" ng-click="show=!show"><img src="assets/icons/add.png" height="24" width="24" ></div>
              <div ng-show="show">
              </br>
                {{totalInaction}}
              </div>
              <div class="div-ques">
                <h5>What is the total number on institutes which are affiliated by A.I.C.T.E till date?</h5>
              </div>
              <div class="btn add" ng-click="show=!show"><img src="assets/icons/add.png" height="24" width="24" ></div>
              <div ng-show="show">
              </br>
                {{totalAffiliated}}
              </div>
  </div>
      </div>

    </div>