<?php
$this->breadcrumbs=array(
	'Incidencias'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Incidencia','url'=>array('index')),
array('label'=>'Create Incidencia','url'=>array('create')),
array('label'=>'Update Incidencia','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Incidencia','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Incidencia','url'=>array('admin')),
);
?>

<h1>View Incidencia #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_tipo_alerta',
		'id_caso_particular',
		'fecha_incidencia',
		'suceso',
		'heridas',
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
),
)); ?>
