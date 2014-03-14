<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_telefono')); ?>:</b>
	<?php echo CHtml::encode($data->id_telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_persona')); ?>:</b>
	<?php echo CHtml::encode($data->id_persona); ?>
	<br />
        
</div>