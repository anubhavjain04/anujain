<?php
$this->breadcrumbs=array(
	'Branch Masters',
);

$this->menu=array(
array('label'=>'Create BranchMaster', 'url'=>array('create')),
array('label'=>'Manage BranchMaster', 'url'=>array('admin')),
);
?>

<h1>Branch Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
