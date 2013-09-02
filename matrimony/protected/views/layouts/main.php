<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="language" content="en" />
<meta name="copyright" content="<?php echo date('Y'); ?> bhartiya jain milan" />
<meta name="author" content="rajkamal" />
<meta content="" name="keywords" />
<meta content="" name="description" />
<link href="<?php echo Yii::app()->request->baseUrl."/..". Yii::app()->params['favicon']; ?>" rel="shortcut icon" type="image/x-icon" />
<?php include('head.php'); ?>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<script type="text/javascript" data-main="<?php echo Yii::app()->request->baseUrl; ?>/js/main/init.js" src="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/require-jquery.js"></script>
</head>
<body>
<?php include('topbar.php'); ?>
<?php echo $content; ?>
<div class="clearfix"></div>
<div class="container">
  <?php include('footer.php'); ?>
</div>
<div class="clearfix"></div>
<div id="pageLoader" style="display: none;" class="row-fluid">
  <div class="mid-layer">
    <h2>Loading......</h2>
    <div class="progress progress-striped active">
      <div class="bar" style="width: 0%;"></div>
    </div>
  </div>
</div>
</body>
</html>
