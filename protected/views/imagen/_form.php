<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'imagen-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'nombre_corto',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'codigo',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textAreaRow($model,'descripcion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'archivo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ruta',array('class'=>'span5','maxlength'=>2500)); ?>

	<?php echo $form->textFieldRow($model,'extension',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'publico',array('class'=>'span5')); ?>

	 

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
