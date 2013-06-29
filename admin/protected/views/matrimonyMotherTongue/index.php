<?php
$this->breadcrumbs=array(
	'Matrimony Mother Tongues',
);

$this->menu=array(
	array('label'=>'Create MatrimonyMotherTongue', 'url'=>array('create')),
	array('label'=>'Manage MatrimonyMotherTongue', 'url'=>array('admin')),
);
?>

<h1>Matrimony Mother Tongues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
