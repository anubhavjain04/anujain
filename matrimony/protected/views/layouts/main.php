<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="msvalidate.01" content="F13E77F5D75D39FDAAF5860AE0897233" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="fragment" content="!" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="language" content="en" />
<meta name="copyright" content="<?php echo date('Y'); ?> bhartiya jain milan" />
<meta name="author" content="rajkamal" />
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44190584-1', 'bhartiyajainmilan.com');
  ga('send', 'pageview');
</script>
<?php include('head.php'); ?>
<script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
<script type="text/javascript" data-main="<?php echo Yii::app()->request->baseUrl; ?>/js/main/init.js" src="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/require-jquery.js"></script>
</head>
<body>
<?php echo $content; ?>
<div id="ajaxLoader" class="ajax-layer" style="display:none;">
	<span class="loading">Loading...</span>
</div>
</body>
</html>
