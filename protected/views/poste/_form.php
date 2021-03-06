<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'pais-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Los campos con <span class="required">*</span> son requeridos.</p>


<?php
$zona = Zona::model()->getByIdOficina(1);//Obetenemos las zonas de la oficina 1
$list_zona= CHtml::listData($zona, 'id', 'nombre');
$list_zona = CHtml::encodeArray($list_zona);
echo $form->dropDownListRow($modelZona, 'id', $list_zona, array('prompt' => 'Seleccionar Zona'));
?>

<?php
$tipo_poste = TipoPoste::model()->obtenerListaTipoPoste();
$list_tipo_poste = CHtml::listData($tipo_poste, 'id', 'nombre');
$list_tipo_poste = CHtml::encodeArray($list_tipo_poste);
echo $form->dropDownListRow($model, 'id_tipo_poste', $list_tipo_poste, array('prompt' => 'Seleccionar Modelo de Poste'));
?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->textFieldRow($model, 'nombre_corto', array('class' => 'span5', 'maxlength' => 25)); ?>

<?php echo $form->textFieldRow($model, 'codigo', array('class' => 'span5', 'maxlength' => 12)); ?>

<?php echo $form->textAreaRow($model, 'descripcion', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<?php echo $form->textFieldRow($modelPosteDireccion, 'dir_ip', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($modelPosteDireccion, 'latitud', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($modelPosteDireccion, 'longitud', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textFieldRow($modelPosteDireccion, 'altitud', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php
$selectPais = 156;
$pais = Pais::model()->obtenerListaPaises();
$list_paises = CHtml::listData($pais, 'id', 'nombre');
$list_paises = CHtml::encodeArray($list_paises);
echo $form->dropDownListRow($modelEstado, 'id_pais', $list_paises, array("ajax" => array(
        "type" => 'post', //request type
        "url" => CController::createUrl('Estado/GetByIdPais'), //url to call
        "update" => "#Municipio_id_estado",
    ),
    'empty' => 'Seleccionar País',
    'style' => 'height:30px; width:250px',
    'options' => array($selectPais => array('selected' => true))));
?>

<?php
$estado = Estado::model()->getByIdPais($selectPais);
$list_estado = CHtml::listData($estado, 'id', 'nombre');
$list_estado = CHtml::encodeArray($list_estado);
echo $form->dropDownListRow($modelMunicipio, 'id_estado', $list_estado, array("ajax" => array(
        "type" => 'post', //request type
        "url" => CController::createUrl('Municipio/GetByIdEstado'), //url to call
        "update" => "#Localidad_id_municipio",
    ),
    'empty' => 'Seleccionar Estado',
    'style' => 'height:30px; width:250px',
    'options' => array('1' => array('selected' => true))))
//array('prompt' => 'Seleccionar el Estado'));
?>


<?php
$municipio = Municipio::model()->getByIdEstado(1);
$list_municipio = CHtml::listData($municipio, 'id', 'nombre');
$list_municipio = CHtml::encodeArray($list_municipio);
echo $form->dropDownListRow($modelLocalidad, 'id_municipio', $list_municipio, array("ajax" => array(
        "type" => 'post', //request type
        "url" => CController::createUrl('Localidad/GetByIdMunicipio'), //url to call
        "update" => "#Asentamiento_id_localidad",
    ),
    'empty' => 'Seleccionar Municipio',
    'style' => 'height:30px; width:250px',
    'options' => array('1' => array('selected' => true))))
?>


<?php
$localidad = Localidad::model()->getByIdMunicipio(1);
$list_localidad= CHtml::listData($localidad, 'id', 'nombre');
$list_localidad = CHtml::encodeArray($list_localidad);
echo $form->dropDownListRow($modelAsentamiento, 'id_localidad', $list_localidad, array("ajax" => array(
        "type" => 'post', //request type
        "url" => CController::createUrl('Asentamiento/GetByIdLocalidad'), //url to call
        "update" => "#Direccion_id_asentamiento",
    ),
    'empty' => 'Seleccionar Localidad',
    'style' => 'height:30px; width:250px',
    'options' => array('1' => array('selected' => true))))
?>

<?php
$asentamiento = Asentamiento::model()->getByIdLocalidad(1);
$list_asentamiento = CHtml::listData($asentamiento, 'id', 'nombre');
$list_asentamiento = CHtml::encodeArray($list_asentamiento);
echo $form->dropDownListRow($modelDireccion, 'id_asentamiento', $list_asentamiento, array(
    'empty' => 'Seleccionar Asentamiento',
    'style' => 'height:30px; width:250px',
    'options' => array('1' => array('selected' => true))))
?>

<?php echo $form->textFieldRow($modelDireccion, 'calle', array('class' => 'span5', 'maxlength' => 1000)); ?>

<?php echo $form->textFieldRow($modelDireccion, 'colonia', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->textFieldRow($modelDireccion, 'localidad', array('class' => 'span5', 'maxlength' => 500)); ?>

<?php echo $form->textFieldRow($modelDireccion, 'codigo_postal', array('class' => 'span5', 'maxlength' => 15)); ?>


<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Guardar' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>	 
