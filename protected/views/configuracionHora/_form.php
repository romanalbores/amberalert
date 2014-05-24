<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'configuracion-hora-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_configuracion_dia',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hora_inicio',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hora_fin',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estatus',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'fecha_registro',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'registrado_por',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modificado_por',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_modificado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'eliminado',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
