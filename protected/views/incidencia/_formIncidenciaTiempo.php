<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'incidencia-tiempo-form',
    'enableAjaxValidation' => true,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'id_incidencia', array('class' => 'span5')); ?>

<?php echo $form->textAreaRow($model, 'consideracion_lugar', array('rows' => 6, 'cols' => 50, 'class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'circunstancia_sospechosa', array('class' => 'span5', 'maxlength' => 1000)); ?>

<?php echo $form->textAreaRow($model, 'accion_localizacion', array('rows' => 6, 'cols' => 50, 'class' => 'span5')); ?>

<?php echo $form->textAreaRow($model, 'antecedente_incidencia', array('rows' => 6, 'cols' => 50, 'class' => 'span5')); ?>

<?php echo $form->textAreaRow($model, 'lugar_posible_encuentro', array('rows' => 6, 'cols' => 50, 'class' => 'span5')); ?>

<?php echo $form->textAreaRow($model, 'descripcion_nota', array('rows' => 6, 'cols' => 50, 'class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'estatus', array('class' => 'span5', 'maxlength' => 15)); ?>

<?php echo $form->textFieldRow($model, 'registrado_por', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'fecha_registro', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'modificado_por', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'fecha_modificado', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'eliminado', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>