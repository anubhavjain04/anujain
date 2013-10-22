<?php
$this->breadcrumbs=array(
	'Matrimony Users'=>array('index'),
	$model->pkUserId=>array('view','id'=>$model->pkUserId),
	'Update',
);

$this->menu=array(
	array('label'=>'List MatrimonyUser', 'url'=>array('index')),
	array('label'=>'Create MatrimonyUser', 'url'=>array('create')),
	array('label'=>'View MatrimonyUser', 'url'=>array('view', 'id'=>$model->pkUserId)),
	array('label'=>'Manage MatrimonyUser', 'url'=>array('admin')),
);
?>

<h1>Update MatrimonyUser <?php echo $model->pkUserId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>