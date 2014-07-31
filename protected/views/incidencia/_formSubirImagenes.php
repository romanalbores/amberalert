<?php
/**
 * INCLUDES DE SCRIPTS
 */
Yii::app()->clientScript->registerScriptFile(
        Yii::app()->request->baseUrl . "/js/FileDrop/filedrop-min.js", CClientScript::POS_HEAD
);

?>

<?php

//$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
////    'id' => 'imagenes-form'.$tipo,        
//    'id' => 'persona-menor-form-dos',        
////    'enableClientValidation' => true,
//    'enableAjaxValidation' => true,
//    'clientOptions' => array(
//        'validateOnSubmit' => true, // Required to perform AJAX validation on form submit
//        'afterValidate' => 'js:mySubmitFormFunction', // Your JS function to submit form
//    ),
//    'htmlOptions'=>array('class'=>'validarForm')
//        ));

?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'imagenes-form'.$tipo,
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true, // Required to perform AJAX validation on form submit
        'afterValidate' => 'js:mySubmitFormFunction', // Your JS function to submit form
    ),
        'htmlOptions'=>array('class'=>'validarForm')
        ));
?>
<?php echo $form->textFieldRow($model, 'nombre', array('class' => 'span5 invisible', 'maxlength' => 200,)); ?>

<?php echo $form->hiddenField($model, 'id', array('class' => 'span5', 'maxlength' => 1000)); ?>
<input type="hidden" value="<?php echo $tipo ?>" name="Persona[tipo_imagen]">
<?php $this->endWidget(); ?>
<style>
    /***
  Styles below are only required if you're using <iframe> fallback in
  addition to HTML5 drag & drop (only working in Firefox/Chrome).
 ***/

/* Essential FileDrop zone element configuration: */
.fd-zone {
  position: relative;
  overflow: hidden;
  /* The following are not required but create a pretty box: */
  width: 15em;
  margin: 0 auto;
  text-align: center;
}
.fd-zone legend{
    border: thin dashed;
}

/* Hides <input type="file"> while simulating "Browse" button: */
.fd-file {
  opacity: 0;
  font-size: 118px;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 1;
  padding: 0;
  margin: 0;
  cursor: pointer;
  filter: alpha(opacity=0);
  font-family: sans-serif;
}

/* Provides visible feedback when use drags a file over the drop zone: */
.fd-zone.over { border-color: maroon; background: #eee; }

/* Provides visible feedback when use drags a file over the drop zone: */
    .fd-zone.over { border-color: maroon; background: #eee; }
    #progress_zone{
        background-color: #f1a165;
	background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f1a165),color-stop(1, #f36d0a));
	background-image: -webkit-linear-gradient(top, #f1a165, #f36d0a); 
        background-image: -moz-linear-gradient(top, #f1a165, #f36d0a);
        background-image: -ms-linear-gradient(top, #f1a165, #f36d0a);
        background-image: -o-linear-gradient(top, #f1a165, #f36d0a);
    }
</style>

<!--<fieldset id="zbasic">
  <legend>Drop a file inside…</legend>
  <p>Or click here to <em>Browse…</em></p>

  <p style="position: relative; z-index: 1">
    <input id="zbasicm" type="checkbox">

    <label for="zbasicm">
      Allow multiple selection in <em>Browse</em> dialog.
    </label>
  </p>
</fieldset>-->

<fieldset id="zbasic">
  <legend>Arrastra un archivo aqui…</legend>
  <p>O da click aqu&iacute; para <em>Buscar…</em></p>

    <div style="border: 1px solid; height:20px; position:relative">
        <span id="progress_zone" style="background-color: rgb(255, 255, 255); height: 20px; width: 0%; margin-left: 0;"></span>
    </div> 
</fieldset>

<?php 
$modelImagenes = new Imagen();
$this->widget('bootstrap.widgets.TbListView',array(
'id'=>'list_imagenes',
'dataProvider'=>$modelImagenes->obtenerListaImagenesPorIdPersonaDP($model->id),
'itemView'=>'_formSubirImagenes_view',
)); ?>


<script>
    var options = {iframe: {url: '<?php echo Yii::app()->createUrl('Incidencia/SubirImagenPersona') ?>' + '?ajax=1'}, multiple: true};
    var zone = new FileDrop('zbasic', options);

    zone.event('send', function(files) {
        files.each(function(file) {
            // React on successful AJAX upload:
            file.event('done', function(xhr) {
                // Here, 'this' points to fd.File instance.                
                var data = JSON.parse(xhr.responseText);
                console.log(data);
				$.fn.yiiListView.update("list_imagenes");
            })

            file.event('progress', function(current, total) {
                var width = current / total * 100 + '%';
//                $('#progress_zone').css('width', width);
                $('#progress_zone').html(width);
                console.log(width);
            })

            file.sendTo('<?php echo Yii::app()->createUrl('Incidencia/SubirImagenPersona') ?>' + '?id_persona=<?php echo $model->id ?>')
        })
    })

    // Successful iframe upload uses separate mechanism
    // from proper AJAX upload hence another listener:
    zone.event('iframeDone', function(xhr) {
        alert(xhr.responseText)
    })
</script>