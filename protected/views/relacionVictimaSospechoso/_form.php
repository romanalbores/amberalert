<?php
/* @var $this RelacionVictimaSospechosoController */
/* @var $model RelacionVictimaSospechoso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'relacion-victima-sospechoso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Victima'); ?>
		
                <?php echo $form->dropDownList($model,'id_persona_victima', CHtml::listData(Persona::model()->findAll(), 'id', 'nombre'),array('empty'=>' -Seleccione una victima- ')); ?>
		<?php echo $form->error($model,'id_persona_victima'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_incidencia'); ?>
		<?php #echo $form->textField($model,'id_incidencia'); ?>
                <?php echo $form->dropDownList($model,'id_incidencia', CHtml::listData(Incidencia::model()->findAll(), 'id', 'id'),array('empty'=>' -Seleccione una incidencia- ')); ?>
		<?php echo $form->error($model,'id_incidencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_persona_sospechoso'); ?>
		<?php echo $form->textField($model,'id_persona_sospechoso'); ?>
		<?php echo $form->error($model,'id_persona_sospechoso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo_relacion'); ?>
		<?php echo $form->textField($model,'id_tipo_relacion'); ?>
		<?php echo $form->error($model,'id_tipo_relacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_avistamiento'); ?>
		<?php echo $form->textField($model,'fecha_avistamiento'); ?>
		<?php echo $form->error($model,'fecha_avistamiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'presuncion_patria_protestad'); ?>
		<?php echo $form->textField($model,'presuncion_patria_protestad'); ?>
		<?php echo $form->error($model,'presuncion_patria_protestad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disputa_patria_protestad'); ?>
		<?php echo $form->textField($model,'disputa_patria_protestad'); ?>
		<?php echo $form->error($model,'disputa_patria_protestad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'intento_previo_sustraccion'); ?>
		<?php echo $form->textField($model,'intento_previo_sustraccion'); ?>
		<?php echo $form->error($model,'intento_previo_sustraccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_intento'); ?>
		<?php echo $form->textField($model,'fecha_intento'); ?>
		<?php echo $form->error($model,'fecha_intento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estatus'); ?>
		<?php echo $form->textField($model,'estatus',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'estatus'); ?>
	</div>

<!--	<div class="row">
		<?php // echo $form->labelEx($model,'registrado_por'); ?>
		<?php // echo $form->textField($model,'registrado_por'); ?>
		<?php // echo $form->error($model,'registrado_por'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'fecha_registro'); ?>
		<?php // echo $form->textField($model,'fecha_registro'); ?>
		<?php // echo $form->error($model,'fecha_registro'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'modificado_por'); ?>
		<?php // echo $form->textField($model,'modificado_por'); ?>
		<?php // echo $form->error($model,'modificado_por'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'fecha_modificado'); ?>
		<?php // echo $form->textField($model,'fecha_modificado'); ?>
		<?php // echo $form->error($model,'fecha_modificado'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'eliminado'); ?>
		<?php // echo $form->textField($model,'eliminado'); ?>
		<?php // echo $form->error($model,'eliminado'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->