<!-- bhartiya jain milan matrimony CSS framework -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/css/bootstrap-theme-modified.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/css/offcanvas.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/css/kendo.common.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/css/kendo.default.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pager.css" />
 <!--[if lt IE 9]>
 	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie-fix.css" />
 	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/json2.js" ></script>
 <![endif]-->
 <!--[if lt IE 10]>
     <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/respond.min.js"></script>
 <![endif]-->
 <!--[if IE 10]>
 	<style>
 		@-webkit-viewport   { width: device-width; }
		@-moz-viewport      { width: device-width; }
		@-ms-viewport       { width: device-width; }
		@-o-viewport        { width: device-width; }
		@viewport           { width: device-width; }
 	</style>
 	<script>
 		if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
		  var msViewportStyle = document.createElement("style")
		  msViewportStyle.appendChild(
		    document.createTextNode(
		      "@-ms-viewport{width:auto!important}"
		    )
		  )
		  document.getElementsByTagName("head")[0].appendChild(msViewportStyle)
		}
 	</script>
 <![endif]-->
<!-- javascript -->
<?php
    Yii::app()->clientScript->registerScript('search', "
		var sitePath = '".Yii::app()->homeUrl."/';
		var siteBaseUrl = '".Yii::app()->request->baseUrl."';
		var controller = '".Yii::app()->getController()->id."';
		var action = '".Yii::app()->getController()->action->id."';
",CClientScript::POS_HEAD);
?>