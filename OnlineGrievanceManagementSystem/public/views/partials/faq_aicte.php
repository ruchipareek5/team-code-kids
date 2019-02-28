
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
        <div class="col-12">
        <div class="div-faq">
        <div class="div-ques row">
                <h5 class="col-md-11">What is the total number of Grievances reported to AICTE till date?</h5>
                <div class="btn add col-md-1" ng-click="show1=!show1"><img src="assets/icons/add.png" height="24" width="24" ></div>
              </div>
              
              <div ng-show="show1" class="faq-ans">
              </br>
                Number of Reported Grievances : {{totalReported}}
              </div>
        </div>
              <div class="div-faq">
              <div class="div-ques row">
                <h5 class="col-md-11">What is the total number of grievances addressed out of raised?</h5>
                <div class="btn add col-md-1" ng-click="show2=!show2"><img src="assets/icons/add.png" height="24" width="24" ></div>
              </div>
              
              <div ng-show="show2" class="faq-ans">
              </br>
                Number of Addressed Grievances : {{totalAddressed}}
              </div>
              </div>
              
              <div class="div-faq">
              <div class="div-ques row">
                <h5 class="col-md-11">What is the total number of grievances which did not get addressed on time?</h5>
                <div class="btn add col-md-1" ng-click="show3=!show3"><img src="assets/icons/add.png" height="24" width="24" ></div>
              </div>
              
              <div ng-show="show3" class="faq-ans">
              </br>
               Number of Delayed grievances : {{totalDelayed}}
              </div>
              </div>
              <div class="div-faq">
              <div class="div-ques row">
                <h5 class="col-md-11">What is the total number of grievances which got reopen?</h5>
                <div class="btn add col-md-1" ng-click="show4=!show4"><img src="assets/icons/add.png" height="24" width="24" ></div>
              </div>
              
              <div ng-show="show4" class="faq-ans">
              </br>
               Number of reopened grievances : {{totalReopened}}
              </div>
              </div>
              <div class="div-faq">
              <div class="div-ques row">
                <h5 class="col-md-11">What is the total number of grievances which are in-progress?</h5>
                <div class="btn add col-md-1" ng-click="show5=!show5"><img src="assets/icons/add.png" height="24" width="24" ></div>
              </div>
              
              <div ng-show="show5" class="faq-ans">
              </br>
              Number of in-progress grievances : {{totalInaction}}
              </div>
              </div>
              <div class="div-faq">
              <div class="div-ques row">
                <h5 class="col-md-11">What is the total number on institutes which are affiliated by A.I.C.T.E till date?</h5>
                <div class="btn add col-md-1" ng-click="show6=!show6"><img src="assets/icons/add.png" height="24" width="24" ></div>
              </div>
              
              <div ng-show="show6" class="faq-ans">
              </br>
                {{totalAffiliated}}
              </div>
              </div>
              
  </div>
      </div>

    </div>