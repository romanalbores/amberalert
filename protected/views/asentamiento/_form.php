<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'asentamiento-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_localidad',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_tipo_asentamiento',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'nombre_corto',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'codigo',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'codigo_postal',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'no_habitantes',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estatus_asentamiento',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'estatus',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'registrado_por',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_registro',array('class'=>'span5')); ?>

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
