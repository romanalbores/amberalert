<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_alerta')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_alerta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_caso_particular')); ?>:</b>
	<?php echo CHtml::encode($data->id_caso_particular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_incidencia')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_incidencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suceso')); ?>:</b>
	<?php echo CHtml::encode($data->suceso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('heridas')); ?>:</b>
	<?php echo CHtml::encode($data->heridas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_heridas')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_heridas); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('armas')); ?>:</b>
	<?php echo CHtml::encode($data->armas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_armas')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_armas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lugar_avistamiento_final')); ?>:</b>
	<?php echo CHtml::encode($data->lugar_avistamiento_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('persona_acompaniante_final')); ?>:</b>
	<?php echo CHtml::encode($data->persona_acompaniante_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relacion_acompaniante')); ?>:</b>
	<?php echo CHtml::encode($data->relacion_acompaniante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relacion_persona_llamada')); ?>:</b>
	<?php echo CHtml::encode($data->relacion_persona_llamada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus_suceso')); ?>:</b>
	<?php echo CHtml::encode($data->estatus_suceso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_viaje')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_viaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_objeto')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_objeto); ?>
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