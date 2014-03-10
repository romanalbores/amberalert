<?php
$this->breadcrumbs=array(
	'Incidencias'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Incidencia','url'=>array('index')),
array('label'=>'Create Incidencia','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('incidencia-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Incidencias</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'incidencia-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'id_tipo_alerta',
		'id_caso_particular',
		'fecha_incidencia',
		'suceso',
		'heridas',
		/*
		'descripcion_heridas',
		'armas',
		'descripcion_armas',
		'lugar_avistamiento_final',
		'persona_acompaniante_final',
		'relacion_acompaniante',
		'relacion_persona_llamada',
		'estatus_suceso',
		'direccion_viaje',
		'descripcion_objeto',
		'estatus',
		'registrado_por',
		'fecha_registro',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
