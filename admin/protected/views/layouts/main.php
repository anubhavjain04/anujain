<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui/jquery-ui.css" /> 
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui/jquery-ui-timepicker-addon.css" /> 
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom-layout.css" />    
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/layout.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/blue/styles.css" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/kdunicode.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/enhance.js"></script>
<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/excanvas.js"></script>
<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.min.js"></script>
<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-sliderAccess.js"></script>
<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-timepicker-addon.js"></script>
<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.wysiwyg.js"></script>
<script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/js/visualize.jQuery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/functions.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.activeMenu.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.navigation').activeMenu();
	});
</script>

<!-- Notifications Box/Pop-Up End -->
<!--[if IE 6]>
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/png_fix.js'></script>
    <script type='text/javascript'>
      DD_belatedPNG.fix('img, .notifycount, .selected');
    </script>
    <![endif]-->
<script type="text/javascript">
	var sitePath = '<?php echo Yii::app()->homeUrl; ?>/';
	var controller = '<?php echo Yii::app()->getController()->id;?>';
	var action = '<?php echo Yii::app()->getController()->action->id;?>';
	</script>
<style type="text/css">
/* css for showing menu in hierarical order */
.menu_hierarchy ul {
	margin: 0 0 18px 2.5em;
}
.menu_hierarchy ul li {
	list-style: disc;
}
</style>
</head>
<body>
<?php if(!Yii::app()->user->isGuest) { ?>
<div id="header"><a
	href="<?php echo Yii::app()->homeUrl.'/site/dashboard';?>"
	title="BJM Admin"><img
	src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png"
	alt="Control Panel" class="logo" /></a>
  <div class="dashboard"><a
	href="<?php echo Yii::app()->homeUrl.'/site/dashboard';?>">Bhartiya Jain Milan</a></div>
</div>

<!-- Top Breadcrumb Start -->
<div id="breadcrumb">
  <ul>
    <li><img
		SRC="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/icon_breadcrumb.png"
		alt="Location" /></li>
    <li class="current">Control Panel</li>
  </ul>
</div>
<!-- Top Breadcrumb End --> 

<!-- Right Side/Main Content Start -->
<div id="rightside">
  <div class="contentcontainer sml right"><?php echo $content; ?></div>
  <div style="clear: both;"></div>
  <div id="footer">&copy; Copyright 2012 <a
	href="http://www.bhartiyajainmilan.com" target="_blank">Bhartiya Jain
    Milan</a></div>
</div>
<!-- Right Side/Main Content End --> 
<!-- Left Dark Bar Start -->
<div id="leftside">
  <div class="user"><img
	src="<?php echo Yii::app()->request->baseUrl; ?>/img/avatar.png"
	width="44" height="44" class="hoverimg" alt="Avatar" />
    <p>Logged in as:</p>
    <p class="username"><?php echo Yii::app()->user->name;?></p>
    <!--<p class="userbtn"><a href="#" title="">Profile</a></p>-->
    <p class="userbtn"><a
	href="<?php echo Yii::app()->homeUrl;?>/adminProfile/profile/id/<?php echo Yii::app()->user->id;?>"
	title="">Profile</a></p>
    <p class="userbtn"><a
	href="<?php echo Yii::app()->homeUrl.'/site/logout';?>">Logout</a></p>
  </div>
  <ul id="nav">
    <!--<li>
                <ul class="navigation">
                    <li class="heading selected">Current Section</li>
                    <li><a href="#" title=""></a></li>
                    <li><a href="<?php //echo Yii::app()->homeUrl.'/news/create';?>" title="Add News">Manage Templates</a></li>
                </ul>
            </li>-->
    <li><a class="collapsed heading">Authentication</a>
      <ul class="navigation">
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/functionMaster/admin';?>"
			title="Manage Rights">Manage Rights</a></li>
        <!--<li><a href="<?php //echo Yii::app()->homeUrl.'/functionMaster/create';?>" title="Add Right">Add Right</a></li>-->
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/functionGroupMaster/admin';?>"
			title="Manage Right's Group">Manage Right's Group</a></li>
        <!--<li><a href="<?php //echo Yii::app()->homeUrl.'/functionGroupMaster/create';?>" title="Add Right's Group">Add Right's Group</a></li>-->
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/functionGroupAuth/admin';?>"
			title="Assign Rights to Group">Assign Rights to Group</a></li>
        <!--<li><a href="<?php //echo Yii::app()->homeUrl.'/functionGroupAuth/create';?>" title="Add Right to Group">Add Right to Group</a></li>-->
      </ul>
    </li>
    <li><a class="collapsed heading">User</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/loginMaster/admin';?>"
			title="Manage Users">Manage Users</a></li>
        <li><a href="<?php echo Yii::app()->homeUrl.'/loginMaster/create';?>"
			title="Add User">Add User</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/userFunctionAuth/admin';?>"
			title="Assign Rights to User">Assign Rights to User</a></li>
      </ul>
    </li>
    <li><a class="expanded heading">Zones</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/zoneMaster/admin';?>"
			title="Manage Zones">Manage Zone</a></li>
        <li><a href="<?php echo Yii::app()->homeUrl.'/zoneMaster/create';?>"
			title="Add Zone">Add Zone</a></li>
      </ul>
    </li>
    <li><a class="collapsed heading">Branches</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/branchMaster/admin';?>"
			title="Manage Branches">Manage Branches</a></li>
        <li><a href="<?php echo Yii::app()->homeUrl.'/branchMaster/create';?>"
			title="Add Branch">Add Branch</a></li>
      </ul>
    </li>
    <li><a class="collapsed heading">Level</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/levelMaster/admin';?>"
			title="Manage Levels">Manage Levels</a></li>
        <li><a href="<?php echo Yii::app()->homeUrl.'/levelMaster/create';?>"
			title="Add Level">Add Level</a></li>
      </ul>
    </li>
    <li><a class="collapsed heading">Post</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/postMaster/admin';?>"
			title="Manage Posts">Manage Posts</a></li>
        <li><a href="<?php echo Yii::app()->homeUrl.'/postMaster/create';?>"
			title="Add Post">Add Post</a></li>
        <li><a href="<?php echo Yii::app()->homeUrl.'/groupMaster/admin';?>"
			title="Add Post">Manage Post Groups</a></li>
         <li><a href="<?php echo Yii::app()->homeUrl.'/groupPosts/admin';?>"
			title="Add Post">Assign Posts to Group</a></li>        
      </ul>
    </li>
    <li><a class="collapsed heading">Member Details</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/memberDetails/admin';?>"
			title="Manage Member Details">Manage Member Details</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/memberDetails/create';?>"
			title="Add Member Details">Add Member Details</a></li>        
        <li><a href="<?php echo Yii::app()->homeUrl.'/memberPost/admin';?>"
			title="Assign Member's Post">Assign Member's Post</a></li>
      </ul>
    </li>
    <li><a class="collapsed heading">Zone Members</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/zoneMembers/admin';?>"
			title="Manage Zone Members">Manage Zone Members</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/zoneMembers/create';?>"
			title="Add Zone Member">Add Zone Member</a></li>
      </ul>
    </li>
    <li><a class="collapsed heading">Branch Members</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/milanDetails/admin';?>"
			title="Manage Branch Members">Manage Branch Members</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/milanDetails/create';?>"
			title="Add Branch Member">Add Branch Member</a></li>
      </ul>
    </li>
    <li><a class="collapsed heading">Programs</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/programs/admin';?>"
			title="Manage Member Details">Manage Programs</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/programs/create';?>"
			title="Add Member Details">Add Program</a></li>
      </ul>
    </li>
     <li><a class="collapsed heading">Magazine/Booklet</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/magazineType/admin';?>"
			title="Manage Member Details">Manage Magazine Type</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/magazineType/create';?>"
			title="Add Member Details">Add Magazine Type</a></li>
        <li><a href="<?php echo Yii::app()->homeUrl.'/magazine/admin';?>"
			title="Manage Member Details">Manage Magazine</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/magazine/create';?>"
			title="Add Member Details">Add Magazine</a></li>    
      </ul>
    </li>
    <li><a class="collapsed heading">Advertisement</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/advertisement/admin';?>"
			title="Manage Advertisement">Manage Advertisement</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/advertisement/create';?>"
			title="Add Advertisement">Add Advertisement</a></li>           
      </ul>
    </li>
    <li><a class="collapsed heading">Message</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/message/admin';?>"
			title="Manage Message">Manage Message</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/message/create';?>"
			title="Add Message">Add Message</a></li>           
      </ul>
    </li> 
     <li><a class="collapsed heading">News</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/news/admin';?>"
			title="Manage Message">Manage News</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/news/create';?>"
			title="Add Message">Add News</a></li>           
      </ul>
    </li>   
    <li><a class="collapsed heading">Matrimony Members</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/matrimonyMembers/admin';?>"
			title="Manage Matrimony Members">Manage Matrimony Members</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/matrimonyMembers/create';?>"
			title="Add Advertisement">Add Matrimony Members</a></li>           
      </ul>
    </li> 
    <li><a class="collapsed heading">Configure Matrimony</a>
      <ul class="navigation">
        <li><a href="<?php echo Yii::app()->homeUrl.'/country/admin';?>"
			title="Manage Country">Manage Country</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/country/create';?>"
			title="Add Country">Add Country</a></li>
        <li><a href="<?php echo Yii::app()->homeUrl.'/states/admin';?>"
			title="Manage states">Manage states</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/states/create';?>"
			title="Add states">Add states</a></li>               
        <li><a href="<?php echo Yii::app()->homeUrl.'/matrimonySect/admin';?>"
			title="Manage Matrimony Sect">Manage Sect</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/matrimonySect/create';?>"
			title="Add Matrimony Sect">Add Sect</a></li>
        <li><a href="<?php echo Yii::app()->homeUrl.'/matrimonySubSect/admin';?>"
			title="Manage Matrimony Sub Sect">Manage Sub Sect</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/matrimonySubSect/create';?>"
			title="Add Matrimony Sub Sect">Add Sub Sect</a></li>                       
        
        <li><a href="<?php echo Yii::app()->homeUrl.'/matrimonyCaste/admin';?>"
			title="Manage Matrimony Caste">Manage Caste</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/matrimonyCaste/create';?>"
			title="Add Matrimony Caste">Add Caste</a></li> 
        <li><a href="<?php echo Yii::app()->homeUrl.'/matrimonyCourse/admin';?>"
			title="Manage Matrimony Course">Manage Course</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/matrimonyCourse/create';?>"
			title="Add Matrimony Course">Add Course</a></li> 
        <li><a href="<?php echo Yii::app()->homeUrl.'/matrimonyCourseGroup/admin';?>"
			title="Manage Matrimony Course Group">Manage Course Group</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/matrimonyCourseGroup/create';?>"
			title="Add Matrimony Course Group">Add Course Group</a></li> 
        <li><a href="<?php echo Yii::app()->homeUrl.'/matrimonyMotherTongue/admin';?>"
			title="Manage Matrimony Mother Tongue">Manage Mother Tongue</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/matrimonyMotherTongue/create';?>"
			title="Add Matrimony Sub Sect">Add Mother Tongue</a></li>     
        <li><a href="<?php echo Yii::app()->homeUrl.'/matrimonialPackage/admin';?>"
			title="Manage Matrimony Package">Manage Package</a></li>
        <li><a
			href="<?php echo Yii::app()->homeUrl.'/matrimonialPackage/create';?>"
			title="Add Matrimony Package">Add Package</a></li>        
      </ul>
    </li>    
  </ul>
</div>
<!-- Left Dark Bar End --> 
<!-- Notifications Box/Pop-Up Start --> 
<!--<img src="http://designerz-crew.info/start/callb.png">-->
<?php } else { ?>
<?php echo $content; ?>
<?php } ?>
</body>
</html>
