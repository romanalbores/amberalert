<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_incidencia')); ?>:</b>
	<?php echo CHtml::encode($data->id_incidencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_configuracion')); ?>:</b>
	<?php echo CHtml::encode($data->id_configuracion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_poste_direccion')); ?>:</b>
	<?php echo CHtml::encode($data->id_poste_direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registrado_por')); ?>:</b>
	<?php echo CHtml::encode($data->registrado_por); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('modificado_por')); ?>:</b>
	<?php echo CHtml::encode($data->modificado_por); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modificado')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modificado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eliminado')); ?>:</b>
	<?php echo CHtml::encode($data->eliminado); ?>
	<br />

	*/ ?>

</div>