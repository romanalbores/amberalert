<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'persona-caracteristica-vehiculo-form',
    'enableAjaxValidation' => false,
    'htmlOptions'=>array('class'=>'validarForm')
        ));    
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'id_persona_caracteristica', array('class' => 'span5')); ?>

<?php $form->textFieldRow($model, 'id_vehiculo', array('class' => 'span5')); ?>
<?php
$tipo_vehiculo = TipoVehiculo::model()->obtenerListaTipoRelacionVictima();
$list_tipo_vehiculo = CHtml::listData($tipo_vehiculo, 'id', 'nombre');
$list_tipo_vehiculo = CHtml::encodeArray($list_tipo_vehiculo);
echo $form->dropDownListRow(
        $model, 'id_vehiculo', $list_tipo_vehiculo, array('prompt' => 'Seleccionar Tipo Vehiculo')
);
?>


<div class="form-actions">
    <?php
//    $this->widget('bootstrap.widgets.TbButton', array(
//        'buttonType' => 'submit',
//        'type' => 'primary',
//        'label' => $model->isNewRecord ? 'Create' : 'Save',
//    ));
    ?>
</div>

<?php $this->endWidget(); ?>