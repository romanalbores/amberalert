<?php
$this->breadcrumbs=array(
	'Oficinas'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Nuevo','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('oficina-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Administrar Oficinas</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'oficina-grid',
'dataProvider'=>$model->searchAux(),
'filter'=>$model,
'columns'=>array(
		'id',               
		array( 'name'=>'region_nombre', 'value'=>'$data->idOrganizacion->nombre' ),
                array( 'name'=>'organizacion_nombre', 'value'=>'$data->idRegion->nombre' ),
		'nombre',
		'nombre_corto',
		'codigo',		 		
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
