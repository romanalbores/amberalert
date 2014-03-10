<?php
$this->breadcrumbs=array(
	'Imagens'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Imagen','url'=>array('index')),
array('label'=>'Create Imagen','url'=>array('create')),
array('label'=>'Update Imagen','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Imagen','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Imagen','url'=>array('admin')),
);
?>

<h1>View Imagen #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nombre',
		'nombre_corto',
		'codigo',
		'descripcion',
		'archivo',
		'ruta',
		'extension',
		'publico',
		'estatus',
		'registrado_por',
		'fecha_registro',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
),
)); ?>
