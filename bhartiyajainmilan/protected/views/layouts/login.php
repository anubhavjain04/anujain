<?php 
	if(isset(Yii::app()->session['currentUser'])){
		$user = new User();				
		$user =	Yii::app()->session['currentUser'];
		if(!is_null($user) && $user->Type==="USR"){
?>

Welcome<a href="#">  <?php echo $user->UserId; ?></a>

<div class="link-content">
    <div id="logincontainer">
        <div id="loginbox">
            <div id="loginheader">
                Welcome <?php echo $user->UserId; ?>
            </div>
            
            <div id="innerlogin" class="form">
                <div>
                    <a href="#" title="My Profile">My Profile</a>
                </div>
                <div>
                    <a href="#" title="Change Password">Change Password</a>
                </div>
                
                <br />
                <div><p><a href='<?php echo Yii::app()->createUrl("/site/logout");?>' title="Logout">Logout</a></p></div>
            </div>
            <div class="close">
                <a href="#" title="Close">Close</a>
            </div>
        </div>   
    </div>
</div>
<?php }}else{?>

<a href="#">Login</a>
<div class="link-content">
    <div id="logincontainer">
        <div id="loginbox">
            <div id="loginheader">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/cp_logo_login.png" alt="Login Panel" />
            </div>
            <form id="loginForm" name="loginForm" method="post" action='<?php echo Yii::app()->createUrl("/site/login");?>'> 
                <div id="innerlogin" class="form">
                	<div class="error">
                    </div>
                    <div>
                        <p>Enter your username</p>
                        <div class="logininput"><input id="username" name="username" type="text" /> </div>
                    </div>
        
                    <div>
                        <p>Enter your password</p>
                        <div class="logininput"><input id="password" name="password" type="password" /></div>
                    </div>         
                    <div class="loginbtn">
                        <input type="submit" id="loginfrm" name="loginfrm" value="Login" />
                    </div>
                    <br />
                    <div><p><a href="#" title="Forgoteen Password?">Forgotten Password?</a></p></div>
                </div>
            </form>
            <div class="close">
                <a href="#" title="Close">Close</a>
            </div>
        </div>   
    </div>
</div>
<?php }?>