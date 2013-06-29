<?php
$this->breadcrumbs=array(
	'Magazines'=>array('index'),
	$model->pkMagazineId,
);

$this->menu=array(
	array('label'=>'List Magazine', 'url'=>array('index')),
	array('label'=>'Create Magazine', 'url'=>array('create')),
	array('label'=>'Update Magazine', 'url'=>array('update', 'id'=>$model->pkMagazineId)),
	array('label'=>'Delete Magazine', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pkMagazineId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Magazine', 'url'=>array('admin')),
);
?>

<h1>View Magazine #<?php echo $model->pkMagazineId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pkMagazineId',
		'MagazineName',
		'MagzineDate',
		'Path',
		'fkMagTypeId',
		'Status',
		'Type',
	),
)); ?>
