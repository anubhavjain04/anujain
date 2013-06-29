<?php
$this->breadcrumbs=array(
	'Matrimony Sects',
);

$this->menu=array(
	array('label'=>'Create MatrimonySect', 'url'=>array('create')),
	array('label'=>'Manage MatrimonySect', 'url'=>array('admin')),
);
?>

<h1>Matrimony Sects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
