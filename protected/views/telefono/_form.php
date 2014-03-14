<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'telefono-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'Número',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'compañia',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'Tipo',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'Sms',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Internet',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'Descripcion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	 

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
