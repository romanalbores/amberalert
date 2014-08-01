<?php
Yii::app()->clientScript->registerScriptFile(
        Yii::app()->request->baseUrl . "/js/incidencia.js", CClientScript::POS_END
);

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'incidencia-form',    
//    'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true, // Required to perform AJAX validation on form submit
        'afterValidate' => 'js:mySubmitFormFunction', // Your JS function to submit form
    ),
        'htmlOptions'=>array('class'=>'validarForm')
        ));
?>
<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>
<?php echo $form->errorSummary($model); ?>

<?php
$tipo_alerta = TipoAlerta::model()->obtenerListaTipoAlerta();
$list_tipo_alerta = CHtml::listData($tipo_alerta, 'id', 'nombre');
$list_tipo_alerta = CHtml::encodeArray($list_tipo_alerta);
echo $form->dropDownListRow(
        $model, 'id_tipo_alerta', $list_tipo_alerta, array('prompt' => 'Seleccionar Tipo de Alerta')
);
?>

<?php
$caso_particular = CasoParticular::model()->obtenerListaCasoParticular();
$list_caso_particular = CHtml::listData($caso_particular, 'id', 'nombre');
$list_caso_particular = CHtml::encodeArray($list_caso_particular);
echo $form->dropDownListRow(
        $model, 'id_caso_particular', $list_caso_particular, array('prompt' => 'Seleccionar Caso particular')
);
?>

<?php
echo $form->datepickerRow(
        $model, 'fecha_incidencia', array(
    'options' => array('language' => 'es', 'format' => 'yyyy-mm-dd'),
    'prepend' => '<i class="icon-search"></i>',
        )
);
?>

<?php echo $form->textAreaRow($model, 'suceso', array('rows' => 6, 'cols' => 50, 'class' => 'span5')); ?>

<?php
echo $form->checkBoxRow(
        $model, 'heridas', array('disabled' => false)
);
?>

<?php echo $form->textAreaRow($model, 'descripcion_heridas', array('rows' => 6, 'cols' => 50, 'class' => 'span5')); ?>

<?php
echo $form->checkBoxRow(
        $model, 'armas', array('disabled' => false)
);
?>

<?php echo $form->textAreaRow($model, 'descripcion_armas', array('rows' => 6, 'cols' => 50, 'class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'lugar_avistamiento_final', array('class' => 'span5', 'maxlength' => 1000)); ?>

<?php echo $form->textFieldRow($model, 'persona_acompaniante_final', array('class' => 'span5', 'maxlength' => 1000)); ?>

<?php echo $form->textFieldRow($model, 'relacion_acompaniante', array('class' => 'span5', 'maxlength' => 1000)); ?>

<?php echo $form->textFieldRow($model, 'relacion_persona_llamada', array('class' => 'span5', 'maxlength' => 1000)); ?>

<?php echo $form->textFieldRow($model, 'estatus_suceso', array('class' => 'span5', 'maxlength' => 15)); ?>

<?php echo $form->textAreaRow($model, 'direccion_viaje', array('rows' => 6, 'cols' => 50, 'class' => 'span5')); ?>

<?php echo $form->textAreaRow($model, 'descripcion_objeto', array('rows' => 6, 'cols' => 50, 'class' => 'span5')); ?>


<div class="form-actions">
    <?php
//    $this->widget('bootstrap.widgets.TbButton', array(
//        'buttonType' => 'submit',
//        'type' => 'primary',
//        'label' => $model->isNewRecord ? 'Create' : 'Guardar',
//    ));
    ?>
</div>
<?php $this->endWidget(); ?>