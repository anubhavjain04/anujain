<?php
$this->breadcrumbs=array(
	'Matrimony Member Payments'=>array('index'),
	$model->pkMemPayId=>array('view','id'=>$model->pkMemPayId),
	'Update',
);

$this->menu=array(
	array('label'=>'List MatrimonyMemberPayment', 'url'=>array('index')),
	array('label'=>'Create MatrimonyMemberPayment', 'url'=>array('create')),
	array('label'=>'View MatrimonyMemberPayment', 'url'=>array('view', 'id'=>$model->pkMemPayId)),
	array('label'=>'Manage MatrimonyMemberPayment', 'url'=>array('admin')),
);
?>

<h1>Update MatrimonyMemberPayment <?php echo $model->pkMemPayId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>