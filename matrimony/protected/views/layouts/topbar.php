<div id="topbar-fixed" class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#"></a> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li data-bind="css: {'active': $root.categorySwitch()==$root.label.HOME_PAGE}"><a href="#home">Home</a></li>
        <li data-bind="css: {'active': $root.categorySwitch()==$root.label.SEARCH_PAGE}"><a href="#search/criteria?type=regular">Search</a></li>
        <li data-bind="css: {'active': $root.categorySwitch()==$root.label.REGISTER_PAGE}"><a href="#register">Register</a></li>
        <li data-bind="css: {'active': $root.categorySwitch()==$root.label.UPGRADE_PAGE}"><a href="#upgrade">Upgrade</a></li>
        <li data-bind="css: {'active': $root.categorySwitch()==$root.label.CONTACT_US}"><a href="#contact-us">Contact Us</a></li>
      </ul>
      <!-- ko if: $root.loginVM.user() -->
      <div data-bind="text: $root.loginVM.user().userName"></div>
      <!-- /ko -->
      <?php //echo print_r(Yii::app()->user); ?>
      <?php if(Yii::app()->user->isGuest) { ?>
      <ul class="nav navbar-nav navbar-right">
      	<li id="login-popup" class="dropdown"> <a href="#" class="dropdown-toggle btn btn-success" data-toggle="dropdown">Login <b class="caret"></b></a>
      		<div class="dropdown-menu">
              <form id="login-form" class="form-horizontal" action="/anujain/matrimony/index.php/site/login" method="post">
		        <div class="form-group input-group-sm">
		          <label class="control-label">Email Id</label>	
		          <input type="email" placeholder="Email" class="form-control" name="LoginForm[emailid]" />
		        </div>
		        <div class="form-group input-group-sm">
		          <label class="control-label">Password</label>
		          <input type="password" placeholder="Password" class="form-control" name="LoginForm[password]" />
		        </div>
		        <div class="form-group checkbox">
			        <label>
			          <input type="checkbox" value="remember-me" name="LoginForm[rememberMe]"> Remember me
			        </label>
		        </div>
		        <div class="form-group">
		        	<button type="submit" class="btn btn-sm btn-success">Sign in</button>
		        	<button type="button" class="btn btn-sm btn-link">Forgot password?</button>
		        </div>
		        
		      </form>
            </div>
          
        </li>
      </ul>
      <?php } ?>
      <?php if(!Yii::app()->user->isGuest) { ?>
      	<form class="form-horizontal" action="/anujain/matrimony/index.php/site/logout" method="post">
      	<ul class="nav navbar-nav navbar-right">
	      	<li id="login-popup" class="dropdown">
	      		<button type="submit" class="btn btn-success" >Logout</button>
	      	</li>
	     </ul> 		
	    </form>
	      	
      <?php }?>
    </div>
    <!--/.navbar-collapse --> 
  </div>
</div>