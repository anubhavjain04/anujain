<?php
$this->breadcrumbs=array(
	'Matrimony Family Details',
);

$this->menu=array(
	array('label'=>'Create MatrimonyFamilyDetails', 'url'=>array('create')),
	array('label'=>'Manage MatrimonyFamilyDetails', 'url'=>array('admin')),
);
?>

<h1>Matrimony Family Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
