<?php
$this->breadcrumbs=array(
	'Zone Members',
);

$this->menu=array(
	array('label'=>'Create ZoneMembers', 'url'=>array('create')),
	array('label'=>'Manage ZoneMembers', 'url'=>array('admin')),
);
?>

<h1>Zone Members</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
