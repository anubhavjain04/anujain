<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta name="google-site-verification" content="awXJPP_NOlQAWUq94BTPaan1ObEOGOMX5wOllAITZpc" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta name="language" content="en" />
    <meta name="copyright" content="<?php echo date('Y'); ?>_bhartiya_jain_milan" />
    <meta name="author" content="rajkamal" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<!-- bhartiya jain milan CSS framework -->    
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui/jquery-ui.css" /> 
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui/jquery-ui-timepicker-addon.css" /> 
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom-layout.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/droplist/droplist.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/pager.css" rel="stylesheet" type="text/css" />
	<!-- javascript -->
    <script type="text/javascript">
	var sitePath = '<?php echo Yii::app()->homeUrl; ?>/';
	var controller = '<?php echo Yii::app()->getController()->id;?>';
	var action = '<?php echo Yii::app()->getController()->action->id;?>';
	</script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kdunicode.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.4.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cookie.js" type="text/javascript"></script>
    <script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.min.js"></script>
	<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-sliderAccess.js"></script>
    <script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-timepicker-addon.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.pause.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.marquee.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/browser.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/tms-0.3.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/tms_presets.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/scroller.js" type="text/javascript"></script>
    
	<!--[if lt IE 7]>
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie_style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie_png.js"></script>
		<script type="text/javascript">
			   ie_png.fix('.png, #header, .menu li a span span, .menu li a span, .menu li a');
		</script>
	<![endif]-->
	<!--[if lt IE 9]>
		<style type="text/css">
			.menu ul, .menu .submenu_1 a{ behavior: url(<?php echo Yii::app()->request->baseUrl; ?>/js/PIE.htc); }
	</style>
	<![endif]-->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-44190584-1', 'bhartiyajainmilan.com');
	  ga('send', 'pageview');
	</script>
     
</head>
<body id="page1">
<div class="main">
  <!--==============================header=================================-->
  <div id="header">
    <div class="row-1">
      <div class="row-1">
        <div class="wrapper">
           <ul class="sub-menu">
            <li><a href='<?php echo Yii::app()->createUrl("/staticPages/journey");?>'>History</a>|</li>
            <li><a href='<?php echo Yii::app()->createUrl("/staticPages/monogramSutra");?>'>Monogram &amp; Sutra</a>|</li>
            <li><a href='<?php echo Yii::app()->createUrl("/staticPages/mahaveer");?>'>Prayer</a>|</li>
            <li><a href='<?php echo Yii::app()->createUrl("/magazine/monthlyMagazine");?>'>Magazines &amp; Newspapers</a>|</li>
            <li><a href='<?php echo Yii::app()->createUrl("/memberDetails/searchMember");?>'>Search Member</a>|</li>
            <li><a href='<?php echo Yii::app()->createUrl("/staticPages/sendProfile");?>'>Send Biodata / Profile</a>|</li>            
            <li><a href='<?php echo Yii::app()->createUrl("/staticPages/contactUs");?>'>Contact Us</a></li>            
          </ul>
          <div class="text-top">
            	<?php include("login.php") ?>
          </div>
         </div>
      </div>
      <div class="row-2">
        <div class="l_logo"><a href='<?php echo Yii::app()->createUrl("/");?>'><img class="png" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="Bhartiya Jain Milan logo" /></a></div>
        <div class="r_logo">
			<div class="leftData">
			   <div class="sutra hindi">
                     <a href='<?php echo Yii::app()->createUrl("/staticPages/ahinsa");?>' title="Ahinsa">अहिंसा</a>&nbsp; &bull; &nbsp;                     
                     <a href='<?php echo Yii::app()->createUrl("/staticPages/service");?>' title="Service">सेवा</a>&nbsp;&bull; &nbsp;
                     <a href='<?php echo Yii::app()->createUrl("/staticPages/help");?>' title="Help">सहायता</a>&nbsp; &bull; &nbsp;
                     <a href='<?php echo Yii::app()->createUrl("/staticPages/sanskar");?>' title="Sanskar">संस्कार</a>&nbsp; &bull; &nbsp;
                     <a href='<?php echo Yii::app()->createUrl("/staticPages/social");?>' title="Social">सामाजिक</a>&nbsp; &bull; &nbsp;
                     <a href='<?php echo Yii::app()->createUrl("/staticPages/educational");?>' title="Educational">शैक्षिक</a>&nbsp; &bull; &nbsp;
                     <a href='<?php echo Yii::app()->createUrl("/staticPages/vaganism");?>' title="Vaganism">शाकाहार</a>&nbsp; &bull; &nbsp;
                     <a href='<?php echo Yii::app()->createUrl("/staticPages/culture");?>' title="Culture">संस्कृति</a>&nbsp; &bull; &nbsp;
                     <a href='<?php echo Yii::app()->createUrl("/staticPages/jainUnity");?>' title="Jain Unity">जैन एकता</a>&nbsp; &bull; &nbsp;
                     <a href='<?php echo Yii::app()->createUrl("/staticPages/religious");?>' title="Religious">धार्मिक</a>	   
			   </div>
				<div class="wrapper">
					<div class="logo"> <a href='<?php echo Yii::app()->createUrl("/");?>'><img class="png" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-name.gif" alt="Bhartiya Jain Milan" /></a> </div>
				</div>
			</div>
			<div class="rightData ">
				<div class="matrimony">
                	<div class="padding"><a href="http://matrimony.bhartiyajainmilan.com" target="_blank" title="Jain Milan Matrimonial">click here</a></div>
                </div>
			</div>
			
           <!--<div>lghfkd</div>--> 
         </div>
      </div>
      <div class="row-3">
        <?php include("mainmenu.php"); ?>
      </div>
    </div>
  </div>
  <!--==============================content================================-->
  <?php echo $content; ?>
  <!-- ===End Content=== -->
