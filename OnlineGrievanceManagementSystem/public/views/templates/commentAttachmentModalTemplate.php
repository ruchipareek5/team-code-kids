<style type="text/css">
	#commentAttachmentModal-container{
		width: 100vw;
		height: 100vh;
		position: absolute;
		top: 0;
		left: 0;
		z-index: 100000;
		background: rgba(0,0,0,0.8);
		display: none;
	}
	#commentAttachmentModal-container #modal{
		width: 40%;
		min-height: 30%;
		max-height: 75%;
		background: #fff;
		border-radius: 10px;
		padding: 2.2em;
		overflow-y: auto;
		position: relative;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);

	}
	.close_modal{
		font-size: 1.2em;
		position: relative;
		top: 5;
		right: 0;
		display: block;
		text-align: right;
		cursor: pointer;
		margin: 0.2em;	
	}
	.textbox{
		width: 100%;
		border: 1px solid steelblue;
		height: 10%;
		border-radius: 5px;
		padding: 0.2em 0.8em;
		margin-top: 0.5em;
		margin-bottom: 0.8em;
	}

	.grid
{
    margin:0;
    width: 100%;
    padding:0;
    height: auto !important;
    text-align: center;
    font-size: 0.85em;
    color: #6F6E6F;
    background-color: white;

}

.div-attachment input{
    display: inline-block;
    background-color: #F2F1F2 ;
    border: 1px solid #D7D7D7;
    padding: 0.5em;
    width: 17em !important;
    margin-left: 15px;
}
#attachment {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

#attachment + label {
    display: inline-block;
    color: white;
    background-color: #0098BC;
    padding: 0.5em;
    border-radius: 0.5em;
    text-align: center;
    margin-left: 10px;
    box-shadow: 2px 2px 2px  #48537c,0 0 10px#4e5982;
    width: 100px;
}


#attachment + label {
    cursor: pointer; /* "hand" cursor */
}
#attachment:focus + label,
#attachment + label:hover {
    background-color: #47a2b7;
}
#attachment:focus + label {
    outline: 1px dotted #000;
    outline: -webkit-focus-ring-color auto 5px;
}


</style>

<div id="commentAttachmentModal-container" class="">
	<div id="modal">
		<span class="close_modal">&#10060;</span>
		<div class="container">
			<form ng-submit='addCommentAttachementAPI(comment)' enctype="multipart/form-data">
			<div class="row align-items-center top">
				<div class="col-md-12">
					Grievance Id:  {{comment.gid}}
				</div>
				<div class="col-md-12 col-lg-12 div-attachment">

                  <label>Attachment<span class="imp"></span></label>
                  <input type="text" name="selected_file" class="selected_file" id="selected_file" ng-model="selected_file" placeholder="Upload appropriate file" readonly="readonly">
                  <input type="file" name="attachment" class="attachment" ng-files="setTheFiles($files)" id="attachment" > 

              <label  for="file"  class="attachmentbtn" >Browse</label>
              
            </div>
			</div>
			
				<input type="text" name="" hidden="hidden" ng-model="comment.gid">
				<input class="textbox" style="height: 100px;" type="text" name="details" id="details" ng-model="comment.message" 
               rows=5 cols=87 placeholder="Please give your comment" required="required">
             </input>
             <div align="center" class="col-md-12 col-lg-12 dashboard_btn"><button class="btn button-submit">Submit</button></div>
			</form>
		</div>
	</div>
	
</div> 


<script type="text/javascript">
	$('.close_modal').click(function () {
		$("#commentAttachmentModal-container").removeClass("visible");
	});

	$("#commentAttachmentModal-container").click(function(event) {
	  if (!$(event.target).closest("#modal").length) {
	    $("#commentAttachmentModal-container").removeClass("visible");
	  }
	});

</script>

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