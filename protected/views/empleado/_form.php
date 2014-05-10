<?php
/* @var $this EmpleadoController */
/* @var $model Empleado */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'empleado-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_persona'); ?>
		<?php echo $form->textField($model,'id_persona'); ?>
		<?php echo $form->error($model,'id_persona'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_puesto'); ?>
		<?php echo $form->textField($model,'id_puesto'); ?>
		<?php echo $form->error($model,'id_puesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_departamento'); ?>
		<?php echo $form->textField($model,'id_departamento'); ?>
		<?php echo $form->error($model,'id_departamento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estatus'); ?>
		<?php echo $form->textField($model,'estatus',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'estatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registrado_por'); ?>
		<?php echo $form->textField($model,'registrado_por'); ?>
		<?php echo $form->error($model,'registrado_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_registro'); ?>
		<?php echo $form->textField($model,'fecha_registro'); ?>
		<?php echo $form->error($model,'fecha_registro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modificado_por'); ?>
		<?php echo $form->textField($model,'modificado_por'); ?>
		<?php echo $form->error($model,'modificado_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_modificado'); ?>
		<?php echo $form->textField($model,'fecha_modificado'); ?>
		<?php echo $form->error($model,'fecha_modificado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eliminado'); ?>
		<?php echo $form->textField($model,'eliminado'); ?>
		<?php echo $form->error($model,'eliminado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->