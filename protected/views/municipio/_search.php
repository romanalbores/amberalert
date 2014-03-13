<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_estado',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>500)); ?>

		<?php echo $form->textFieldRow($model,'nombre_corto',array('class'=>'span5','maxlength'=>25)); ?>

		<?php echo $form->textFieldRow($model,'codigo',array('class'=>'span5','maxlength'=>12)); ?>

		<?php echo $form->textAreaRow($model,'descripcion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
