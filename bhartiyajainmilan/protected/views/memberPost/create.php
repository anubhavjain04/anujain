<?php
$this->breadcrumbs=array(
	'Member Posts'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List MemberPost', 'url'=>array('index')),
array('label'=>'Manage MemberPost', 'url'=>array('admin')),
);
?>

<h1>Create MemberPost</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>