<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta name="language" content="en" />
	<!-- bhartiya jain milan CSS framework -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom-layout.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/layout.css" rel="stylesheet" type="text/css" />
	<!-- javascript -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.4.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/cufon-yui.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/cufon-replace.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/NewsGoth_Dm_BT_400.font.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/tms-0.3.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/tms_presets.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/superfish.js"></script>
	<!--[if lt IE 7]>	
			<link href="<?php echo Yii::app()->
	request->baseUrl; ?>/css/ie_style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie_png.js"></script>
	<script type="text/javascript">
			   ie_png.fix('.png, #header, .menu li a span span, .menu li a span, .menu li a');
			</script>
	<![endif]-->
	<!--[if lt IE 9]>
			<style type="text/css">
				.menu ul, .menu .submenu_1 a{ behavior: url(<?php echo Yii::app()->
	request->baseUrl; ?>/js/PIE.htc); }
	</style>
	<![endif]-->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body id="page1">
<div class="main">
  <!--==============================header=================================-->
  <div id="header">
    <div class="row-1">
      <div class="row-1">
        <div class="wrapper">
          <ul class="sub-menu">
            <li><a href="#">Sitemap </a>:</li>
            <li><a href="#">FAQs </a>:</li>
            <li><a href="#">Help</a></li>
          </ul>
          <div class="text-top">Freephone : <span>+1 800 559 6580</span></div>
        </div>
      </div>
      <div class="row-2">
        <div class="wrapper">
          <div class="logo"> <a href="#"><img class="png" src="images/logo.png" alt="" />
            <!--<span>Bhartiya Jain Milan</span>-->
            </a> </div>
          <form id="form-top" action="" method="post" enctype="multipart/form-data">
            <fieldset>
            <div class="form-top">
              <label>
              <input name="name" value="search" onblur="if(this.value=='') this.value='search'" onfocus="if(this.value =='search' ) this.value=''" />
              </label>
              <a class="button-form-top" href="#" onclick="document.getElementById('form-top').submit()"><img class="png" src="images/button-form-top.png" alt="" /></a> </div>
            </fieldset>
          </form>
        </div>
      </div>
      <div class="row-3">
        <ul class="menu">
          <li><a class="active" href="#"><span><span>about us</span></span> </a>
            <div class="submenu_1">
              <ul class="menu_box">
                <li><a href="#">What we do</a></li>
                <li><a href="#">Staff</a>
                  <div class="submenu_2">
                    <ul class="menu_box">
                      <li><a href="#">director</a></li>
                      <li><a href="#">Teachers</a></li>
                    </ul>
                  </div>
                </li>
                <li><a href="#">Partnerships</a></li>
              </ul>
            </div>
          </li>
          <li><a href="#"><span><span>our charities</span></span> </a></li>
          <li><a href="#"><span><span>services</span></span> </a></li>
          <li><a href="#"><span><span>programs</span></span> </a></li>
          <li><a href="#"><span><span>global news</span></span> </a></li>
          <li><a href="#"><span><span>donations</span></span> </a></li>
          <li><a href="#"><span><span>contacts</span></span> </a></li>
        </ul>
        <div class="fright"><a class="link-top" href="#">rss </a></div>
      </div>
    </div>
  </div>
  <!--==============================content================================-->
  <?php echo $content; ?>
  <!-- ===End Content=== -->
</div>
<!--==============================footer=================================-->
<div id="footer">
  <div class="main">
    <div class="row-1">
      <div class="padding">
        <div class="wrapper">
          <div class="fleft"><a href="#"><img src="images/logo2.png" alt="" /></a></div>
          <div class="fright">
            <div class="wrapper">
              <ul class="menu-bot">
                <li><a class="active" href="#">About us </a>:</li>
                <li><a href="#">Our charities </a>:</li>
                <li><a href="#">Services </a>:</li>
                <li><a href="#">Programs </a>:</li>
                <li><a href="#">Global news </a>:</li>
                <li><a href="#">Donations </a>:</li>
                <li><a href="#">Contacts </a></li>
              </ul>
            </div>
            <div class="wrapper">
              <ul class="services">
                <li><a href="#"><img src="images/pict-2.gif" alt="" /> </a></li>
                <li><a href="#"><img src="images/pict-3.gif" alt="" /> </a></li>
                <li><a href="#"><img src="images/pict-1.gif" alt="" /> </a> Connect with us</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
	  <div>Bhartiya Jain Milan</div>
    </div>
    <div class="row-2">
      <div class="padding">
        <div class="text-bot"> <span>Bhartiya Jain Milan &copy; 2012</span> : <a href="#">Privacy Policy</a> </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
