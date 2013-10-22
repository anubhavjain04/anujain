<?php
$this->breadcrumbs=array(
	'Matrimony Users'=>array('index'),
	$model->pkUserId,
);

$this->menu=array(
	array('label'=>'List MatrimonyUser', 'url'=>array('index')),
	array('label'=>'Create MatrimonyUser', 'url'=>array('create')),
	array('label'=>'Update MatrimonyUser', 'url'=>array('update', 'id'=>$model->pkUserId)),
	array('label'=>'Delete MatrimonyUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pkUserId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MatrimonyUser', 'url'=>array('admin')),
);
?>

<h1>View MatrimonyUser #<?php echo $model->pkUserId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pkUserId',
		'EmailID',
		'Password',
		'Type',
		'Status',
		'ActivationCode',
		'CreatedDate',
		'ModifiedDate',
	),
)); ?>
