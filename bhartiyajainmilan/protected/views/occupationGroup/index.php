<?php
$this->breadcrumbs=array(
	'Occupation Groups',
);

$this->menu=array(
	array('label'=>'Create OccupationGroup', 'url'=>array('create')),
	array('label'=>'Manage OccupationGroup', 'url'=>array('admin')),
);
?>

<h1>Occupation Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
