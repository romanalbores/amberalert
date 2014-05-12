<?php
$this->breadcrumbs=array(
	'Configuracions'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Configuracion','url'=>array('index')),
array('label'=>'Create Configuracion','url'=>array('create')),
array('label'=>'Update Configuracion','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Configuracion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Configuracion','url'=>array('admin')),
);
?>

<h1>View Configuracion #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_configuracion_dia',
		'nombre',
		'nombre_corto',
		'codigo',
		'descripcion',
		'fecha_inicio',
		'fecha_fin',
		'estatus',
		'fecha_registro',
		'registrado_por',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
),
)); ?>
