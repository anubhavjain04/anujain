<!-- bhartiya jain milan matrimony CSS framework -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/validationEngine.jquery.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui/jquery-ui-timepicker-addon.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom-layout.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pager.css" />
<!-- javascript -->
<script type="text/javascript">
var sitePath = '<?php echo Yii::app()->homeUrl; ?>/';
var controller = '<?php echo Yii::app()->getController()->id;?>';
var action = '<?php echo Yii::app()->getController()->action->id;?>';
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/kdunicode.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.validationEngine.js"></script>
<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.min.js"></script>
<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.scrollTo.js"></script>
<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.localscroll.js"></script>
<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-sliderAccess.js"></script>
<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-timepicker-addon.js"></script>
<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.activeMenu.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#topmenu').activeMenu({defaultSite: '<?php echo Yii::app()->createUrl("/");?>'});
	});
</script>