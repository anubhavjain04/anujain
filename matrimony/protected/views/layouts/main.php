<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<meta name="copyright" content="<?php echo date('Y'); ?> bhartiya jain milan" />
<meta name="author" content="rajkamal" />
<meta content="" name="keywords">
<meta content="" name="description">
<link href="<?php echo Yii::app()->request->baseUrl."/..". Yii::app()->params['favicon']; ?>" rel="shortcut icon" type="image/x-icon" />
<?php include('head.php'); ?>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body> 
<?php include('topbar.php'); ?>
<div id="container" class="padt15">
  <?php echo $content; ?>
  <div class="clear"></div>
  <?php include('footer.php'); ?>
</div>
<div class="clear"></div>
</body>
</html>
