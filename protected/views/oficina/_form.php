<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'oficina-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php
$organizacion = Organizacion::model()->obtenerListaOrganizacion();
$list_organizacion = CHtml::ListData($organizacion, 'id', 'nombre');
$list_organizacion = CHtml::encodeArray($list_organizacion);
echo $form->dropDownListRow($model, 'id_organizacion', $list_organizacion, array('prompt' => 'Seleccionar Organización'));
?>

<?php
$region = Region::model()->obtenerListaRegion();
$list_region =  CHtml::ListData( $region,'id', 'nombre');
$list_region = CHtml::encodeArray($list_region);
echo $form->dropDownListRow($model, 'id_region', $list_region, array('prompt' => 'Seleccionar Región'));
?>


<?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->textFieldRow($model, 'nombre_corto', array('class' => 'span5', 'maxlength' => 25)); ?>

<?php echo $form->textFieldRow($model, 'codigo', array('class' => 'span5', 'maxlength' => 12)); ?>

<?php echo $form->textAreaRow($model, 'descripcion', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

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
