<?php
$this->breadcrumbs=array(
	'Level Posts'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List LevelPosts', 'url'=>array('index')),
array('label'=>'Manage LevelPosts', 'url'=>array('admin')),
);
?>

<h1>Create LevelPosts</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>