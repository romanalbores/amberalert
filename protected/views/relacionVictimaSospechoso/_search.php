<?php
/* @var $this RelacionVictimaSospechosoController */
/* @var $model RelacionVictimaSospechoso */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_persona_victima'); ?>
		<?php echo $form->textField($model,'id_persona_victima'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_incidencia'); ?>
		<?php echo $form->textField($model,'id_incidencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_persona_sospechoso'); ?>
		<?php echo $form->textField($model,'id_persona_sospechoso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_relacion'); ?>
		<?php echo $form->textField($model,'id_tipo_relacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_avistamiento'); ?>
		<?php echo $form->textField($model,'fecha_avistamiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'presuncion_patria_protestad'); ?>
		<?php echo $form->textField($model,'presuncion_patria_protestad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disputa_patria_protestad'); ?>
		<?php echo $form->textField($model,'disputa_patria_protestad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'intento_previo_sustraccion'); ?>
		<?php echo $form->textField($model,'intento_previo_sustraccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_intento'); ?>
		<?php echo $form->textField($model,'fecha_intento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estatus'); ?>
		<?php echo $form->textField($model,'estatus',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registrado_por'); ?>
		<?php echo $form->textField($model,'registrado_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_registro'); ?>
		<?php echo $form->textField($model,'fecha_registro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modificado_por'); ?>
		<?php echo $form->textField($model,'modificado_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_modificado'); ?>
		<?php echo $form->textField($model,'fecha_modificado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eliminado'); ?>
		<?php echo $form->textField($model,'eliminado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->