</div>
<!--==============================footer=================================-->
<div id="footertagline">
	<div class="main">
    	<span class="hindi">    
        हम नहीं दिगम्बर, श्वेताम्बर, तेरहपंथी, स्थानकवासी, हम एक पंथ के अनुयायी, हम एक देव के विश्वासी।
        </span>
	</div>
</div>
<div id="footer">
  <div class="main">
    <div class="row-1">
      <div class="padding">
        <div class="wrapper">
          <div class="fleft"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo2.png" alt="" /></a></div>
          <div class="fright">
            <div class="wrapper">
              <ul class="menu-bot">
                <li><a class="active" href="#">About us </a>:</li>
                <li><a href='<?php echo Yii::app()->createUrl("/staticPages/journey");?>'>History</a>:</li>
            	<li><a href='<?php echo Yii::app()->createUrl("/staticPages/monogramSutra");?>'>Monogram &amp; Sutra</a>:</li>
                <li><a href='<?php echo Yii::app()->createUrl("/staticPages/mahaveer");?>'>Prayer</a>:</li>
                <li><a href='<?php echo Yii::app()->createUrl("/magazine/monthlyMagazine");?>'>Magazines &amp; Newspapers</a>:</li>
                <li><a href="#">Constitution / By Laws</a>:</li>
                <li><a href='<?php echo Yii::app()->createUrl("/staticPages/sendProfile");?>'>Send Biodata / Profile</a>:</li>
                <li><a href='<?php echo Yii::app()->createUrl("/staticPages/contactUs");?>'>Contact us </a></li>
              </ul>
            </div>
            <div class="wrapper">
              <ul class="services">
                <li><a href="http://www.facebook.com/bhartiyajainmilan" target="_blank" title="Bhartiya Jain Milan on Facebook"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/pict-2.gif" alt="" /> </a></li>
                <li><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/pict-3.gif" alt="" /> </a></li>
                <li><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/pict-1.gif" alt="" /> </a> Connect with us</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
	  <div>Bhartiya Jain Milan</div>
    </div>
    <div class="row-2">
      <div class="padding">
        <div class="text-bot"> <span>Bhartiya Jain Milan &copy; <?php echo date('Y'); ?></span> : <a href="#">Privacy Policy</a> </div>
      </div>
    </div>
  </div>
</div>
<div id="mainAdvertisement" title="Advertisement" style="display:none;">
	<div id="mainAdvData">	
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/resources/advertisement-img/default-screen-add.jpg" alt="Advertisement" height="500" />
	</div>
</div>
<div id="footer_message" class="hindi">	
    <?php 
		$criteria = new CDbCriteria();
		$criteria->condition = "Status=1 and LineNo=:LineNo";
		$criteria->order = ' MessageOrder ASC ';
	?>
    <div class="right">
    	<div class="left" style=""></div>
        <div class="big-msg bottom-message" >
        	<div class='marquee'>
            <?php
				$criteria->params = array(':LineNo' => 1);
				$message1 = Message::model()->findAll($criteria);
				
				foreach($message1 as $item){
					echo '<span class="info-icon"></span>';		
					echo '<span>'.$item['Message'].'</span>';
				}
			?>
			</div>
        </div>
        <div class="small-msg bottom-message">
            <div class='marquee'>
            <?php
				$criteria->params = array(':LineNo' => 2);
				$message2 = Message::model()->findAll($criteria);
				
				foreach($message2 as $item){
					echo '<span class="info-icon"></span>';		
					echo '<span>'.$item['Message'].'</span>';
				}
			?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
