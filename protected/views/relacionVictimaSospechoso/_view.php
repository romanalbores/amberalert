<?php
/* @var $this RelacionVictimaSospechosoController */
/* @var $data RelacionVictimaSospechoso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_persona_victima')); ?>:</b>
	<?php echo CHtml::encode($data->id_persona_victima); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_incidencia')); ?>:</b>
	<?php echo CHtml::encode($data->id_incidencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_persona_sospechoso')); ?>:</b>
	<?php echo CHtml::encode($data->id_persona_sospechoso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_relacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_relacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_avistamiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_avistamiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('presuncion_patria_protestad')); ?>:</b>
	<?php echo CHtml::encode($data->presuncion_patria_protestad); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('disputa_patria_protestad')); ?>:</b>
	<?php echo CHtml::encode($data->disputa_patria_protestad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('intento_previo_sustraccion')); ?>:</b>
	<?php echo CHtml::encode($data->intento_previo_sustraccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_intento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_intento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
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