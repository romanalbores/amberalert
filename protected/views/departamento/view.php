<?php
$this->breadcrumbs=array(
	'Departamentos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Departamento','url'=>array('index')),
array('label'=>'Create Departamento','url'=>array('create')),
array('label'=>'Update Departamento','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Departamento','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Departamento','url'=>array('admin')),
);
?>

<h1>View Departamento #<?php echo $model->id; ?></h1>

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
