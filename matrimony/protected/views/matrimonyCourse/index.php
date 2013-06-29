<?php
$this->breadcrumbs=array(
	'Matrimony Courses',
);

$this->menu=array(
	array('label'=>'Create MatrimonyCourse', 'url'=>array('create')),
	array('label'=>'Manage MatrimonyCourse', 'url'=>array('admin')),
);
?>

<h1>Matrimony Courses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
