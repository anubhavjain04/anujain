<?php
$this->breadcrumbs=array(
	'Login Masters'=>array('index'),
$model->pkLoginId=>array('view','id'=>$model->pkLoginId),
	'Update',
);

$this->menu=array(
array('label'=>'List LoginMaster', 'url'=>array('index')),
array('label'=>'Create LoginMaster', 'url'=>array('create')),
array('label'=>'View LoginMaster', 'url'=>array('view', 'id'=>$model->pkLoginId)),
array('label'=>'Manage LoginMaster', 'url'=>array('admin')),
);
?>

<h1>Update LoginMaster <?php echo $model->pkLoginId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>