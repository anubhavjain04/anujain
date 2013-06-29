<?php
$this->breadcrumbs=array(
	'Matrimony Members',
);

$this->menu=array(
	array('label'=>'Create MatrimonyMembers', 'url'=>array('create')),
	array('label'=>'Manage MatrimonyMembers', 'url'=>array('admin')),
);
?>

<h1>Matrimony Members</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
