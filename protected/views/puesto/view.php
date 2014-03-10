<?php
$this->breadcrumbs=array(
	'Puestos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Puesto','url'=>array('index')),
array('label'=>'Create Puesto','url'=>array('create')),
array('label'=>'Update Puesto','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Puesto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Puesto','url'=>array('admin')),
);
?>

<h1>View Puesto #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nombre',
		'nombre_corto',
		'codigo',
		'descripcion',
		'estatus',
		'registrado_por',
		'fecha_registro',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
),
)); ?>
