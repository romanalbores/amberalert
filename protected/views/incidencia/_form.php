
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<div id="wizard-bar" class="progress progress-striped active">
    <div class="bar"></div>
</div>
<!--<div style="float:right">
        <input type="button" id="btn_next" class="btn button-next" name="next" value="Next" />
        <input type="button" class="btn button-last" name="last" value="Last" />
    </div>
    <div style="float:left">
        <input type="button" class="btn button-first" name="first" value="First" />
        <input type="button" class="btn button-previous" name="previous" value="Previous" />
    </div><br /><br />-->
<!--<div class="wizard">
    <li class="next">
        xD
    </li>
</div>-->

<?php
$formIncidencia = $this->renderPartial('_formIncidencia', array('model' => $model, 'modelIncidenciaTiempo' => $modelIncidenciaTiempo), true, false);
$formIncidenciaTiempo = $this->renderPartial('_formIncidenciaTiempo', array('model' => $modelIncidenciaTiempo), true, false);
$formPersonaMenor = $this->renderPartial('_formPersona', array('model' => $modelPersonaMenor, 'modelPersonaMenorCaracteristica'=>$modelPersonaMenorCaracteristica,'modelPersonaMenorVestimenta'=>$modelPersonaMenorVestimenta), true, false);
$formPersonaMenorImagenes = $this->renderPartial('_formSubirImagenes', array('model' => $modelPersonaMenor,'tipo'=>'IMAGEN_PERSONA_MENOR'), true, false);
$formPersonaMenorCaracteristica = $this->renderPartial('_formPersonaSospechoso', array('model' => $modelPersonaSospechoso, 'modelPersonaMenorCaracteristica'=>$modelPersonaSospechosoCaracteristica,'modelPersonaMenorVestimenta'=>$modelPersonaSospechosoVestimenta), true, false);
$formPersonaSospechosoImagenes = $this->renderPartial('_formSubirImagenes', array('model' => $modelPersonaSospechoso,'tipo'=>'IMAGEN_PERSONA_SOSPECHOSO'), true, false);
$formVehiculoSospechoso = $this->renderPartial('_formPersonaCaracteristicaVehiculoSospechoso', array('model' => new PersonaCaracteristicaVehiculo()), true, false);


$this->widget(
    'bootstrap.widgets.TbWizard', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'placement' => 'left',
    'id'=>'wizard-incidencias',
//    'pagerContent' => '',
    'options' => array(
//        'nextSelector' => '#btn_next',
//        'previousSelector' => '.button-previous',
//        'firstSelector' => '.button-first',
//        'lastSelector' => '.button-last',
        'onTabShow' => 'js:function(tab, navigation, index) {
            console.log("TAB SHOW");
            current_step = index;
            console.log(index);
            actualizaProgress(tab, navigation, index);
        }',
        'onTabClick' => 'js:function(tab, navigation, index) {
            console.log("TAB CLICK");
            console.log(tab)
            console.log(navigation);
            console.log(index);
        }',
        'onNext' => 'js:function(tab, navigation, index) {
            console.log("BTN NEXT");            
            var res = validaPaso(tab, navigation, index);     
            return res;
        }',
        'onPrevious' => 'js:function(tab, navigation, index) {
            console.log("BTN PREV");
            var res = validaPaso(tab, navigation, index);     
            return res;
        }'
    ),
    'tabs' => array(       
        array(
            'label' => 'Incidencia',
            'content' => $formIncidencia,
            'active' => true
        ),
        array('label' => 'Tiempos', 'content' => $formIncidenciaTiempo),
        array('label' => 'El menor', 'content' => $formPersonaMenor),        
        array('label' => 'Imagenes del Menor','content' => $formPersonaMenorImagenes),
        array('label' => 'Sospechoso', 'content' => $formPersonaMenorCaracteristica),
        array('label' => 'Imágenes del Sospechoso', 'content' => $formPersonaSospechosoImagenes),
        array('label' => 'Vehiculo sospechoso', 'content' => $formVehiculoSospechoso),
    ),
        )
);
?>

<script type="text/javascript">    
    $( document ).ready(function() {
        seleccionarPasoSiguiente(<?php echo $returnStep; ?>);
    });    
</script>