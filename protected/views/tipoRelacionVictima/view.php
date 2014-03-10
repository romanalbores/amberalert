<?php
$this->breadcrumbs=array(
	'Tipo Relacion Victimas'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List TipoRelacionVictima','url'=>array('index')),
array('label'=>'Create TipoRelacionVictima','url'=>array('create')),
array('label'=>'Update TipoRelacionVictima','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TipoRelacionVictima','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TipoRelacionVictima','url'=>array('admin')),
);
?>

<h1>View TipoRelacionVictima #<?php echo $model->id; ?></h1>

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
