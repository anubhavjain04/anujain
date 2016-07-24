<!doctype html>
<html lang='en' prefix="og: http://ogp.me/ns#" xmlns:ng='http://angularjs.org'>
<head>
  <meta charset="utf-8">
  <?php /*
  // comment out below line due to refresh problem
    <base href="<?php echo Yii::app()->request->baseUrl ?>/">
    */
  ?>
  <meta content="IE=Edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="chrome=IE7" http-equiv="X-UA-Compatible">
  <meta content="website" property="og:type">
  <meta content="http://www.jainmilanmatrimonial.com/" property="og:url">
  <meta content="dist/images/logo.png" property="og:image">
  <meta content="This belongs to jain community to find life partner through for marriage.|| Bhartiya Jain Milan Matrimonial" property="og:description">
  <meta name="msvalidate.01" content="F13E77F5D75D39FDAAF5860AE0897233" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="pragma" content="no-cache" />
  <meta name="fragment" content="!" />
  <meta name="language" content="en" />
  <meta name="copyright" content="<?php echo date('Y'); ?> bhartiya jain milan" />
  <meta name="author" content="rajkamal" />
  <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <?php include_once("analyticstracking.php") ?>
  <?php include('head.php'); ?>
<!--  <script type="text/javascript" src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>-->

</head>
<body>
<?php echo $content; ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl.'/dist/javascripts/application.js?v='.$version; ?>"></script>
</body>
</html>
