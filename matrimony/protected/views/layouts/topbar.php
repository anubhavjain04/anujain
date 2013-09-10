<div id="topbar-fixed" class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#"></a> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li data-bind="css: {'active': $root.categorySwitch()==$root.label.HOME_PAGE}, click: function(){jHash.set($root.label.HOME_PAGE);}"><a href="#">Home</a></li>
        <li data-bind="css: {'active': $root.categorySwitch()==$root.label.SEARCH_PAGE}, click: function(){jHash.set('search/criteria',{type:'regular'});}"><a href="#about">Search</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Register</a></li>
            <li><a href="#">Package</a></li>
            <li><a href="#">Groups</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Take a Tour</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" placeholder="Email" class="form-control" />
        </div>
        <div class="form-group">
          <input type="password" placeholder="Password" class="form-control" />
        </div>
        <button type="submit" class="btn btn-success">Sign in</button>
      </form>
    </div>
    <!--/.navbar-collapse --> 
  </div>
</div>