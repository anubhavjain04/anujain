<?php
$this->breadcrumbs=array(
	'Milan Details',
);

$this->menu=array(
array('label'=>'Create MilanDetails', 'url'=>array('create')),
array('label'=>'Manage MilanDetails', 'url'=>array('admin')),
);
?>

<h1>Milan Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
