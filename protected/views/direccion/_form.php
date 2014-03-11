<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'direccion-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_localidad',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'calle',array('class'=>'span5','maxlength'=>1000)); ?>

	<?php echo $form->textFieldRow($model,'colonia',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'localidad',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'codigo_postal',array('class'=>'span5','maxlength'=>15)); ?>

	 

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
