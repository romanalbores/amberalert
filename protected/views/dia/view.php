<?php
$this->breadcrumbs=array(
	'Dias'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Dia','url'=>array('index')),
array('label'=>'Create Dia','url'=>array('create')),
array('label'=>'Update Dia','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Dia','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Dia','url'=>array('admin')),
);
?>

<h1>View Dia #<?php echo $model->id; ?></h1>

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
