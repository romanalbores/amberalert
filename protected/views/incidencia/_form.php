
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

$this->widget(
        'bootstrap.widgets.TbWizard', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'placement' => 'left',
//    'pagerContent' => '',
    'options' => array(
//        'nextSelector' => '#btn_next',
//        'previousSelector' => '.button-previous',
//        'firstSelector' => '.button-first',
//        'lastSelector' => '.button-last',
        'onTabShow' => 'js:function(tab, navigation, index) {
            
var $total = navigation.find("li").length;
var $current = index+1;
var $percent = ($current/$total) * 100;
$("#wizard-bar > .bar").css({width:$percent+"%"});
}',
        'onTabClick' => 'js:function(tab, navigation, index) {alert("Tab Click Disabled");return false;}',
    ),
    'tabs' => array(
        array(
            'label' => 'Incidencia',
            'content' => $formIncidencia,
            'active' => true
        ),
        array('label' => 'Incidencia Tiempo', 'content' => $formIncidenciaTiempo),
        array('label' => 'Messages', 'content' => 'Messages Content'),
    ),
        )
);
?>
