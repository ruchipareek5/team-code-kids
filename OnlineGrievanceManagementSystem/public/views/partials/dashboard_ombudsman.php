
<head>
    <title></title>

</head>

<div class="container dashboard">

    <div class="row row_gap">
        <div class="col-md-3 grievance-box">
            <div class="grievance grievance-total">
                <span class="grievance-stat-value">{{total}}</span>
                 <hr>   
                <span class="grievance-stat-name">Total Grievances </span>
            </div>
        </div>

        <div class="col-md-3 grievance-box">
            <div class="grievance grievance-pending">
                <span class="grievance-stat-value">{{open}}</span>
                <hr>  
                <span class="grievance-stat-name">open Grievances </span>
            </div>
        </div>

        <div class="col-md-3 grievance-box">
            <div class="grievance grievance-escalated">
                <span class="grievance-stat-value">{{escalated}}</span>
                <hr>   
                <span class="grievance-stat-name">Escalated Grievances </span>
            </div>
        </div>

        <div class="col-md-3 grievance-box">
            <div class="grievance grievance-resolved">
                <span class="grievance-stat-value">{{addressed}}</span>
                 <hr>   
                <span class="grievance-stat-name">Addressed Grievances </span>
            </div>
        </div>
    </div>
    <div id="graphs">
        <div class="row row_gap">
            <div class="col-md-6 graph">
                <div id="top5_institute"></div>
            </div>

            <div class="col-md-6 graph">
                <div class="coverBox"> 
                    <div class="select">
                        Select Institute: <select>
                            <option value="1">CVRCE</option>
                            <option value="1">Techno India</option>
                        </select>
                    </div>
                <div class="graph-boxShort" id="grievance_type_institute"></div>
                 </div> 
            </div>

        </div>

         <div class="row row_gap">
            <div class="col-md-6 graph">
                <div class="graph-box" id="grievance_yearwise"></div>
            </div>

            <div class="col-md-6 graph">
                <div class="graph-box" id="grievance_type"></div>
            </div>

        </div>
    </div>

</div>
<script src="js/ombudsmanCharts.js"></script>