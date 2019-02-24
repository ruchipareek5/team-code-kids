<style type="text/css">
	#commentModal-container{
		width: 100vw;
		height: 100vh;
		position: absolute;
		top: 0;
		left: 0;
		z-index: 100000;
		background: rgba(0,0,0,0.8);
		display: none;
	}
	#commentModal-container #modal{
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

</style>

<div id="commentModal-container" class="">
	<div id="modal">
		<span class="close_modal">&#10060;</span>
		<div class="container">
			<div class="row align-items-center top">
				<div class="col-md-12">
					Grievance Id:  {{comment.gid}}
				</div>
			</div>
			<form ng-submit='addCommentAPI(comment)'>
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
		$("#commentModal-container").removeClass("visible");
	});

	$("#commentModal-container").click(function(event) {
	  if (!$(event.target).closest("#modal").length) {
	    $("#commentModal-container").removeClass("visible");
	  }
	});

</script>