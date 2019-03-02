<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- ****** favicons starts****** -->
    <link rel="shortcut icon" href="assets/favicon/favicon.ico">
    <link rel="icon" sizes="16x16 32x32 64x64" href="assets/favicon/favicon.ico">
    <link rel="icon" type="image/png" sizes="196x196" href="assets/favicon/favicon-192.png">
    <link rel="icon" type="image/png" sizes="160x160" href="assets/favicon/favicon-160.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96.png">
    <link rel="icon" type="image/png" sizes="64x64" href="assets/favicon/favicon-64.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16.png">
    <link rel="apple-touch-icon" href="assets/favicon/favicon-57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/favicon-114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/favicon-72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/favicon-144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/favicon-60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/favicon-120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/favicon-76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/favicon-152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/favicon-180.png">
    <!--=================================================================================-->

    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="assets/favicon/favicon-144.png">
    <meta name="msapplication-config" content="assets/favicon/browserconfig.xml">
    <!-- ****** favicons ends****** -->

    <title>Online Grievance Management System</title>
    <!-- jquery should be loaded first ele chart or ng view wont work -->
    <script src="js/libraries/jquery-3.3.1.min.js"></script>

    <!-- angular starts -->
    <script src="js/libraries/angular.min.js"></script>
    <script src="js/libraries/angular-route.min.js"></script>
    <script type="text/javascript" src="js/libraries/angular-cookies.js"></script>
    <!-- angular ends -->

    <!-- bootstrap starts -->
    <link data-require="bootstrap-css@3.1.1" data-semver="3.1.1" rel="stylesheet" href="./../../js/libraries/bootstrap3.1.1.min.css" />
	<script data-require="ui-bootstrap@0.13.3" data-semver="0.13.3" src="./../../js/libraries/ui-bootstrap-tpls.min.js"></script>
    
    <script src="./../../js/libraries/angular-ui-grid/ui-grid.min.js"></script>
    
    <link rel="stylesheet" href="js/libraries/bootstrap.min.css">
    <link rel="stylesheet" href="js/libraries/bootstrap.min.css">
    
    <!-- bootstarp ends -->
  
    <script src="js/index.js"></script>

    <!-- main controller -->
     <script src="js/controllers/appController.js"></script>
    <script src="js/services/appService.js"></script>


     <!-- aicte starts -->
     <script src="js/controllers/aicteController.js"></script>
     <script src="js/services/aicteService.js"></script>
     <!-- aicte ends -->

     <!-- student starts -->
     <script src="js/controllers/studentController.js"></script>
    <script src="js/services/studentService.js"></script>
     <!-- student ends -->

      <!-- committee starts -->
     <script src="js/controllers/committeeController.js"></script>
    <script src="js/services/committeeService.js"></script>
     <!-- committee ends -->

      <!-- principal starts -->
     <script src="js/controllers/principalController.js"></script>
    <script src="js/services/principalService.js"></script>
     <!-- principal ends -->

      <!-- ombudsman starts -->
     <script src="js/controllers/ombudsmanController.js"></script>
    <script src="js/services/ombudsmanService.js"></script>
     <!-- ombudsman ends -->

      <!-- vendor starts -->
     <script src="js/controllers/vendorController.js"></script>
    <script src="js/services/vendorService.js"></script>
     <!-- vendor ends -->
    

      
<script src="./../../js/libraries/highcharts.js"></script>
<script src="./../../js/libraries/exporting.js"></script>
<script src="./../../js/libraries/export-data.js"></script>

<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/response.css">
    
</head>
<body ng-app="grievancesystem">
    <div id="google_translate_element"></div>
      <script type="text/javascript">
         function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
         }
      </script>
      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <div ng-controller='appController'>
        <div ng-view></div>

        </div>
     </div>
    </div>
   
</body>

<div class="modal"><!-- Place at bottom of page --></div>
</html>
