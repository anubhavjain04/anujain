<?php
$this->breadcrumbs=array(
	'Matrimony Member Payments',
);

$this->menu=array(
	array('label'=>'Create MatrimonyMemberPayment', 'url'=>array('create')),
	array('label'=>'Manage MatrimonyMemberPayment', 'url'=>array('admin')),
);
?>

<h1>Matrimony Member Payments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
