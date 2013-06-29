<div class="headings">
<h2 class="left">View Zone # <?php echo CHtml::encode($model->pkZoneId); ?></h2>
</div>
<div class="contentbox nopad" id="tabs-2">
<div class="content"><?php $this->renderPartial('_view', array(
		'data'=>$model,)); 
?> <?php /*$this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
'attributes'=>array(
'pkZoneId',
'ZoneName',
'ZoneCode',
'Status',
),
)); */
?></div>
</div>



