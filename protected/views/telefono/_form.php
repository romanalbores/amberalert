<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'telefono-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'numero',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'compania',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'tipo',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'sms',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'internet',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'descripcion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	 

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
