<?php
$this->breadcrumbs=array(
	'Matrimony Course Groups',
);

$this->menu=array(
	array('label'=>'Create MatrimonyCourseGroup', 'url'=>array('create')),
	array('label'=>'Manage MatrimonyCourseGroup', 'url'=>array('admin')),
);
?>

<h1>Matrimony Course Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
