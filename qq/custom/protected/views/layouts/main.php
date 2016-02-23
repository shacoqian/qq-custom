<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>数据管理系统</title> 
  <meta name="keywords" content="数据管理系统" />
  <meta name="description" content="数据管理系统" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="">
  <!-- Stylesheets -->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/bootstrap.css" rel="stylesheet">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/font-awesome.css"> 
  <!-- jQuery UI -->
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/jquery-ui.css"> 
  <!-- Calendar -->
  <!--<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/fullcalendar.css">-->
  <!-- prettyPhoto -->
  <!--<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/prettyPhoto.css">-->  
  <!-- Star rating -->
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/rateit.css">
  <!-- Date picker -->
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/bootstrap-datetimepicker.min.css">
  <!-- CLEditor -->
  <!--<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/jquery.cleditor.css">--> 
  <!-- Uniform -->
  <!--<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/uniform.default.css">--> 
  <!-- Bootstrap toggle -->
  <!--<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/bootstrap-switch.css">-->
  <!-- Main stylesheet -->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/style.css" rel="stylesheet">
  <!-- Widgets stylesheet -->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/widgets.css" rel="stylesheet">   
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/static/img/favicon/favicon.png">
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.js"></script> <!-- jQuery -->
</head>

<body>



<!-- Header starts -->
 <?php $this->widget('application.components.widgets.Header'); ?>

<!-- Header ends -->

<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
         <?php $this->widget('application.components.widgets.Left'); ?>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">

        <?php echo $content; ?> 
	    <!-- Matter -->
            
	    
                
            

            <!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->

<!-- Footer starts -->
<?php $this->widget('application.components.widgets.Bottom');?>

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 

<!-- JS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/bootstrap.js"></script> <!-- Bootstrap -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery-ui-1.9.2.custom.min.js"></script> <!-- jQuery UI -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/fullcalendar.min.js"></script>  Full Google Calendar - Calendar -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.rateit.min.js"></script>  RateIt - Star rating -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.prettyPhoto.js"></script>  prettyPhoto -->

<!-- jQuery Flot -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/excanvas.min.js"></script>-->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.flot.js"></script>-->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.flot.resize.js"></script>-->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.flot.pie.js"></script>-->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.flot.stack.js"></script>-->

<!-- jQuery Notification - Noty -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.noty.js"></script>  jQuery Notify -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/themes/default.js"></script>  jQuery Notify -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/layouts/bottom.js"></script>  jQuery Notify -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/layouts/topRight.js"></script>  jQuery Notify -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/layouts/top.js"></script>  jQuery Notify -->
<!-- jQuery Notification ends -->

<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/sparklines.js"></script>  Sparklines -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.cleditor.min.js"></script>  CLEditor -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/bootstrap-datetimepicker.min.js"></script>  Date picker -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.uniform.min.js"></script>  jQuery Uniform -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/bootstrap-switch.min.js"></script>  Bootstrap Toggle -->
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/filter.js"></script>  Filter for support page -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/custom.js"></script> 
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/charts.js"></script>  Charts & Graphs -->

</body>
</html>