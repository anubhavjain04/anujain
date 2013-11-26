<?php
$this->breadcrumbs=array(
	'Magazines'=>array('index'),
	$model->pkMagazineId=>array('view','id'=>$model->pkMagazineId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Magazine', 'url'=>array('index')),
	array('label'=>'Create Magazine', 'url'=>array('create')),
	array('label'=>'View Magazine', 'url'=>array('view', 'id'=>$model->pkMagazineId)),
	array('label'=>'Manage Magazine', 'url'=>array('admin')),
);
?>

<h1>Update Magazine <?php echo $model->pkMagazineId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>