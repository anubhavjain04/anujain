<div id="logincontainer">
<div id="loginbox">
<div id="loginheader"><img
	SRC="<?php echo Yii::app()->request->baseUrl; ?>/themes/blue/img/cp_logo_login.png"
	alt="Control Panel Login" /></div>
<div id="innerlogin" class="form"><?php 	$form=$this->beginWidget('CActiveForm', array(
						'id'=>'login-form',
						'enableAjaxValidation'=>false,
)); ?>
<div>
<p><?php echo $form->labelEx($model,'Enter your username :'); ?></p>
<div class="logininput"><?php echo $form->textField($model,'username'); ?></div>
<?php echo $form->error($model,'username'); ?></div>

<div>
<p><?php echo $form->labelEx($model,'Enter your password :'); ?></p>
<div class="logininput"><?php echo $form->passwordField($model,'password'); ?></div>
<?php echo $form->error($model,'password'); ?></div>

<div class="loginbtn"><?php echo CHtml::submitButton('Login'); ?></div>
<br />
<div>
<p><a href="#" title="Forgoteen Password?">Forgotten Password?</a></p>
</div>

<?php $this->endWidget(); ?></div>
</div>
<img
	SRC="<?php echo Yii::app()->request->baseUrl; ?>/img/login_fade.png"
	alt="Fade" /></div>
