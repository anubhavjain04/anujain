<?php
$this->breadcrumbs=array(
	'Member Details',
);

$this->menu=array(
array('label'=>'Create MemberDetails', 'url'=>array('create')),
array('label'=>'Manage MemberDetails', 'url'=>array('admin')),
);
?>

<h1>Member Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
