<style type="text/css">
	#modal-conatiner{
		width: 100vw;
		height: 100vh;
		position: absolute;
		top: 0;
		left: 0;
		z-index: 100;
		background: rgba(0,0,0,0.8);
		display: none;
	}
	#modal{
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
	.user-box{
		text-align: center;
		padding-bottom: 0.5em;
		background: #eee;
		border:1px solid #ccc;
		margin-top: 0.8em;
	}
	.remark-user{
		text-align: center;
		font-size: 1.3em;
		color: #fff;
		font-weight: 700;
		padding: 0.2em;

	}
	.committee{
		background: #866561;
	}
	.principal{
		background: #ea8b1b; 
	}
	.ombudsman{
		background: #019cb7;
	}
	.aicte{
		background: #83be29;		
	}
	.visible{
		display: block !important;
	}
	.top{
		text-align: center;
		font-weight: 600;
	}
	.error{
		font-size: 1.2em;
		font-weight: 500;
		text-align: center;
		padding-top: 1.2em;


	}
</style>

<div id="modal-conatiner" class="">
	<div id="modal">
		<span class="close_modal">&#10060;</span>
		<span id="modalText">
			<div ng-show='remarkMessage.id'>
				<div class="container">
					<div class="row align-items-center top">
						<div class="col-md-6">
							Grievance Id: <br>{{remarkMessage.grievance_id}}
						</div>
						<div class="col-md-6">
							Date Of Issue: <br>{{remarkMessage.created_at}}
						</div>
					</div>

					<div ng-show='remarkMessage.committee_member' class="row align-items-center user-box">
						<div class="remark-user committee col-md-12">
							Committee Member
						</div>
						<div class="col-md-12 ">
							{{remarkMessage.committee_member}}
						</div>
					</div>

					<div ng-show='remarkMessage.principal' class="row align-items-center user-box">
						<div class="remark-user principal col-md-12">
							Principal
						</div>
						<div class="col-md-12">
							{{remarkMessage.principal}}
						</div>
					</div>

					<div ng-show='remarkMessage.ombudsman' class="row align-items-center user-box">
						<div class="remark-user ombudsman col-md-12">
							Ombudsman
						</div>
						<div class="col-md-12 ">
							{{remarkMessage.ombudsman}}
						</div>
					</div>

					<div ng-show='remarkMessage.aicte' class="row align-items-center user-box">
						<div class="remark-user aicte col-md-12">
							AICTE
						</div>
						<div class="col-md-12">
							{{remarkMessage.aicte}}
						</div>
					</div>
				</div>
			</div>
			<div ng-hide='remarkMessage.id' class="row">
				<div class="col-md-12 error">
					{{remarkMessage}}
				</div>
			</div>
		</span>
	</div>
	
</div>


<script type="text/javascript">
	$('.close_modal').click(function () {
		$("#modal-conatiner").removeClass("visible");
	});

	$(document).click(function(event) {
	  if (!$(event.target).closest("#modal").length) {
	    $("body").find("#modal-conatiner").removeClass("visible");
	  }
	});

</script>