<?php
$this->breadcrumbs=array(
	'Matrimony Castes',
);

$this->menu=array(
	array('label'=>'Create MatrimonyCaste', 'url'=>array('create')),
	array('label'=>'Manage MatrimonyCaste', 'url'=>array('admin')),
);
?>

<h1>Matrimony Castes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
