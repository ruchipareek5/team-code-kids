
<head>
    <title></title>
    <style type="text/css">
        #committee-graphs .graph{
            height: 66.6vh;
            overflow: auto; 
        }
    </style>
</head>

<div class="container dashboard">

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
                <span class="grievance-stat-value">{{open}}</span>
                <hr>  
                <span class="grievance-stat-name">Open Grievances </span>
            </div>
        </div>

        <div class="col-md-3 grievance-box">
            <div class="grievance grievance-blue">
                <span class="grievance-stat-value">{{escalated}}</span>
                <hr>   
                <span class="grievance-stat-name">Escalated Grievances </span>
            </div>
        </div>

        <div class="col-md-3 grievance-box">
            <div class="grievance grievance-green">
                <span class="grievance-stat-value">{{addressed}}</span>
                 <hr>   
                <span class="grievance-stat-name">Addressed Grievances </span>
            </div>
        </div>
    </div>
    <div id="committee-graphs">
        <div class="row row_gap">
            <div class="col-md-6 graph">
                <div id="committee-top5_institute"></div>
            </div>

            <div class="col-md-6 graph">
                <div id="committee-grievance_yearwise"></div>
            </div>
        </div>
    </div>

</div>
<script src="js/committeeCharts.js"></script>
