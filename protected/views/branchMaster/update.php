<?php
$this->breadcrumbs=array(
	'Branch Masters'=>array('index'),
$model->pkBranchId=>array('view','id'=>$model->pkBranchId),
	'Update',
);

$this->menu=array(
array('label'=>'List BranchMaster', 'url'=>array('index')),
array('label'=>'Create BranchMaster', 'url'=>array('create')),
array('label'=>'View BranchMaster', 'url'=>array('view', 'id'=>$model->pkBranchId)),
array('label'=>'Manage BranchMaster', 'url'=>array('admin')),
);
?>

<h1>Update BranchMaster <?php echo $model->pkBranchId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>