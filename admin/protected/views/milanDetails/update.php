<div class="headings">
<h2 class="left">Update Branch Member # <?php echo $model->pkRecId; ?></h2>
</div>
<div class="contentbox nopad" id="tabs-2"><?php echo $this->renderPartial('_form', array('model'=>$model, 'allBranches'=>$allBranches, 'allMembers'=>$allMembers)); ?>
</div>