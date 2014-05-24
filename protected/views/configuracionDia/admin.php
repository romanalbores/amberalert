<?php
$this->breadcrumbs = array(
    'Configuracion de Dias y Horas' => array('index'),
    'Administrar',
);

$this->menu = array(
    array('label' => 'Listar', 'url' => array('index')),
    array('label' => 'Nuevo', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('configuracion-dia-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Administrar Configuracion de Dias y Horas</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'configuracion-dia-grid',
    'dataProvider' => $model->searchAux(),
    'filter' => $model,
    'columns' => array(
        'id',
        'nombre',
        'nombre_corto',
        'codigo',
        'descripcion',
        'estatus',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
