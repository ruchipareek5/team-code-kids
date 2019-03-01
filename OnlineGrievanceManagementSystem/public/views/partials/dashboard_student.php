
<div class="container">
   <div class="row row_gap">
        <div class="col-md-3 grievance-box">
            <div class="grievance grievance-brown">
                <span class="grievance-stat-value">{{total}}</span>
                <hr>  
                <span class="grievance-stat-name">Total Grievances </span>
  
            </div>
        </div>

        <div class="col-md-3 grievance-box">
            <div class="grievance grievance-orange">
                <!-- <span class="number">{{total_grievances}} <img src="assets/icons/barGraph.png"></span>
                <span>Total Grievance</span> -->
                <span class="grievance-stat-value">{{escalated}}</span>
                  <hr>   
                <span class="grievance-stat-name">Escalated Grievances </span>
            </div>
        </div>

        <div class="col-md-3 grievance-box">
            <div class="grievance grievance-blue">
                <!-- <span class="number">{{total_grievances}} <img src="assets/icons/barGraph.png"></span>
                <span>Total Grievance</span> -->
                <span class="grievance-stat-value">{{satisfied}}</span>
                 <hr>   
                <span class="grievance-stat-name">Satisfied Grievances </span>
                
            </div>
        </div>

        <div class="col-md-3 grievance-box">
            <div class="grievance grievance-green">
                <!-- <span class="number">{{total_grievances}} <img src="assets/icons/barGraph.png"></span>
                <span>Total Grievance</span> -->
                <span class="grievance-stat-value">{{pending}}</span>
                  <hr>  
                <span class="grievance-stat-name">Pending Grievances </span>
                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 ">
            <h1 id="dash-head">Is something bothering you? Let us know.</h1>
        </div>
    </div>
    <div class="container">
    <div class="col-lg-8">
    <form ng-submit="lodgeGrievance()" name="lodgeGrievanceForm" enctype="multipart/form-data">
    <div class="grievance-form">
        <div class="row"> 
            <div class="col-md-12 col-lg-12 div-form">
               <label>Grievances Type<span class="imp">*</span></label>
                <select ng-model="grievance.type" required="required">
                    <option value="">Select</option>
                    <option ng-repeat= "y in grievanceagainst" value={{y.category}} >{{y.category}}</option>
                </select>
            </div>           
        </div>
        <div class="row">
           <div class="col-md-12 col-lg-12 div-detail">    
              <label id="label-detail">Details<span class="imp">*</span> </label> </br>           
              <input style="height: 100px;" type="text" name="details" id="details" ng-model="grievance.detail" 
               rows=5 cols=87 placeholder="Please give all the details of your Problem" required="required">
             </input>
            </div>
         </div>

             <div class="col-md-11 col-lg-11 div-attachment">

                  <label>Attachment<span class="imp"></span></label>
                  <input type="text" name="selected_file" class="selected_file" id="selected_file" ng-model="grievance.selected_file" placeholder="Upload file pdf, jpg, jpeg, png" readonly="readonly">
                  <input type="file" name="attachment" class="attachment" ng-files="setTheFiles($files)" id="attachment" > 

              <label  for="file"  class="attachmentbtn" >Browse</label>
              
            </div>
      
  
        <div align="left" class="col-md-12 col-lg-12 dashboard_btn" style="color: white"><button class="btn button-submit">Submit</button></div>
    </div>
    </form>
    <!-- grievance form -->
</div>
<div class="col-lg-4">
    <!--image box-->
</div>
</div>
<!-- container -->
<script>
    $(document).ready( function() {

        $(".attachmentbtn").click(function(){
        $(".attachment").click();
    });
    $('.attachment').change(function() {
    
    $('.selected_file').val($('.attachment')[0].files[0].name);
    });

    });
</script>