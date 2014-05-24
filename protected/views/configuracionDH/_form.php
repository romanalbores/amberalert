<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'configuracion-dh-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'configuracion_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_dia',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hora_fin',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hora_inicio',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estatus',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'eliminado',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
