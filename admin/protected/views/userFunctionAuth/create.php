<?php
$this->breadcrumbs=array(
	'User Function Auths'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List UserFunctionAuth', 'url'=>array('index')),
array('label'=>'Manage UserFunctionAuth', 'url'=>array('admin')),
);
?>

<h1>Create UserFunctionAuth</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>