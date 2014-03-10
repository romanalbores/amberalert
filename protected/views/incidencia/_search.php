<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_tipo_alerta',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_caso_particular',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fecha_incidencia',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'suceso',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'heridas',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'descripcion_heridas',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'armas',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'descripcion_armas',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'lugar_avistamiento_final',array('class'=>'span5','maxlength'=>1000)); ?>

		<?php echo $form->textFieldRow($model,'persona_acompaniante_final',array('class'=>'span5','maxlength'=>1000)); ?>

		<?php echo $form->textFieldRow($model,'relacion_acompaniante',array('class'=>'span5','maxlength'=>1000)); ?>

		<?php echo $form->textFieldRow($model,'relacion_persona_llamada',array('class'=>'span5','maxlength'=>1000)); ?>

		<?php echo $form->textFieldRow($model,'estatus_suceso',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textAreaRow($model,'direccion_viaje',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'descripcion_objeto',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'estatus',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldRow($model,'registrado_por',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fecha_registro',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'modificado_por',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fecha_modificado',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'eliminado',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
