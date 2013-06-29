<?php
$this->breadcrumbs=array(
	'Matrimony Member Payments'=>array('index'),
	$model->pkMemPayId,
);

$this->menu=array(
	array('label'=>'List MatrimonyMemberPayment', 'url'=>array('index')),
	array('label'=>'Create MatrimonyMemberPayment', 'url'=>array('create')),
	array('label'=>'Update MatrimonyMemberPayment', 'url'=>array('update', 'id'=>$model->pkMemPayId)),
	array('label'=>'Delete MatrimonyMemberPayment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pkMemPayId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MatrimonyMemberPayment', 'url'=>array('admin')),
);
?>

<h1>View MatrimonyMemberPayment #<?php echo $model->pkMemPayId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pkMemPayId',
		'fkMemberId',
		'fkPackageId',
		'StartDate',
		'EndDate',
		'AmountPaid',
		'Status',
		'Discount',
		'ReasonOfDiscount',
	),
)); ?>
