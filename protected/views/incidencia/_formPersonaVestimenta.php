<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'persona-vestimenta-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p> 

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'id_persona_caracteristica', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'gorra', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'abrigo', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'camisa', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'pantalones', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'calzado', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'calcetines', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textAreaRow($model, 'caracteristicas_peculiares', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>


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