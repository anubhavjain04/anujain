<?php
$this->breadcrumbs=array(
	'Occupations',
);

$this->menu=array(
	array('label'=>'Create Occupation', 'url'=>array('create')),
	array('label'=>'Manage Occupation', 'url'=>array('admin')),
);
?>

<h1>Occupations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
