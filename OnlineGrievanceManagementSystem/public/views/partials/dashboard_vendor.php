<head>
    <title></title>

</head>

<div class="container dashboard">

    <div class="row row_gap">
        
    </div>
    <div id="graphs">
        <div class="row row_gap">
            <div class="col-md-6 box">
                <div class="container panel align-items-center">
                <div class="row ">
                    <div class="col-md-6 grievance-box">
                        <div class="grievance grievance-total">
                            <span class="grievance-stat-value">{{total}}</span>
                             <hr>   
                            <span class="grievance-stat-name">Total Grievances </span>
                        </div>
                    </div>

                    <div class="col-md-6 grievance-box">
                        <div class="grievance grievance-pending">
                            <span class="grievance-stat-value"> {{escalated}}</span>
                            <hr>  
                            <span class="grievance-stat-name">Escalated Grievances </span>
                        </div>
                    </div>
                

                <div class="col-md-6 grievance-box">
                    <div class="grievance grievance-escalated">
                        <span class="grievance-stat-value">{{pending}}</span>
                        <hr>   
                        <span class="grievance-stat-name"> Pending Grievances </span>
                    </div>
                </div>

                <div class="col-md-6 grievance-box">
                    <div class="grievance grievance-resolved">
                        <span class="grievance-stat-value">{{satisfied}}</span>
                         <hr>   
                        <span class="grievance-stat-name">Satisfied Grievances </span>
                    </div>
                </div>
            </div>
            </div> 
            <!-- container -->
            </div>

            <div class="col-md-6 graph">
                <div class="coverBox"> 
                    <div class="select">
                        Select Committee: <select>
                            <option ng-repeat= "y in department_list" value={{y.type}}>{{y.type}}</option>

                        </select>
                    </div>
                <div class="graph-boxShort" id="grievance_type_committee"></div>
                 </div>          
            </div>

        </div>

         <div class="row row_gap">
            <div class="col-md-6 graph">
                <div class="graph-box" id="top5_committeeWise"></div>
            </div>

            <div class="col-md-6 graph">
                <div class="graph-box" id="grievance_type"></div>
            </div>

        </div>
    </div>

</div>
<script src="js/principalCharts.js"></script>