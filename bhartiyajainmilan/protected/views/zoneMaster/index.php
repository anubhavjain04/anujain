<?php
$this->breadcrumbs=array(
	'Zone Masters',
);

$this->menu=array(
array('label'=>'Create ZoneMaster', 'url'=>array('create')),
array('label'=>'Manage ZoneMaster', 'url'=>array('admin')),
);
?>

<h1>Zone Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
