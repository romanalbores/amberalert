<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'configuracion_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_dia',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'hora_fin',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'hora_inicio',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'estatus',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldRow($model,'eliminado',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
