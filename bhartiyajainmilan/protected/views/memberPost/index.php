<?php
$this->breadcrumbs=array(
	'Member Posts',
);

$this->menu=array(
array('label'=>'Create MemberPost', 'url'=>array('create')),
array('label'=>'Manage MemberPost', 'url'=>array('admin')),
);
?>

<h1>Member Posts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
