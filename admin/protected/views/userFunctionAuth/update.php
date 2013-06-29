<?php
$this->breadcrumbs=array(
	'User Function Auths'=>array('index'),
$model->pkuserAuthId=>array('view','id'=>$model->pkuserAuthId),
	'Update',
);

$this->menu=array(
array('label'=>'List UserFunctionAuth', 'url'=>array('index')),
array('label'=>'Create UserFunctionAuth', 'url'=>array('create')),
array('label'=>'View UserFunctionAuth', 'url'=>array('view', 'id'=>$model->pkuserAuthId)),
array('label'=>'Manage UserFunctionAuth', 'url'=>array('admin')),
);
?>

<h1>Update UserFunctionAuth <?php echo $model->pkuserAuthId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>