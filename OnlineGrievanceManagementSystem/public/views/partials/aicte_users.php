
<head>
    <title>AICTE Grievances</title>
</head>


<div class="container">
      <div class="row row_gap">
          
          <div class=" open-grievance div-form" >
                 <h5 class="grievance-heading">Import<h5>
                 <div class="table " style="font-size:0.8em"  style="border-radius:0.3px;">
                    <div class="form-box">
                    <form ng-submit='uploadExcel()' enctype="multipart/form-data">
                        <select ng-model="file.role_type">
                            <option value="">Select</option>
                            
                            <option value="0">University</option>
                            <option value="1">Ombudsman</option>
                            <option value="2">College</option>
                            
                        </select> &nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="" style="display:inline;">
                        <label>Attachment<span class="imp"></span></label>
                        <input type="text" name="selected_file" class="selected_file" id="selected_file" ng-model="selected_file" placeholder="Upload appropriate file" readonly="readonly">
                        <input type="file" name="attachment" class="attachment" ng-files="setTheFiles($files)" id="attachment" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required > 

                        <label  for="file"  class="attachmentbtn" style="background-color:rgb(1,156,183);border-radius:0.1em;" >Browse</label>
                        
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn button-submit" style="border-radius:0.1em;">Submit</button>
                        
                    </form>
                        
                    <br>

                       Download sample format   &nbsp;&nbsp;&nbsp;&nbsp; <button class="btn btn-success" ng-click ="downloadAttachment('documents/university.xlsx')">Download</button>
                    </div>
                 </div>
          </div>
      </div>

      <div class="row row_gap">
          <div class="col-lg-12 col-md-12 open-grievance ">
              <h5 class="grievance-heading">History</h5>
                <div class="table ">
                <div id="grid1" ui-grid="add_user" ui-grid-pagination="" class="grid"></div>
                <div class="text-center page" ng-show="add_user.totalItems > numRows">
              <pagination class="pagination-sm" total-items="add_user.totalItems" items-per-page="add_user.paginationPageSize" ng-model="add_user.paginationCurrentPage"></pagination>
      </div>
 
</div>

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