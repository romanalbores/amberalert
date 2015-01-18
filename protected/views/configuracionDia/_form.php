<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'configuracion-dia-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->textFieldRow($model, 'nombre_corto', array('class' => 'span5', 'maxlength' => 25)); ?>

<?php echo $form->textFieldRow($model, 'codigo', array('class' => 'span5', 'maxlength' => 12)); ?>

<?php echo $form->textAreaRow($model, 'descripcion', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php
echo $form->datepickerRow(
     $model, 'fecha_inicio', array(
    'options' => array('language' => 'es', 
    'format' => 'yyyy-mm-dd'),
    'prepend' => '<i class="icon-search"></i>',
        )
);
?>
<?php
echo $form->datepickerRow(
    $model, 'fecha_fin', array(
    'options' => array('language' => 'es', 'format' => 'yyyy-mm-dd'),
    'prepend' => '<i class="icon-search"></i>',
        )
);
?>

<?php
    echo $form->checkBoxList($modelDH, 'id_dia', CHtml::listData(Dia::model()->findAll(), 'id', 'nombre'));
?>

<?php
echo $form->timepickerRow(
        $modelDH, 'hora_inicio', array(
        'options' => array('language' => 'es',
        'showOn' => 'button',
        'showSecond' => false,
        'changeMonth' => false,
        'changeYear' => false,
        'tabularLevel' => null,
            'timeFormat'=>'HH:MM',
            'showButtonPanel'=>true,
            'alwaysSetTime'=>false,    
     ),
    'prepend' => '<i class="icon-search"></i>',
        )
);
?>
<?php
echo $form->timepickerRow(
        $modelDH, 'hora_fin', array(
        'options' => array('language' => 'es',
        'showOn' => 'button',
        'showSecond' => false,
        'changeMonth' => false,
        'changeYear' => false,
        'tabularLevel' => null,
           'timeFormat'=>'hh:mm',
            'showButtonPanel'=>true,
            'alwaysSetTime'=>false,
    ),
    'prepend' => '<i class="icon-search"></i>',
        )
);
?>

<?php
echo $form->dropDownListRow($model, 'estatus', array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO'), array('prompt' => 'Seleccionar Estatus'));
?>

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
