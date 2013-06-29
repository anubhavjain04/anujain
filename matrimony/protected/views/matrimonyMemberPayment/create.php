<?php
$this->breadcrumbs=array(
	'Matrimony Member Payments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MatrimonyMemberPayment', 'url'=>array('index')),
	array('label'=>'Manage MatrimonyMemberPayment', 'url'=>array('admin')),
);
?>

<h1>Create MatrimonyMemberPayment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>