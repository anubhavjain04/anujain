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
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li id="login-popup" class="dropdown"> <a href="#" class="dropdown-toggle btn btn-success" data-toggle="dropdown">Login <b class="caret"></b></a>
      		<div class="dropdown-menu">
              <form class="form-horizontal">
		        <div class="form-group input-group-sm">
		          <label class="control-label">Email Id</label>	
		          <input type="email" placeholder="Email" class="form-control" />
		        </div>
		        <div class="form-group input-group-sm">
		          <label class="control-label">Password</label>
		          <input type="password" placeholder="Password" class="form-control" />
		        </div>
		        <div class="form-group checkbox">
			        <label>
			          <input type="checkbox" value="remember-me"> Remember me
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
      
    </div>
    <!--/.navbar-collapse --> 
  </div>
</div>