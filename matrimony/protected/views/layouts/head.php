<!-- bhartiya jain milan matrimony CSS framework -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pager.css" />
<!-- javascript -->
<?php
    Yii::app()->clientScript->registerScript('search', "
		var sitePath = '".Yii::app()->homeUrl."/';
		var siteBaseUrl = '".Yii::app()->request->baseUrl."';
		var controller = '".Yii::app()->getController()->id."';
		var action = '".Yii::app()->getController()->action->id."';
",CClientScript::POS_HEAD);
?>