<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->textFieldRow($model, 'nombre_corto', array('class' => 'span5', 'maxlength' => 25)); ?>

<?php echo $form->textFieldRow($model, 'codigo', array('class' => 'span5', 'maxlength' => 12)); ?>

<?php echo $form->textAreaRow($model, 'descripcion', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldRow($model, 'fecha_inicio', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'fecha_fin', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'dia', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'hora_inicio', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'hora_fin', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'estatus', array('class' => 'span5', 'maxlength' => 15)); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'SearchAux',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
