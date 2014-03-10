<?php
$this->breadcrumbs=array(
	'Tipo Naturalezas'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List TipoNaturaleza','url'=>array('index')),
array('label'=>'Create TipoNaturaleza','url'=>array('create')),
array('label'=>'Update TipoNaturaleza','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TipoNaturaleza','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TipoNaturaleza','url'=>array('admin')),
);
?>

<h1>View TipoNaturaleza #<?php echo $model->id; ?></h1>

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
