<style type="text/css">
	#committeeModal-container{
		width: 100vw;
		height: 100vh;
		position: absolute;
		top: 0;
		left: 0;
		z-index: 100000;
		background: rgba(0,0,0,0.8);
		display: none;
	}
	#committeeModal-container #modal{
		width: 68%;
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
		font-size: 1.2em;
		margin-bottom: 0.5em;
	}
	.heading .icon{
		max-width: 25px;
		margin-left: 0.5em;
		display: inline-block;
	}
	.icon img{
		width: 100%;
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
</style>

<div id="committeeModal-container" class="">
	<div id="modal">
		<span class="close_modal">&#10060;</span>
				<div class="container">
					<div class="heading">
						Committee Details
						<span class="icon"><img src="assets/icons/student.png"></span>
					</div>
					<div id="grid1" ui-grid="committee_detail" ui-grid-pagination="" ui-grid-cellNav ui-grid-auto-resize class="grid" ></div>
                      <div class="text-center page" ng-show="committee_detail.totalItems > '1'">
              <pagination class="pagination-sm" total-items="committee_detail.totalItems" items-per-page="committee_detail.paginationPageSize" ng-model="committee_detail.paginationCurrentPage"></pagination>
				</div>
			</div>
			

	</div>
	
</div>


<script type="text/javascript">
	$('.close_modal').click(function () {
		$("#committeeModal-container").removeClass("visible");
	});

	$(document).click(function(event) {
	  if (!$(event.target).closest("#modal").length) {
	    $("body").find("#committeeModal-container").removeClass("visible");
	  }
	});

</script>