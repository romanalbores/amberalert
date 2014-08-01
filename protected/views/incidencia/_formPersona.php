<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'persona-menor-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true, // Required to perform AJAX validation on form submit
        'afterValidate' => 'js:mySubmitFormFunction', // Your JS function to submit form
    ),
        'htmlOptions'=>array('class'=>'validarForm')
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p> 

<?php echo $form->errorSummary($model); ?>
<?php echo $form->errorSummary($modelPersonaMenorCaracteristica); ?>
<?php echo $form->errorSummary($modelPersonaMenorVestimenta); ?>

<input type="hidden" name="Persona[tipo_persona]" value="VICTIMA" />
<?php echo $form->hiddenField($model, 'id', array('class' => 'span5', 'maxlength' => 200)); ?>
<?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 200)); ?>

<?php echo $form->textFieldRow($model, 'apellido_paterno', array('class' => 'span5', 'maxlength' => 15)); ?>

<?php echo $form->textFieldRow($model, 'apellido_materno', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'genero', array('class' => 'span5', 'maxlength' => 15)); ?>

<?php     
    echo $form->datepickerRow(
        $model, 'fecha_nacimiento', array(
    'options' => array('language' => 'es', 'format' => 'yyyy-mm-dd'),
    'prepend' => '<i class="icon-search"></i>',
        )
);
?>



<!-- VESTIMENTA -->
<?php echo $form->hiddenField($modelPersonaMenorVestimenta, 'id', array('class' => 'span5')); ?>
<?php echo $form->hiddenField($modelPersonaMenorVestimenta, 'id_persona_caracteristica', array('class' => 'span5')); ?>
<div class="accordion" id="accordion2">
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                Caracter&iacute;sticas
            </a>
        </div>
        <div id="collapseOne" class="accordion-body collapse">
            <div class="accordion-inner">
                <!--CARACTERISTICAS-->

                <?php echo $form->hiddenField($modelPersonaMenorCaracteristica, 'id_persona', array('class' => 'span5')); ?>

                <?php $form->textFieldRow($modelPersonaMenorCaracteristica, 'id_tipo_naturaleza', array('class' => 'span5')); ?>
                
                <?php
                $tipo_naturaleza = TipoNaturaleza::model()->obtenerListaTipoNaturaleza();
                $list_tipo_naturaleza = CHtml::listData($tipo_naturaleza, 'id', 'nombre');
                $list_tipo_alerta = CHtml::encodeArray($list_tipo_naturaleza);
                echo $form->dropDownListRow(
                        $modelPersonaMenorCaracteristica, 'id_tipo_naturaleza', $list_tipo_naturaleza, array('prompt' => 'Seleccionar Tipo de Naturaleza')
                );
                ?>

                <?php echo $form->hiddenField($modelPersonaMenorCaracteristica, 'id_incidencia', array('class' => 'span5')); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorCaracteristica, 'raza', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorCaracteristica, 'tez', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorCaracteristica, 'color_piel', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorCaracteristica, 'edad', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorCaracteristica, 'idioma_primario', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorCaracteristica, 'estatura', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorCaracteristica, 'peso', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorCaracteristica, 'cabello', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorCaracteristica, 'ojos', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorCaracteristica, 'complexion', array('class' => 'span5', 'maxlength' => 500)); ?>

                <?php echo $form->textAreaRow($modelPersonaMenorCaracteristica, 'caracteristicas_peculiares', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorCaracteristica, 'herida', array('class' => 'span5')); ?>

                <?php echo $form->textAreaRow($modelPersonaMenorCaracteristica, 'descripcion_herida', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
            </div>
        </div>
    </div>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                Ropa
            </a>
        </div>
        <div id="collapseTwo" class="accordion-body collapse">
            <div class="accordion-inner">
                <?php echo $form->hiddenField($modelPersonaMenorVestimenta, 'id_persona_caracteristica', array('class' => 'span5', 'maxlength' => 100)); ?>
                
                <?php echo $form->textFieldRow($modelPersonaMenorVestimenta, 'gorra', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorVestimenta, 'abrigo', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorVestimenta, 'camisa', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorVestimenta, 'pantalones', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorVestimenta, 'calzado', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textFieldRow($modelPersonaMenorVestimenta, 'calcetines', array('class' => 'span5', 'maxlength' => 100)); ?>

                <?php echo $form->textAreaRow($modelPersonaMenorVestimenta, 'caracteristicas_peculiares', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
            </div>
        </div>
    </div>
</div>

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
