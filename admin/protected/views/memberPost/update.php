<div class="headings">
<h2 class="left">Update Member's Post # <?php echo $model->pkMemPostId; ?></h2>
</div>
<div class="contentbox nopad" id="tabs-2"><?php echo $this->renderPartial('_form', array('model'=>$model, 'allMembers'=>$allMembers)); ?>
</div>