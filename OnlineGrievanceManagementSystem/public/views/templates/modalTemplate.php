<style type="text/css">
	#modal-container{
		width: 100vw;
		height: 100vh;
		position: absolute;
		top: 0;
		left: 0;
		z-index: 100000;
		background: rgba(0,0,0,0.8);
		display: none;
	}
	#modal-container #modal{
		width: 60%;
		min-height: 30%;
		max-height: 75%;
		background: #fff;
		border-radius: 10px;
		overflow-y: auto;
		position: relative;
		padding: 2.2em;
		top: 50%;
		left: 50%;
		color: #000;
		transform: translate(-50%,-50%);
		z-index: 20;

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

	.visible{
		display: block !important;
	}
	.heading{
		color: #344052;
		font-weight: 500;
		font-size: 1.2em;
		margin-bottom: 0.5em;
	}
	.heading .history-icon{
		max-width: 25px;
		margin-left: 0.5em;
		display: inline-block;
	}
	.history-icon img{
		width: 100%;
	}
</style>

<div id="modal-container" class="">
	<div id="modal">
		<span class="close_modal">&#10060;</span>
				<div class="container">
					<div class="heading">
						History
						<span class="history-icon"><img src="assets/icons/history.png"></span>
					</div>
					<div id="grid1" ui-grid="comment_history" ui-grid-pagination="" ui-grid-cellNav ui-grid-auto-resize ></div>
                      <div class="text-center page" ng-show="comment_history.totalItems > comment_numRows">
              <pagination class="pagination-sm" total-items="comment_history.totalItems" items-per-page="comment_history.paginationPageSize" ng-model="comment_history.paginationCurrentPage"></pagination>
				</div>
			</div>
			<div ng-hide='remarkMessage.id' class="row">
				<div class="col-md-12 error">
					{{remarkMessage}}
				</div>
			</div>

	</div>
	
</div>


<script type="text/javascript">
	$('.close_modal').click(function () {
		$("#modal-container").removeClass("visible");
	});

	$(document).click(function(event) {
	  if (!$(event.target).closest("#modal").length) {
	    $("body").find("#modal-container").removeClass("visible");
	  }
	});

</script>