<!-- javascript -->
<?php
$version = 1.0;
Yii::app()->clientScript->registerScript('search', "
	var sitePath = '".Yii::app()->homeUrl."/';
	var siteBaseUrl = '".Yii::app()->request->baseUrl."';
	var version = '".$version."';
",CClientScript::POS_HEAD);
?>
<!-- bhartiya jain milan matrimony CSS framework -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl.'/dist/stylesheets/application.css?v='.$version; ?>" media="screen, projection"/>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl.'/dist/javascripts/application.js?v='.$version; ?>"></script>

