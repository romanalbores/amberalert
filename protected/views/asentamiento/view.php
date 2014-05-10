<?php
$this->breadcrumbs=array(
	'Asentamientos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Asentamiento','url'=>array('index')),
array('label'=>'Create Asentamiento','url'=>array('create')),
array('label'=>'Update Asentamiento','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Asentamiento','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Asentamiento','url'=>array('admin')),
);
?>

<h1>View Asentamiento #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_localidad',
		'id_tipo_asentamiento',
		'nombre',
		'nombre_corto',
		'codigo',
		'codigo_postal',
		'no_habitantes',
		'estatus_asentamiento',
		'estatus',
		'registrado_por',
		'fecha_registro',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
),
)); ?>
